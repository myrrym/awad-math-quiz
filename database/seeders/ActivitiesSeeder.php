<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;

class ActivitiesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $users = User::all();

    for ($i = 1; $i < 100; $i++) {
      $randomNumber = rand(1, 20);
      $randomDifficultyNum = rand(1, 4);

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

      $user = $users->random();
      $timestamp = Carbon::now()->subSeconds(mt_rand(1, 20))->addMilliseconds(mt_rand(0, 999));
      $time = rand(1, 100) . '.' . rand(0, 99);

      DB::table('activities')->insert([
        'username' => $user->username,
        'score' => $randomNumber,
        'difficulty' => $randomString,
        'time' => $time,
        'created_at' => $timestamp
      ]);
    }
  }
}
