<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name'     => 'Admin',
            'email'    => 'admin@Masar Education Platform.com',
            'password' => Hash::make('admin123'),
        ]);
        Admin::create([
            'name'     => 'Youssef Elsayed',
            'email'    => 'youssef@Masar Education Platform.com',
            'password' => Hash::make('admin123'),
        ]);
        Admin::create([
            'name'     => 'Omar Goda',
            'email'    => 'omar@Masar Education Platform.com',
            'password' => Hash::make('admin123'),
        ]);
        Admin::create([
            'name'     => 'Ahmed Yasser',
            'email'    => 'ahmed@Masar Education Platform.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
