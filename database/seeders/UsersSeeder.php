<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $username = Str::random(10);

            DB::table('users')->insert([
                'username' => $username,
                'email' => $username . '@gmail.com',
                'password' => 'password',
                'picture' => 'cat'.rand(1,9).'.jpg',
                'created_at' => now(),
            ]);
        }
    }
}
