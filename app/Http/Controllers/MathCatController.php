<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class MathCatController extends Controller
{
    public function viewHomePage(Request $request)
    {
        // $navbar = "with-options";
        $footer = "true";
        $user_id = $request->session()->get('user_id');
        $user = User::find($user_id);
        
        if($user="true"){
            $navbar = "logged-in-with-options";
        }else{
            $navbar = "with-options";
        }

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
        // sample
        // easy = 1 symbol, 1 digit number
        // 3 + 4, 9-4, 3*3, 8/2
        // medium = 2 symbols, 2-3 digit numbers
        // 123-187, 
        // hard = 3 symbols, 4-5 digit numbers
        // 87612312/123+1231*1231, 1948034+23235245/123123, 3424234-434234, 2342*342
        // wtm = 1+1+1+1+1+1+1, 1-1+1-1+1-1, 1/1-1/1*1*1/1

        if($diff == "easy"){
            // test
            // $qNum = 1;
            // $num1 = rand(0,9);
            // $sym1 = ['+','-','*','/'][rand(0,2)];
            // $num2 = rand(0,9);

            // $question = $num1.' '.$sym1.' '.$num2;

            // function calc($a,$sym,$b){
            //     switch($sym) {
            //         case '+': return $a + $b;
            //         case '-': return $a - $b;
            //         case '*': return $a * $b;
            //         case '/': return $a / $b;
            //     }
            // }

            // $answerCorrect = [calc($num1,$sym1,$num2), 'correct'];
            // do{
            //     $answerWrong1 = [rand(-20,20), 'wrong'];
            //     $answerWrong2 = [rand(-20,20), 'wrong'];
            //     $answerWrong3 = [rand(-20,20), 'wrong'];
            // }while(
            //     $answerWrong1[0] == $answerCorrect[0]||
            //     $answerWrong2[0] == $answerCorrect[0]||
            //     $answerWrong3[0] == $answerCorrect[0]
            // );

            // $answers = [$answerCorrect, $answerWrong1, $answerWrong2, $answerWrong3];

            // $shuffledAnswers = $answers;
            // shuffle($shuffledAnswers);

            // $quiz = [$qNum, $question, $shuffledAnswers];
            // dd($quiz);

            // 20 times

            function calc($a,$sym,$b){
                switch($sym) {
                    case '+': return $a + $b;
                    case '-': return $a - $b;
                    case '*': return $a * $b;
                    case '/': return $a / $b;
                }
            }

            for($i=0; $i<20; $i++){
                $qNum[$i] = $i+1;
                $num1[$i] = rand(0,9);
                $sym1[$i] = ['+','-','*','/'][rand(0,2)];
                $num2[$i] = rand(0,9);
    
                $question[$i] = $num1[$i].' '.$sym1[$i].' '.$num2[$i];

                $answerCorrect[$i] = [calc($num1[$i],$sym1[$i],$num2[$i]), 'correct'];
                
                do{
                    $answerWrong1[$i] = [rand(-20,20), 'wrong'];
                    $answerWrong2[$i] = [rand(-20,20), 'wrong'];
                    $answerWrong3[$i] = [rand(-20,20), 'wrong'];
                }while(
                    $answerWrong1[$i][0] == $answerCorrect[$i][0]||
                    $answerWrong2[$i][0] == $answerCorrect[$i][0]||
                    $answerWrong3[$i][0] == $answerCorrect[$i][0]
                );
    
                $answers[$i] = [$answerCorrect[$i], $answerWrong1[$i], $answerWrong2[$i], $answerWrong3[$i]];
    
                $shuffledAnswers[$i] = $answers[$i];
                shuffle($shuffledAnswers[$i]);
    
                $quiz[$i] = [$qNum[$i], $question[$i], $shuffledAnswers[$i]];
            }
        }

        return view('quiz', compact(
            'navbar',
            'footer',
            'quiz',
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
