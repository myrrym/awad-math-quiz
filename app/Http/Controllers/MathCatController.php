<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class MathCatController extends Controller
{
    public function viewHomePage()
    {
        $navbar = "with-options";
        $footer = "true";
        return view('homepage', compact(
            'navbar',
            'footer'
        ));
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

    public function viewQuiz($diff){
        $diff_array = [
            'easy',
            'medium',
            'hard',
            'whatTheMeow',
        ];
        if(!$diff || !(in_array($diff, $diff_array))){
            return abort(404);
        };

        $navbar = "without-options";
        $footer = "true";

        // generate q based on difficulty
        if($diff == "easy"){
            
        }

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
            compact('navbar','footer')
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
            compact('navbar','footer')
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

    public function getUser(){
        $data = User::all()->where('username', 'vWl8XZs0ww')-> first();

        return $data;
    }
}
