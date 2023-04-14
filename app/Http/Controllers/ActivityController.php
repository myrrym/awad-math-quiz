<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    function getActivities($id, $difficulty)
    {

        return Activity::all()->where('user_id', $id)->where('difficulty', $difficulty)->sortByDesc('created_at');
    }

    function getBestActivity($id, $difficulty)
    {
        $data = Activity::all()->where('user_id', $id)->where('difficulty', $difficulty);
        $bestScore = $data->max('score');
        $bestActivity = $data->where('score', $bestScore)->first();

        if (!$bestActivity)
            return ['score'=> 0, 'time' => 'n/a', 'created_at' => 'n/a'];
        else
            return $bestActivity;
    }

    function getCurrentRank($id, $difficulty)
    {
        $bestActivity = Activity::where('difficulty', $difficulty)
            ->where('user_id', $id)
            ->orderByDesc('score')
            ->orderBy('time')
            ->first();

        if (!$bestActivity) {
            return 'n/a';
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


    function getTestsCompleted($id, $difficulty)
    {

        return count(Activity::all()->where('difficulty', $difficulty)->where('user_id', $id));
    }
}
