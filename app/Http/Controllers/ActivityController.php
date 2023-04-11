<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    function getActivities(Request $request)
    {
        $difficulty = $request->input('difficulty');
        return Activity::all()->where('username', 'JofK0utOpd')->where('difficulty', $difficulty)->sortByDesc('created_at');
    }

    function getBestActivity(Request $request)
    {
        $difficulty = $request->input('difficulty');
        $data = Activity::all()->where('username', 'JofK0utOpd')->where('difficulty', $difficulty);
        $bestScore = $data->max('score');
        $bestActivity = $data->where('score', $bestScore)->first();
        return $bestActivity;
    }

    function getCurrentRank(Request $request)
    {
        $difficulty = $request->input('difficulty');
        $allData = Activity::all()->where('difficulty', $difficulty)->sortBy(function ($activity) {
            return [
                'score' => $activity->score,
                'time' => $activity->time,
            ];
        });

        $data = Activity::all()->where('difficulty', $difficulty)->where('username', 'JofK0utOpd');
        $bestScore = $data->max('score');
        $bestActivity = $data->where('score', $bestScore)->first();
        
        $currentRank = -1;
        for($i = 0; $i < count($allData); $i++)
        {
            if($allData[$i]->username === $bestActivity->username)
            {
                $currentRank = $i + 1;
                break;
            }
        }

        return $currentRank;
    }

    function getTestsCompleted(Request $request){
        $difficulty = $request->input('difficulty');
        return count(Activity::all()->where('difficulty', $difficulty)->where('username', 'JofK0utOpd'));
    }

}
