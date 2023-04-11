<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class AchievementController extends Controller
{
    function getTenGames()
    {
        $total = count(Activity::where('username', '2qrqVQRBYj')->get());
        if ($total >= 10)
            return 'true';
        else
            return 'false';
    }

    function getTwentyGames()
    {
        $total = count(Activity::where('username', '2qrqVQRBYj')->get());
        if ($total >= 20)
            return 'true';
        else
            return 'false';
    }

    function getFiftyGames()
    {
        $total = count(Activity::where('username', '2qrqVQRBYj')->get());
        if ($total >= 50)
            return 'true';
        else
            return 'false';
    }

    function getHundredGames()
    {
        $total = count(Activity::where('username', '2qrqVQRBYj')->get());
        if ($total >= 100)
            return 'true';
        else
            return 'false';
    }

    function getTenScore()
    {
        $data = Activity::where('username', '2qrqVQRBYj')->get();
        $maxScoreRecord = $data->where('score', $data->max('score'))->first();
        if ($maxScoreRecord->score >= 10)
            return 'true';
        else
            return 'false';
    }

    function getFifteenScore()
    {
        $data = Activity::where('username', '2qrqVQRBYj')->get();
        $maxScoreRecord = $data->where('score', $data->max('score'))->first();
        if ($maxScoreRecord->score >= 15)
            return 'true';
        else
            return 'false';
    }

    function getFullScore()
    {
        $data = Activity::where('username', '2qrqVQRBYj')->get();
        $maxScoreRecord = $data->where('score', $data->max('score'))->first();
        if ($maxScoreRecord->score >= 20)
            return 'true';
        else
            return 'false';
    }

    function getWhatTheMeow()
    {
        $data = Activity::where('username', '2qrqVQRBYj')
            ->where('difficulty', 'What the meow')
            ->get();

        if ($data->count() > 0) {
            return 'true';
        } else {
            return 'false';
        }
    }
}
