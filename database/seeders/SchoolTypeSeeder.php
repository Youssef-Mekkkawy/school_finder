<?php

namespace Database\Seeders;

use App\Models\SchoolType;
use Illuminate\Database\Seeder;

class SchoolTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            ['name' => 'British'],       // 1
            ['name' => 'American'],      // 2
            ['name' => 'German'],        // 3
            ['name' => 'French'],        // 4
            ['name' => 'Egyptian'],      // 5
            ['name' => 'International'], // 6
            ['name' => 'Canadian'],      // 7
            ['name' => 'Montessori'],    // 8
            ['name' => 'IB World'],      // 9
        ];

        foreach ($types as $type) {
            SchoolType::create($type);
        }
    }
}
