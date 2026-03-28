<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            // Original test users
            ['name' => 'Omar Ahmed',       'email' => 'omar@test.com',      'password' => 'password123'],
            ['name' => 'Sara Mohamed',     'email' => 'sara@test.com',      'password' => 'password123'],

            // Additional realistic Egyptian parents for reviews
            ['name' => 'Ahmed Hassan',     'email' => 'ahmed.h@test.com',   'password' => 'password123'],
            ['name' => 'Nour El-Din',      'email' => 'nour@test.com',      'password' => 'password123'],
            ['name' => 'Layla Ibrahim',    'email' => 'layla@test.com',     'password' => 'password123'],
            ['name' => 'Khaled Farouk',   'email' => 'khaled@test.com',    'password' => 'password123'],
            ['name' => 'Dina Mostafa',    'email' => 'dina@test.com',      'password' => 'password123'],
            ['name' => 'Tarek Saleh',     'email' => 'tarek@test.com',     'password' => 'password123'],
            ['name' => 'Rania Kamel',     'email' => 'rania@test.com',     'password' => 'password123'],
            ['name' => 'Youssef Ali',     'email' => 'youssef@test.com',   'password' => 'password123'],
            ['name' => 'Mariam Samir',    'email' => 'mariam@test.com',    'password' => 'password123'],
            ['name' => 'Hossam Nabil',    'email' => 'hossam@test.com',    'password' => 'password123'],
            ['name' => 'Noha Gamal',      'email' => 'noha@test.com',      'password' => 'password123'],
            ['name' => 'Sherif Mansour',  'email' => 'sherif@test.com',    'password' => 'password123'],
            ['name' => 'Amira Fouad',     'email' => 'amira@test.com',     'password' => 'password123'],
        ];

        foreach ($users as $user) {
            User::create([
                'name'     => $user['name'],
                'email'    => $user['email'],
                'password' => Hash::make($user['password']),
            ]);
        }
    }
}
