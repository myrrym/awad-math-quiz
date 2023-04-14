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
        $navbar = "without-options";
        $footer = "true";

        // task1: integrate with session
        // task6: make sure everything works

        $diff_array = [
            'easy',
            'medium',
            'hard',
            'whatTheMeow',
        ];
        if (!$diff || !(in_array($diff, $diff_array))) {
            return abort(404);
        };
        $allow_zero = true;
        if ($diff == "easy") {
            $question_range = 9;
            $answer_range = 5;
            $argument_number = 2;
        } else if ($diff == "medium") {
            $question_range = 50;
            $answer_range = 15;
            $argument_number = 3;
        } else if ($diff == "hard") {
            $question_range = 500;
            $answer_range = 20;
            $argument_number = 4;
        } else if ($diff == "whatTheMeow") {
            $question_range = 1;
            $answer_range = 3;
            $argument_number = 10;
            $allow_zero = false;
        }
        $quiz = $this->generateOutput($argument_number, $question_range, $answer_range, $allow_zero);
        $quiz_json = json_encode($quiz);

        return view('quiz', compact(
            'navbar',
            'footer',
            'quiz',
            'quiz_json',
        ),);
    }

    protected function generateOutput($argument_number, $question_range, $answer_range, $allow_zero){
        for ($i = 0; $i < 20; $i++) {
            $statement = $this->generateStatement($argument_number, $question_range, $answer_range, $allow_zero);
            $question[$i] = $statement[0];
            $quiz[$i] = [$i+1, $question[$i], $statement[1]];
        }

        return $quiz;
    }
    
    protected function generateAnswers($question, $arg, $operator, $answer_range){
        $answer_pool = [];
        $answer_pool[0] = [
            eval('return '.$question.';'),
            'correct',
        ];
        $placeholder_pool = [];
        $placeholder_pool[0] = $answer_pool[0][0];
        for($i = 0; $i < 3; $i++){
            do{
                $placeholder = $answer_pool[0][0] + (rand(-($answer_range), $answer_range));
            }while(in_array($placeholder, $placeholder_pool));

            $placeholder_pool[$i + 1] = $placeholder;
            $answer_pool[$i + 1] = [$placeholder, 'wrong'];
        }
        shuffle($answer_pool);
        $shuffled = $answer_pool;

        return $shuffled;
    }

    protected function generateStatement($arg_number, $question_range, $answer_range, $allow_zero){
        $statement = '';
        $arg = [];
        $operator = [];
        $zero = $allow_zero ? 0 : 1;
        for($i = 0; $i < $arg_number; $i++){
            $arg[$i] = rand($zero, $question_range);
            if($statement == ""){
                $statement = $arg[$i];
            }
            else{
                $operator[$i] = ['+', '-', '*', '/'][rand(0, 2)];
                $statement = $statement ." ". $operator[$i] ." ".rand($zero, $question_range);
            }

        }
        return [$statement, $this->generateAnswers($statement, $arg, $operator, $answer_range)];
    }

    public function viewQuizResults(Request $request){
        $navbar = "with-options";
        $footer = "true";

        // task2: save to user acc
        // task1: create entry in games table
        // task3: user session

        $time = $request->time;
        $score = $request->score;

        return view('quiz-results', compact(
            'navbar',
            'footer',
            'time',
            'score',
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

    public function getUsers()
    {
        return User::all();
    }

    public function getUsername($user_id){
        $username = User::find($user_id) -> username;

        return $username;
    }
}
