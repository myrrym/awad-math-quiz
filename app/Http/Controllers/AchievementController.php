<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Achievement;


class AchievementController extends Controller
{
    function getTenGames($username)
    {
        $total = count(Achievement::where('username', $username)->get());
        if ($total >= 10)
            return 'true';
        else
            return 'false';
    }

    function getTwentyGames($username)
    {
        $total = count(Activity::where('username', $username)->get());
        if ($total >= 20)
            return 'true';
        else
            return 'false';
    }

    function getFiftyGames($username)
    {
        $total = count(Activity::where('username', $username)->get());
        if ($total >= 50)
            return 'true';
        else
            return 'false';
    }

    function getHundredGames($username)
    {
        $total = count(Activity::where('username', $username)->get());
        if ($total >= 100)
            return 'true';
        else
            return 'false';
    }

    function getTenScore($username)
    {
        $data = Activity::where('username', $username)->get();
        $maxScoreRecord = $data->where('score', $data->max('score'))->first();
        if (isset($maxScoreRecord) && $maxScoreRecord->score >= 10)
            return 'true';
        else
            return 'false';
    }

    function getFifteenScore($username)
    {
        $data = Activity::where('username', $username)->get();
        $maxScoreRecord = $data->where('score', $data->max('score'))->first();
        if (isset($maxScoreRecord) && $maxScoreRecord->score >= 15)
            return 'true';
        else
            return 'false';
    }

    function getFullScore($username)
    {
        $data = Activity::where('username', $username)->get();
        $maxScoreRecord = $data->where('score', $data->max('score'))->first();
        if (isset($maxScoreRecord) && $maxScoreRecord->score >= 20)
            return 'true';
        else
            return 'false';
    }

    function getWhatTheMeow($username)
    {
        $data = Activity::where('username', $username)
            ->where('difficulty', 'What the meow')
            ->get();

        if ($data->count() > 0) {
            return 'true';
        } else {
            return 'false';
        }
    }
}
