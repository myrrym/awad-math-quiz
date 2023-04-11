<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class ActivityController extends Controller
{
    function getActivities()
    {
        return Activity::all()->sortByDesc('created_at');
    }

    function getBestActivity()
    {
        $data = Activity::all();
        $bestScore = $data->max('score');
        $bestActivity = $data->where('score', $bestScore)->first();
        return $bestActivity;
    }
}
