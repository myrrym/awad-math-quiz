<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        try {
            $request->validate([
                'username' => 'required|string|min:8|max:255',
                'password' => 'required|min:8',
            ]);
        } catch (ValidationException $e) {
            $errorMessage = $e->validator->getMessageBag()->all();
            Session::flash('error', $errorMessage);
            return redirect()->back();
        }


        // Retrieve the user by username
        $user = User::where('username', $request->username)->first();

        // Check if the user exists and the password is correct
        if (!$user || !Hash::check($request->password, $user->password)) {
            Session::flash('error', 'Invalid username or password.');
            return redirect()->back();
        }

        // Initiate session
        $request->session()->put('user', $user);
        Session::flash('success', 'You have been logged in successfully.');

        return redirect('/');
    }

    public function register(Request $request)
    {

        try{
            $request->validate([
                'username' => 'required|string|min:8|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);
        }catch (ValidationException $e) {
            $errorMessage = $e->validator->getMessageBag()->all();
            Session::flash('error', $errorMessage);
            return redirect()->back();
        }
    
        // Create a new user
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'picture' => 'cat' . rand(1, 9) . '.jpg',
        ]);
    
        if ($user) {
            Session::flash('success', 'You have been registered successfully.');
            return redirect('/home');
        } else {
            Session::flash('error', 'Registration failed.');
            return redirect()->back()->withInput();
        }
    }

    // public function profile(Request $request)
    // {
    //     return response()->json($request->user(), 200);
    // }

    // User logout
    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return redirect('/home');
    }
}