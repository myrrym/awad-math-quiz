<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        // dd($request);
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required',
        ]);

        // Retrieve the user by email
        $user = User::where('username', $request->username)->first();

        // Check if the user exists and the password is correct
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Invalid username or password'], 401);
        }

        //initiate session
        $request->session()->put('user', $user);

        // return response()->json(['message' => 'User successfully registered'], 201);
        return redirect("/");

    }

    public function register(Request $request)
    {
        // dd($request);
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'picture' => 'cat'.rand(1,9).'.jpg',
        ]);
           

        // Return the token in the response
        //return response()->json(['message' => 'User successfully registered'], 201);
        return redirect("/home");
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Retrieve the authenticated user
        $user = $request->user();

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['error' => 'Invalid current password'], 401);
        }

        // Update the user's password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return response()->json(['message' => 'Password updated successfully'], 200);
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