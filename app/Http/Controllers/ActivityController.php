<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    function getActivities($username, $difficulty)
    {

        return Activity::all()->where('username', $username )->where('difficulty', $difficulty)->sortByDesc('created_at');
    }

    function getBestActivity($username,$difficulty)
    {

        $data = Activity::all()->where('username', $username)->where('difficulty', $difficulty);
        $bestScore = $data->max('score');
        $bestActivity = $data->where('score', $bestScore)->first();
        return $bestActivity;
    }

    function getCurrentRank($username,$difficulty)
    {
        $bestActivity = Activity::where('difficulty', $difficulty)
                                ->where('username', $username)
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
    

    function getTestsCompleted($username,$difficulty){

        return count(Activity::all()->where('difficulty', $difficulty)->where('username', $username));
    }

}
