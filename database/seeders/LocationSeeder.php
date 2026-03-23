<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        $locations = [
            ['area' => 'Beverly Hills', 'city' => 'Sheikh Zayed',    'compound' => null, 'address' => 'Beverly Hills, Sheikh Zayed, Giza'],
            ['area' => 'Maadi',         'city' => 'Cairo',           'compound' => null, 'address' => 'Maadi, Cairo'],
            ['area' => 'El-Shorouk',    'city' => 'El-Shorouk City', 'compound' => null, 'address' => 'El-Shorouk City, Cairo'],
            ['area' => 'NewGiza',       'city' => '6th of October',  'compound' => null, 'address' => 'NewGiza, 6th of October, Giza'],
            ['area' => 'Maadi',         'city' => 'Cairo',           'compound' => null, 'address' => 'Maadi, Cairo'],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
