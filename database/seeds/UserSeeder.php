<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'name' => 'Shubham Maurya',
        'email' => 'shubham123@gmail.com',
        'email_verified_at' => now(),
        'password' =>Hash::make(12345) , 
        'remember_token' => Str::random(10),
        ]);
    }
}
