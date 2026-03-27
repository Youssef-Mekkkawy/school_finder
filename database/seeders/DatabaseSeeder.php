<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SchoolTypeSeeder::class,   // 9 types
            CurriculumSeeder::class,   // 11 curricula
            SchoolSeeder::class,       // 105 schools + 105 locations inline + fees
            UserSeeder::class,         // 2 test users
            AdminSeeder::class,        // 4 admins
            ReviewSeeder::class,       // 10 reviews
            HomepageSettingSeeder::class,
        ]);
    }
}
