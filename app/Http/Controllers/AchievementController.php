<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Achievement;
use App\Models\user_achievement;

class AchievementController extends Controller
{
    public function checkExistence($checkType, $username)
    {
        $run = 'true';
        $userRecords = user_achievement::where('username', $username)->get();

        foreach ($userRecords as $userRecord) {
            if ($userRecord['username'] === $username && $userRecord['achievement_id'] === $checkType) {
                $run = 'false';
                break;
            }
        }

        return $run;
    }
    public function insertRecord($username, $achievement_id)
    {
        user_achievement::create([
            'username' => $username,
            'achievement_id' => $achievement_id,
            'achieved_at' => now()
        ]);
    }
    function getTenGames($username)
    {
        if (static::checkExistence(2, $username)) {
            $total = count(Activity::where('username', $username)->get());
            if ($total >= 10) {
                static::insertRecord($username, 2);
            }
        }

        $result = user_achievement::where('username', $username)->where('achievement_id', 2);

        if ($result->count() === 0)
            return 'false';

        else
            return 'true';
    }

    function getTwentyGames($username)
    {
        if (static::checkExistence(3, $username)) {
            $total = count(Activity::where('username', $username)->get());
            if ($total >= 20) {
                static::insertRecord($username, 3);
            }
        }
        $result = user_achievement::where('username', $username)->where('achievement_id', 3);

        if ($result->count() === 0)
            return 'false';

        else
            return 'true';
    }

    function getFiftyGames($username)
    {
        if (static::checkExistence(4, $username)) {
            $total = count(Activity::where('username', $username)->get());
            if ($total >= 50) {
                static::insertRecord($username, 4);
            }
        }
        $result = user_achievement::where('username', $username)->where('achievement_id', 4);

        if ($result->count() === 0)
            return 'false';

        else
            return 'true';
    }
    function getHundredGames($username)
    {
        if (static::checkExistence(5, $username)) {
            $total = count(Activity::where('username', $username)->get());
            if ($total >= 100) {
                static::insertRecord($username, 5);
            }
        }
        $result = user_achievement::where('username', $username)->where('achievement_id', 5);

        if ($result->count() === 0)
            return 'false';

        else
            return 'true';
    }


    function getTenScore($username)
    {
        if (static::checkExistence(6, $username)) {
            $data = Activity::where('username', $username)->get();
            $maxScoreRecord = $data->where('score', $data->max('score'))->first();
            if (isset($maxScoreRecord) && $maxScoreRecord->score >= 10) {
                static::insertRecord($username, 6);
            }
        }
        $result = user_achievement::where('username', $username)->where('achievement_id', 6);

        if ($result->count() === 0)
            return 'false';

        else
            return 'true';
    }

    function getFifteenScore($username)
    {
        if (static::checkExistence(7, $username)) {
            $data = Activity::where('username', $username)->get();
            $maxScoreRecord = $data->where('score', $data->max('score'))->first();
            if (isset($maxScoreRecord) && $maxScoreRecord->score >= 15) {
                static::insertRecord($username, 7);
            }
        }
        $result = user_achievement::where('username', $username)->where('achievement_id', 7);

        if ($result->count() === 0)
            return 'false';

        else
            return 'true';
    }

    function getFullScore($username)
    {
        if (static::checkExistence(8, $username)) {
            $data = Activity::where('username', $username)->get();
            $maxScoreRecord = $data->where('score', $data->max('score'))->first();
            if (isset($maxScoreRecord) && $maxScoreRecord->score >= 20) {
                static::insertRecord($username, 8);
            }
        }
        $result = user_achievement::where('username', $username)->where('achievement_id', 8);

        if ($result->count() === 0)
            return 'false';

        else
            return 'true';
    }

    function getWhatTheMeow($username)
    {
        if (static::checkExistence(9, $username)) {
            $data = Activity::where('username', $username)
                ->where('difficulty', 'What the meow')
                ->get();

            if ($data->count() > 0) {
                static::insertRecord($username, 9);
            }
        }
        $result = user_achievement::where('username', $username)->where('achievement_id', 9);

        if ($result->count() === 0)
            return 'false';

        else
            return 'true';
    }
}
