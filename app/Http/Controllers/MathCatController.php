<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class MathCatController extends Controller
{
    public function viewHomePage(Request $request)
    {
        $navbar = "with-options";
        $footer = "true";
        $user_id = $request->session()->get('user_id');
        $user = User::find($user_id);

        return view(
            'homepage',
            ['user' => $user],
            compact(
                'navbar',
                'footer'
            )
        );
    }

    public function viewExample()
    {
        $navbar = "with-options";
        $footer = "true";
        return view('example', compact(
            'navbar',
            'footer'
        ));
    }

    public function viewQuiz()
    {
        $navbar = "without-options";
        $footer = "true";
        return view('quiz', compact(
            'navbar',
            'footer'
        ),);
    }

    public function viewUser()
    {
        $navbar = "without-options";
        $footer = "true";
        return view('user', compact(
            'navbar',
            'footer'
        ));
    }

    public function viewLeaderboard($difficulty)
    {
        $navbar = "without-options";
        $footer = "true";
        return view(
            'leaderboard',
            ['difficulty' => $difficulty],
            compact('navbar', 'footer')
        );
    }

    public function viewPrivacy()
    {
        $navbar = "without-options";
        $footer = "true";
        return view('privacy-policy', compact(
            'navbar',
            'footer'
        ));
    }

    public function viewHistory($difficulty)
    {
        $navbar = "without-options";
        $footer = "true";

        return view(
            'history',
            ['difficulty' => $difficulty],
            compact('navbar', 'footer')
        );
    }

    public function viewAchievement()
    {
        $navbar = "without-options";
        $footer = "true";
        return view('achievement', compact(
            'navbar',
            'footer'
        ));
    }

    public function viewLogin()
    {
        $navbar = "with-options";
        $footer = "true";
        return view('login', compact(
            'navbar',
            'footer'
        ));
    }
}
