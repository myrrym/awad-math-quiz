<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    function getActivities($difficulty)
    {

        return Activity::all()->where('username', 'fibwUT9UkA')->where('difficulty', $difficulty)->sortByDesc('created_at');
    }

    function getBestActivity($difficulty)
    {

        $data = Activity::all()->where('username', 'fibwUT9UkA')->where('difficulty', $difficulty);
        $bestScore = $data->max('score');
        $bestActivity = $data->where('score', $bestScore)->first();
        return $bestActivity;
    }

    function getCurrentRank($difficulty)
    {

        $allData = Activity::all()->where('difficulty', $difficulty)->sortBy(function ($activity) {
            return [
                'score' => $activity->score,
                'time' => $activity->time,
            ];
        });

        $data = Activity::all()->where('difficulty', $difficulty)->where('username', 'fibwUT9UkA');
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

    function getTestsCompleted($difficulty){

        return count(Activity::all()->where('difficulty', $difficulty)->where('username', 'fibwUT9UkA'));
    }

}
