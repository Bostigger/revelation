<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            ['name'=>'Administrator','email'=>'admin@email.com','email_verified_at'=>'2020-01-01 19:00:00','password'=>Hash::make('secret4admin')]
        ]);
    }
}
