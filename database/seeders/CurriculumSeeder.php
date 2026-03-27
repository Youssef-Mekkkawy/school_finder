<?php

namespace Database\Seeders;

use App\Models\Curriculum;
use Illuminate\Database\Seeder;

class CurriculumSeeder extends Seeder
{
    public function run(): void
    {
        $curricula = [
            ['name' => 'International General Certificate of Secondary Education', 'abbreviation' => 'IGCSE'],   // 1
            ['name' => 'International Baccalaureate Diploma',                      'abbreviation' => 'IB Diploma'], // 2
            ['name' => 'American Diploma',                                          'abbreviation' => 'American Diploma'], // 3
            ['name' => 'Abitur',                                                    'abbreviation' => 'Abitur'],  // 4
            ['name' => 'French Baccalaureate',                                      'abbreviation' => 'French Baccalaureate'], // 5
            ['name' => 'Advanced Level',                                            'abbreviation' => 'A-Levels'], // 6
            ['name' => 'British Columbia Dogwood Diploma',                          'abbreviation' => 'Dogwood Diploma'], // 7
            ['name' => 'Ontario Secondary School Diploma',                          'abbreviation' => 'OSSD'],   // 8
            ['name' => 'Manitoba High School Diploma',                              'abbreviation' => 'Manitoba Diploma'], // 9
            ['name' => 'High School Diploma',                                       'abbreviation' => 'High School Diploma'], // 10
            ['name' => 'Thanaweya Amma',                                            'abbreviation' => 'Thanaweya Amma'], // 11
        ];

        foreach ($curricula as $curriculum) {
            Curriculum::create($curriculum);
        }
    }
}
