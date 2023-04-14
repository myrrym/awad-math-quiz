<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Activity;

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
        $footer = "true";
        $user = session('user');

        if (session()->get('user')) {
            $navbar = "logged-in-with-options";
        } else {
            $navbar = "without-options";
        }
        
        // here
        $user = session('user');

        $diff_array = [
            'easy',
            'medium',
            'hard',
            'whatTheMeow',
        ];
        if (!$diff || !(in_array($diff, $diff_array))) {
            return abort(404);
        };
        $config = [
            'allow_zero' => true,
            'question_range' => 9,
            'answer_range' => 5,
            'argument_number' => 2,
        ];
        if ($diff == "easy") {
            $config['question_range'] =  9;
            $config['answer_range'] =  5;
            $config['argument_number'] =  2;
        } else if ($diff == "medium") {
            $config['question_range'] =  50;
            $config['answer_range'] =  15;
            $config['argument_number'] =  3;
        } else if ($diff == "hard") {
            $config['question_range'] =  500;
            $config['answer_range'] =  20;
            $config['argument_number'] =  4;
        } else if ($diff == "whatTheMeow") {
            $config['question_range'] =  1;
            $config['answer_range'] =  3;
            $config['argument_number'] =  10;
            $config['allow_zero'] =  false;
        }
        $quiz = $this->generateOutput($config);
        $quiz_json = json_encode($quiz);

        return view('quiz', compact(
            'navbar',
            'footer',
            'quiz',
            'quiz_json',
            'diff',
        ),);
    }

    protected function generateOutput($config){
        for ($i = 0; $i < 20; $i++) {
            $statement = $this->generateStatement($config);
            $question[$i] = $statement[0];
            $quiz[$i] = [$i+1, $question[$i], $statement[1]];
        }

        return $quiz;
    }
    
    protected function generateAnswers($question, $arg, $operator, $config){
        $answer_pool = [];
        $answer_pool[0] = [
            eval('return '.$question.';'),
            'correct',
        ];
        $placeholder_pool = []; // put generated answer in a temporary pool to check for dupes
        $placeholder_pool[0] = $answer_pool[0][0];  // register the correct answer as the first in the pool
        for($i = 0; $i < 3; $i++){
            do{
                $placeholder = $answer_pool[0][0] + (rand(-($config['answer_range']), $config['answer_range']));
            }while(in_array($placeholder, $placeholder_pool));

            $placeholder_pool[$i + 1] = $placeholder;
            $answer_pool[$i + 1] = [$placeholder, 'wrong'];
        }
        shuffle($answer_pool);
        $shuffled = $answer_pool;

        return $shuffled;
    }

    protected function generateStatement($config){
        $statement = '';
        $arg = [];
        $operator = [];
        $zero = $config['allow_zero'] ? 0 : 1;
        for($i = 0; $i < $config['argument_number']; $i++){
            $arg[$i] = rand($zero, $config['question_range']);
            if($statement == ""){
                $statement = $arg[$i];
            }
            else{
                $operator[$i] = ['+', '-', '*', '/'][rand(0, 2)];
                $statement = $statement ." ". $operator[$i] ." ".rand($zero, $config['question_range']);
            }

        }
        return [$statement, $this->generateAnswers($statement, $arg, $operator, $config)];
    }

    public function viewQuizResults(Request $request){
        // here
        $user = session('user');

        $navbar = "with-options";
        $footer = "true";
        
        // session
        // $user = $this->users->find($id);

        // $user = User::find($request->user_id);

        if($user){
            Activity::create([
                'user_id' => $user->id,
                'difficulty' => $request->diff,
                'score' => $request->score,
                'time' => $request->time,
            ]);
        }

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
