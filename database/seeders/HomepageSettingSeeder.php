<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomepageSettingSeeder extends Seeder
{
    public function run(): void
    {
        // NOTE: 'types' section is intentionally removed.
        // School types and their counts are now queried LIVE from the DB
        // in HomeController — no hardcoded data needed here.
        // Adding/removing schools automatically updates the homepage counts.

        $settings = [
            // ── Hero section ─────────────────────────────────────────────────
            'hero' => json_encode([
                'badge'    => 'Trusted by Parents in Cairo',
                'title'    => 'Find the Perfect School for Your Child',
                'subtitle' => 'Browse international schools in Cairo. Compare fees, curricula, and reviews — all in one place.',
                'btn_text' => 'Explore Schools',
                'cta_text' => 'Free to use. No sign-up required to browse.',
            ]),

            // ── Stats bar — these are display overrides only ──────────────────
            // HomeController uses live DB counts by default.
            // Only set this if you want to override with manual values.
            'stats' => json_encode([
                ['value' => null,   'label' => 'Schools Listed'],   // null = use live count
                ['value' => null,   'label' => 'Parent Reviews'],   // null = use live count
                ['value' => null,   'label' => 'Curricula Types'],  // null = use live count
                ['value' => 'Free', 'label' => 'Always Free'],
            ]),

            // ── Featured school IDs ───────────────────────────────────────────
            // IDs of schools to show in the Featured section.
            // If empty, HomeController falls back to 3 most recently added schools.
            'featured' => json_encode([8, 5, 15]),
        ];

        foreach ($settings as $key => $value) {
            DB::table('homepage_settings')->updateOrInsert(
                ['key'   => $key],
                ['value' => $value, 'updated_at' => now(), 'created_at' => now()]
            );
        }
    }
}
