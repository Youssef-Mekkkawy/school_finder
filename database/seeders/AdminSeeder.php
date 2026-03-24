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
            'email'    => 'admin@schoolfinder.com',
            'password' => Hash::make('admin123'),
        ]);
        Admin::create([
            'name'     => 'Admin Youssef Elsayed',
            'email'    => 'youssef@schoolfinder.com',
            'password' => Hash::make('admin123'),
        ]);
        Admin::create([
            'name'     => 'Admin Omar Goda',
            'email'    => 'omar@schoolfinder.com',
            'password' => Hash::make('admin123'),
        ]);
        Admin::create([
            'name'     => 'Admin Ahmed Yasser',
            'email'    => 'ahmed@schoolfinder.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
