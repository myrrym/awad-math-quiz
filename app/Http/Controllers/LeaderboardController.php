<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;


class LeaderboardController extends Controller
{

    public function getBestActivityPerUser ($difficulty)
    {
        $activities = Activity::where('difficulty', $difficulty)
            ->orderBy('score', 'desc')
            ->orderBy('time')
            ->get();
    
        $bestActivities = collect();
    
        $activities->each(function ($activity) use ($bestActivities) {
            if (!$bestActivities->has($activity->username)) {
                $bestActivities->put($activity->username, $activity);
            }
        });
    
        return $bestActivities->values();
    }
    
}
