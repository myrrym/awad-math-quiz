<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;

class AchievementsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    for ($i = 1; $i <= 9; $i++) {
        switch ($i) {
            case 1:
                $name = 'Create Account';
                $description = 'Create a new account on the website.';
                break;
            case 2:
                $name = 'Play 10 Games';
                $description = 'Play 10 games on the website.';
                break;
            case 3:
                $name = 'Play 20 Games';
                $description = 'Play 20 games on the website.';
                break;
            case 4:
                $name = 'Play 50 Games';
                $description = 'Play 50 games on the website.';
                break;
            case 5:
                $name = 'Play 100 Games';
                $description = 'Play 100 games on the website.';
                break;
            case 6:
                $name = 'Score 10 Points';
                $description = 'Score 10 points or more in a game.';
                break;
            case 7:
                $name = 'Score 15 Points';
                $description = 'Score 15 points or more in a game.';
                break;
            case 8:
                $name = 'Score Full Marks';
                $description = 'Score full marks in a game.';
                break;
            case 9:
                $name = 'Play What The Meow Mode';
                $description = 'Play a game in What The Meow mode.';
                break;
            }

            DB::table('achievements')->insert([
                'name' => $name,
                'description' => $description,
              ]);
        }
  }
}
