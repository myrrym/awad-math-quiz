<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Achievement;

class UserAchievementsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run()
  {
      $users = User::all();
      $achievements = Achievement::all();

      foreach ($users as $user) {
          // Get a random achievement for the user
          $achievement = $achievements->random();

          // Insert into user_achievements table
          DB::table('user_achievements')->insert([
            'user_id' => $user->id,
            'achievement_id' => $achievement->id,
            'achieved_at' => now(),
          ]);
      }
  }
}
