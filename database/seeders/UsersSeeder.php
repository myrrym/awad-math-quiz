<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 10; $i++) {
            DB::table('users')->insert([
                'email' => Str::random(10) . 'gmail.com',
                'username' => Str::random(10),
                'password' => 'password',
            ]);
        }
    }
}
