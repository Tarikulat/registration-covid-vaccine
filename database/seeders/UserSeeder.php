<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name'           => 'Test User',
            'email'          => 'test@example.com',
            'nid'            => '123456789', 
            'dob'            => Carbon::now()->subYears(25)->toDateString(), 
            'password'       => Hash::make('password'), 
            'remember_token' => Str::random(10),
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);
    }
}
