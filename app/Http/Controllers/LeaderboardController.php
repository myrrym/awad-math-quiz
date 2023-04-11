<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;


class LeaderboardController extends Controller
{
    function getActivities()
    {
        $data = Activity::all();
        return $data;
    }

    function getBestActivityPerUser()
    {
        $data = Activity::all()->where('difficulty', 'Easy');

        // Group records by username
        $groupedData = $data->groupBy('username');

        $bestActivities = [];

        // Find the best activity for each user
        foreach ($groupedData as $username => $activities) {
            // Sort activities by highest score first, then least time taken
            $sortedActivities = $activities->sortByDesc('score')->sortBy('time_taken');

            // Get the first (highest score, least time taken) activity
            $bestActivity = $sortedActivities->first();

            // Add the best activity to the array
            $bestActivities[$username] = $bestActivity;
        }

        // Sort users by highest score with the least amount of time taken
        uasort($bestActivities, function ($a, $b) {
            if ($a->score == $b->score) {
                return $a->time_taken <=> $b->time_taken;
            }
            return $b->score <=> $a->score;
        });

        return $bestActivities;
    }
}
