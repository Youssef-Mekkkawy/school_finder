<?php

namespace Database\Seeders;

use App\Models\SchoolType;
use Illuminate\Database\Seeder;

class SchoolTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = ['British', 'American', 'German', 'French', 'Egyptian', 'International'];

        foreach ($types as $type) {
            SchoolType::create(['name' => $type]);
        }
    }
}
