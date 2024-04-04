<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i<100 ; $i++)
        {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@example.com',
                'user_type' => 'admin',
                'password' => Hash::make('password'),
            ]);
        }
        for($i = 0; $i<1000 ; $i++)
        {
            DB::table('users')->insert([
                'name' => Str::random(5),
                'email' => Str::random(5).'@example.com',
                'user_type' => 'user',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
