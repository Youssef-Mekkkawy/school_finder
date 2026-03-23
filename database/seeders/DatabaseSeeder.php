<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SchoolTypeSeeder::class,
            CurriculumSeeder::class,
            LocationSeeder::class,
            SchoolSeeder::class,
            UserSeeder::class,
            AdminSeeder::class,
            ReviewSeeder::class,
            HomepageSettingSeeder::class,
        ]);
    }
}
