<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Models\User::create([
           'name' => 'Davy Swai',
           'section' => 'Bwana Shamba',
           'userType' => 'admin',
           'avatar' => 'https://kilimofy.s3.amazonaws.com/Uploads/avatars/default.png',
           'status' => 'Authorized',
           'email' => 'davyswai@gmail.com',
           'password' => '$2y$10$n/FcIAGFDIgfEeszGfMcZOLQlC5z3dnYx5cu5K2QhumJyL/JTLRuO',
           'remember_token' => NULL,
           'created_at' => '2022-08-05 10:28:06',
           'updated_at' => '2022-08-06 10:28:33',
       ]);
    }
}
