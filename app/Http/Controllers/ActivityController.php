<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    function getActivities($difficulty)
    {

        return Activity::all()->where('username', 'JofK0utOpd')->where('difficulty', $difficulty)->sortByDesc('created_at');
    }

    function getBestActivity($difficulty)
    {

        $data = Activity::all()->where('username', 'JofK0utOpd')->where('difficulty', $difficulty);
        $bestScore = $data->max('score');
        $bestActivity = $data->where('score', $bestScore)->first();
        return $bestActivity;
    }

    function getCurrentRank($difficulty)
    {
        $bestActivity = Activity::where('difficulty', $difficulty)
                                ->where('username', 'fibwUT9UkA')
                                ->orderByDesc('score')
                                ->orderBy('time')
                                ->first();
    
        if (!$bestActivity) {
            return -1;
        }
    
        $rank = Activity::where('difficulty', $difficulty)
                        ->where(function ($query) use ($bestActivity) {
                            $query->where('score', '>', $bestActivity->score)
                                  ->orWhere(function ($query) use ($bestActivity) {
                                      $query->where('score', '=', $bestActivity->score)
                                            ->where('time', '<', $bestActivity->time);
                                  });
                        })
                        ->count() + 1;
    
        return $rank;
    }
    

    function getTestsCompleted($difficulty){

        return count(Activity::all()->where('difficulty', $difficulty)->where('username', 'JofK0utOpd'));
    }

}
