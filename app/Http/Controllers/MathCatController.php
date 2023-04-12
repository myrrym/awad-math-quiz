<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class MathCatController extends Controller
{
    public function viewHomePage(Request $request)
    {
        $footer = "true";
        $user = session('user');

        if (session()->get('user')) {
            $navbar = "logged-in-with-options";
        } else {
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

    // public function viewExample()
    // {
    //     $navbar = "with-options";
    //     $footer = "true";
    //     return view('example', compact(
    //         'navbar',
    //         'footer'
    //     ));
    // }

    public function viewQuiz($diff)
    {
        // task1: integrate with session
        // task2: medium
        // task3: hard
        // task4: wtm
        $diff_array = [
            'easy',
            'medium',
            'hard',
            'whatTheMeow',
        ];
        if (!$diff || !(in_array($diff, $diff_array))) {
            return abort(404);
        };

        $navbar = "without-options";
        $footer = "true";

        // generate q based on difficulty
        if ($diff == "easy") {

            function calc($a, $sym, $b)
            {
                switch ($sym) {
                    case '+':
                        return $a + $b;
                    case '-':
                        return $a - $b;
                    case '*':
                        return $a * $b;
                    case '/':
                        return $a / $b;
                }
            }

            for ($i = 0; $i < 20; $i++) {
                $qNum[$i] = $i + 1;
                $num1[$i] = rand(0, 9);
                $sym1[$i] = ['+', '-', '*', '/'][rand(0, 2)];
                $num2[$i] = rand(0, 9);

                $question[$i] = $num1[$i] . ' ' . $sym1[$i] . ' ' . $num2[$i];

                $answerCorrect[$i] = [calc($num1[$i], $sym1[$i], $num2[$i]), 'correct'];

                do {
                    $answerWrong1[$i] = [rand(-20, 20), 'wrong'];
                    $answerWrong2[$i] = [rand(-20, 20), 'wrong'];
                    $answerWrong3[$i] = [rand(-20, 20), 'wrong'];
                } while (
                    $answerWrong1[$i][0] == $answerCorrect[$i][0] ||
                    $answerWrong2[$i][0] == $answerCorrect[$i][0] ||
                    $answerWrong3[$i][0] == $answerCorrect[$i][0]
                );

                $answers[$i] = [$answerCorrect[$i], $answerWrong1[$i], $answerWrong2[$i], $answerWrong3[$i]];

                $shuffledAnswers[$i] = $answers[$i];
                shuffle($shuffledAnswers[$i]);

                $quiz[$i] = [$qNum[$i], $question[$i], $shuffledAnswers[$i]];
            }
        } else if ($diff == "medium") {
            // here
        } else if ($diff == "hard") {
            // here
        } else if ($diff == "whatTheMeow") {
            // here
        }

        return view('quiz', compact(
            'navbar',
            'footer',
            'quiz',
        ),);
    }

    public function viewQuizResults(){
        $navbar = "with-options";
        $footer = "true";

        return view('quiz-results', compact(
            'navbar',
            'footer',
        ),);
    }

    public function viewUser()
    {
        $navbar = "logged-in-with-options";
        
        if (!(session()->get('user'))) {
            return redirect('/');
        }
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
        $navbar = "logged-in-with-options";
        if (!(session()->get('user'))) {
            return redirect('/');
        }
        $footer = "true";

        return view(
            'history',
            ['difficulty' => $difficulty],
            compact('navbar', 'footer')
        );
    }

    public function viewAchievement()
    {
        $navbar = "logged-in-with-options";
        if (!(session()->get('user'))) {
           return redirect('/');
        } 
        $footer = "true";

        return view('achievement', compact(
            'navbar',
            'footer'
        ));
    }

    public function view404()
    {
        $navbar = "without-options";
        $footer = "true";
        return view('404', compact(
            'navbar',
            'footer'
        ));
    }
}
