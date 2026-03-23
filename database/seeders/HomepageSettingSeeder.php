<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomepageSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'hero' => json_encode([
                'badge'    => 'Trusted by Parents in Cairo',
                'title'    => 'Find the Perfect School for Your Child',
                'subtitle' => 'Browse 105+ international schools in Cairo. Compare fees, curricula, and reviews — all in one place.',
                'btn_text' => 'Explore Schools',
                'cta_text' => 'Free to use. No sign-up required to browse.',
            ]),

            'stats' => json_encode([
                ['value' => '105+',  'label' => 'Schools Listed'],
                ['value' => '500+',  'label' => 'Parent Reviews'],
                ['value' => '12',    'label' => 'Curricula Types'],
                ['value' => 'Free',  'label' => 'Always Free'],
            ]),

            'types' => json_encode([
                ['name' => 'British',   'icon' => '🇬🇧', 'desc' => 'IGCSE & A-Level curriculum'],
                ['name' => 'American',  'icon' => '🇺🇸', 'desc' => 'US Diploma & AP courses'],
                ['name' => 'German',    'icon' => '🇩🇪', 'desc' => 'Abitur & IB programmes'],
                ['name' => 'French',    'icon' => '🇫🇷', 'desc' => 'French Baccalaureate'],
                ['name' => 'IB World',  'icon' => '🌍', 'desc' => 'International Baccalaureate'],
                ['name' => 'Egyptian',  'icon' => '🏫', 'desc' => 'National curriculum'],
            ]),

            'featured' => json_encode([1, 2, 3]),
        ];

        foreach ($settings as $key => $value) {
            DB::table('homepage_settings')->updateOrInsert(
                ['key' => $key],
                ['value' => $value, 'updated_at' => now(), 'created_at' => now()]
            );
        }
    }
}
