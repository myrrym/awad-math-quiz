<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathCatController extends Controller
{
    public function viewExample(){
        return view('example');
    }

    public function viewQuiz(){
        return view('quiz');
    }
    
}
