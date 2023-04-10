<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathCatController extends Controller
{
    public function viewHomePage(){
        $navbar = "with-options";
        $footer = "true";
        return view('homepage' , compact(
            'navbar',
            'footer'
        ));
    }
    
    public function viewExample(){
        $navbar = "with-options";
        $footer = "true";
        return view('example', compact(
            'navbar',
            'footer'
        ));
    }

    public function viewQuiz(){
        $navbar = "without-options";
        $footer = "true";
        return view('quiz', compact(
            'navbar',
            'footer'
        ));
    }

<<<<<<< HEAD
    public function viewUser(){
=======

    public function viewUserDashboard(){
>>>>>>> 2a5f1bc2d3836a990026207fe97fdda4c7fb05c3
        $navbar = "without-options";
        $footer = "true";
        return view('user', compact(
            'navbar',
            'footer'
        ));
    }

    public function viewLeaderboard(){
        $navbar = "without-options";
        $footer = "true";
        return view('leaderboard', compact(
            'navbar',
            'footer'
        ));
    }

    public function viewPrivacy(){
        $navbar = "without-options";
        $footer = "true";
        return view('privacy-policy', compact(
            'navbar',
            'footer'
        ));
    }
    
    public function viewHistory(){
        $navbar = "without-options";
        $footer = "true";
        return view('history', compact(
            'navbar',
            'footer'
        ));
    }

    public function viewAchievement(){
        $navbar = "without-options";
        $footer = "true";
        return view('achievement', compact(
            'navbar',
            'footer'
        ));
    }

    public function viewLogin(){
        $navbar = "with-options";
        $footer = "true";
        return view('login', compact(
            'navbar',
            'footer'
        ));
    }
    
}
