<?php

namespace Database\Seeders;

use App\Models\Curriculum;
use Illuminate\Database\Seeder;

class CurriculumSeeder extends Seeder
{
    public function run(): void
    {
        $curricula = [
            ['name' => 'International General Certificate of Secondary Education', 'abbreviation' => 'IGCSE'],
            ['name' => 'International Baccalaureate Diploma',                      'abbreviation' => 'IB Diploma'],
            ['name' => 'American Diploma',                                         'abbreviation' => 'American Diploma'],
            ['name' => 'Abitur',                                                   'abbreviation' => 'Abitur'],
            ['name' => 'French Baccalaureate',                                     'abbreviation' => 'French Baccalaureate'],
        ];

        foreach ($curricula as $curriculum) {
            Curriculum::create($curriculum);
        }
    }
}
