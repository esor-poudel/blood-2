<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'esor',
            'email'=>'esor.poudel@gmail.com',
            'password'=>bcrypt('password'),
            'admin'=>1
        ]);

        User::create([
            'name'=>'sachin',
            'email'=>'sachin@gmail.com',
            'password'=>bcrypt('password'),
        ]);
    }
}
