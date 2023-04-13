<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class LeaderboardController extends Controller
{


    public function getBestActivityPerUser($difficulty)
    {
        $activities = Activity::where('difficulty', $difficulty)
            ->orderBy('score', 'desc')
            ->orderBy('time')
            ->get();

        $bestActivities = [];

        $activities->each(function ($activity) use (&$bestActivities) {
            $userid = $activity->user_id;

            if (!isset($bestActivities[$userid])) {

                $user = User::findOrFail($userid);
                $username = $user['username'];
                $score = $activity->score;
                $time = $activity->time;

                $bestActivities[$userid] = [
                    'username' => $username,
                    'score' => $score,
                    'time' => $time
                ];
            }
        });

        return array_values($bestActivities);
    }
}
