<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class LeaderboardController extends Controller
{
    function getActivities()
    {
        $data = Activity::all();
        return $data;
    }
}
