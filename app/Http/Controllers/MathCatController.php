<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathCatController extends Controller
{
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
    
}
