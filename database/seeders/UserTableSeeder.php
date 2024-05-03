<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersData=[
            [
                'name'=>'admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('admin001'),
                'gender'=>'male',
                'role'=>'admin',
            ],
             [
                'name'=>'user',
                'email'=>'user@gmail.com',
                'password'=>bcrypt('user001'),
                'gender'=>'male',
                'role'=>'user',
            ]
            ];
            foreach($usersData as $user){
                // check user if not exist
                if(!User::where('email', $user['email'])->exists()){
                    User::create($user);
                }
            }
    }
}