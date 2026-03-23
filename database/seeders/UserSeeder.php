<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Omar Ahmed',
            'email'    => 'omar@test.com',
            'password' => Hash::make('password123'),
        ]);

        User::create([
            'name'     => 'Sara Mohamed',
            'email'    => 'sara@test.com',
            'password' => Hash::make('password123'),
        ]);
    }
}
