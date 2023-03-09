<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathCatController extends Controller
{
    public function viewExample(){
        $navbar = "with-options";
        return view('example', compact('navbar'));
        // return view('example')->with($navbar);
    }

    public function viewQuiz(){
        $navbar = "without-options";
        return view('quiz', compact('navbar'));
        // return view('example')->with($navbar);
    }
    
}
