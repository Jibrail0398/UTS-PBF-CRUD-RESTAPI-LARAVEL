<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Akun Admin
        User::create(
            [
                'name' =>'admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt("admin"),
                'role' => 'admin'
            ]
            );

        //Akun User
        User::create(
            [
                'name' =>'jibrail',
                'email' => 'jibrail@gmail.com',
                'password' => bcrypt("jibrail"),
                'role' => 'user'
            ]
            );

    }
}
