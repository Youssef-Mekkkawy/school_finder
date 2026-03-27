<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * LocationSeeder
 *
 * Locations are now created inline inside SchoolSeeder.
 * Each school creates its own Location row.
 * This file is kept for backwards compatibility only.
 */
class LocationSeeder extends Seeder
{
    public function run(): void
    {
        // Locations are now handled inline in SchoolSeeder.
        // Each school creates its own Location row with full address data.
    }
}
