<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        for ($i = 1; $i < 10; $i++) {
            $randomNumber = rand(1, 20);
            $randomDifficultyNum = rand(1,4);

            switch ($randomDifficultyNum) {
                case 1:
                  $randomString = 'Easy';
                  break;
                case 2:
                  $randomString = 'Medium';
                  break;
                case 3:
                  $randomString = 'Hard';
                  break;
                case 4:
                  $randomString = 'What the meow';
                  break;
              }
              
              $user = $users -> random();

              //$time = rand(1, 20);

            DB::table('activities')->insert([
                'name' => $user->username,
                'score' => $randomNumber,
                'difficulty' => $randomString,
                //'time' => $time,
            ]);
        }
    }
}
