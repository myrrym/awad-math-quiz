<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Achievement;
use App\Models\user_achievement;

class AchievementController extends Controller
{
    public function checkExistence($checkType, $id)
    {
        $run = 'true';
        $userRecords = user_achievement::where('user_id', $id)->get();

        foreach ($userRecords as $userRecord) {
            if ($userRecord['user_id'] === $id && $userRecord['achievement_id'] === $checkType) {
                $run = 'false';
                break;
            }
        }

        return $run;
    }
    public function insertRecord($id, $achievement_id)
    {
        user_achievement::create([
            'user_id' => $id,
            'achievement_id' => $achievement_id,
            'achieved_at' => now()
        ]);
    }
    function getTenGames($id)
    {
        if (static::checkExistence(2, $id)) {
            $total = count(Activity::where('user_id', $id)->get());
            if ($total >= 10) {
                static::insertRecord($id, 2);
            }
        }

        $result = user_achievement::where('user_id', $id)->where('achievement_id', 2);

        if ($result->count() === 0)
            return 'false';

        else
            return 'true';
    }

    function getTwentyGames($id)
    {
        if (static::checkExistence(3, $id)) {
            $total = count(Activity::where('user_id', $id)->get());
            if ($total >= 20) {
                static::insertRecord($id, 3);
            }
        }
        $result = user_achievement::where('user_id', $id)->where('achievement_id', 3);

        if ($result->count() === 0)
            return 'false';

        else
            return 'true';
    }

    function getFiftyGames($id)
    {
        if (static::checkExistence(4, $id)) {
            $total = count(Activity::where('user_id', $id)->get());
            if ($total >= 50) {
                static::insertRecord($id, 4);
            }
        }
        $result = user_achievement::where('user_id', $id)->where('achievement_id', 4);

        if ($result->count() === 0)
            return 'false';

        else
            return 'true';
    }
    function getHundredGames($id)
    {
        if (static::checkExistence(5, $id)) {
            $total = count(Activity::where('user_id', $id)->get());
            if ($total >= 100) {
                static::insertRecord($id, 5);
            }
        }
        $result = user_achievement::where('user_id', $id)->where('achievement_id', 5);

        if ($result->count() === 0)
            return 'false';

        else
            return 'true';
    }


    function getTenScore($id)
    {
        if (static::checkExistence(6, $id)) {
            $data = Activity::where('user_id', $id)->get();
            $maxScoreRecord = $data->where('score', $data->max('score'))->first();
            if (isset($maxScoreRecord) && $maxScoreRecord->score >= 10) {
                static::insertRecord($id, 6);
            }
        }
        $result = user_achievement::where('user_id', $id)->where('achievement_id', 6);

        if ($result->count() === 0)
            return 'false';

        else
            return 'true';
    }

    function getFifteenScore($id)
    {
        if (static::checkExistence(7, $id)) {
            $data = Activity::where('user_id', $id)->get();
            $maxScoreRecord = $data->where('score', $data->max('score'))->first();
            if (isset($maxScoreRecord) && $maxScoreRecord->score >= 15) {
                static::insertRecord($id, 7);
            }
        }
        $result = user_achievement::where('user_id', $id)->where('achievement_id', 7);

        if ($result->count() === 0)
            return 'false';

        else
            return 'true';
    }

    function getFullScore($id)
    {
        if (static::checkExistence(8, $id)) {
            $data = Activity::where('user_id', $id)->get();
            $maxScoreRecord = $data->where('score', $data->max('score'))->first();
            if (isset($maxScoreRecord) && $maxScoreRecord->score >= 20) {
                static::insertRecord($id, 8);
            }
        }
        $result = user_achievement::where('user_id', $id)->where('achievement_id', 8);

        if ($result->count() === 0)
            return 'false';

        else
            return 'true';
    }

    function getWhatTheMeow($id)
    {
        if (static::checkExistence(9, $id)) {
            $data = Activity::where('user_id', $id)
                ->where('difficulty', 'What the meow')
                ->get();

            if ($data->count() > 0) {
                static::insertRecord($id, 9);
            }
        }
        $result = user_achievement::where('user_id', $id)->where('achievement_id', 9);

        if ($result->count() === 0)
            return 'false';

        else
            return 'true';
    }
}
