<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\Fee;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    public function run(): void
    {
        // School 1: The British International School Cairo
        $s1 = School::create([
            'name'        => 'The British International School Cairo',
            'type_id'     => 1, // British
            'location_id' => 1, // Beverly Hills Sheikh Zayed
            'email'       => 'admissions@bisc.edu.eg',
            'phone'       => '+202 3857 0000',
            'website'     => 'https://www.bisc.edu.eg',
            'age_min'     => 3,
            'age_max'     => 18,
            'class_size_avg' => 18,
            'transport'   => 'Available on request',
        ]);
        $s1->curricula()->attach([1, 2]); // IGCSE, IB Diploma
        Fee::create([
            'school_id'    => $s1->id,
            'academic_year' => '2024/2025',
            'tuition_min'  => 420000,
            'tuition_max'  => 1097000,
            'currency'     => 'EGP',
        ]);

        // School 2: Cairo American College
        $s2 = School::create([
            'name'        => 'Cairo American College',
            'type_id'     => 2, // American
            'location_id' => 2, // Maadi Cairo
            'email'       => 'info@cacegypt.org',
            'phone'       => '+202 2755 0000',
            'website'     => 'https://www.cacegypt.org',
            'age_min'     => 4,
            'age_max'     => 18,
            'class_size_avg' => 15,
            'transport'   => 'Not available',
        ]);
        $s2->curricula()->attach([3, 2]); // American Diploma, IB Diploma
        Fee::create([
            'school_id'    => $s2->id,
            'academic_year' => '2024/2025',
            'tuition_min'  => 27000,
            'tuition_max'  => 35000,
            'currency'     => 'USD',
        ]);

        // School 3: Rahn Schulen Kairo
        $s3 = School::create([
            'name'        => 'Rahn Schulen Kairo',
            'type_id'     => 3, // German
            'location_id' => 3, // El-Shorouk City
            'email'       => 'info@rsk-kairo.de',
            'phone'       => '+202 2630 0000',
            'website'     => 'https://rsk-kairo.de',
            'age_min'     => 3,
            'age_max'     => 18,
            'transport'   => 'Available',
        ]);
        $s3->curricula()->attach([2, 4]); // IB Diploma, Abitur
        Fee::create([
            'school_id'    => $s3->id,
            'academic_year' => '2024/2025',
            'tuition_min'  => 137000,
            'tuition_max'  => 217000,
            'currency'     => 'EGP',
        ]);

        // School 4: El Alsson British & American School
        $s4 = School::create([
            'name'        => 'El Alsson British & American School',
            'type_id'     => 1, // British
            'location_id' => 4, // NewGiza 6th of October
            'email'       => 'info@alsson.com',
            'phone'       => '+2 16127',
            'website'     => 'https://www.alsson.com',
            'age_min'     => 3,
            'age_max'     => 18,
            'class_size_avg' => 22,
            'transport'   => 'Available',
        ]);
        $s4->curricula()->attach([1, 2, 3]); // IGCSE, IB Diploma, American Diploma
        Fee::create([
            'school_id'    => $s4->id,
            'academic_year' => '2024/2025',
            'tuition_min'  => 218000,
            'tuition_max'  => 352000,
            'currency'     => 'EGP',
        ]);

        // School 5: Lycée Français Simone de Beauvoir
        $s5 = School::create([
            'name'        => 'Lycée Français Simone de Beauvoir',
            'type_id'     => 4, // French
            'location_id' => 5, // Maadi Cairo
            'email'       => 'info@lycee-beauvoir.edu.eg',
            'phone'       => '+202 2537 0000',
            'website'     => 'https://lycee-beauvoir.edu.eg',
            'age_min'     => 3,
            'age_max'     => 18,
            'transport'   => 'Available',
        ]);
        $s5->curricula()->attach([5]); // French Baccalaureate
        Fee::create([
            'school_id'    => $s5->id,
            'academic_year' => '2024/2025',
            'tuition_min'  => 94000,
            'tuition_max'  => 207000,
            'currency'     => 'EGP',
        ]);
    }
}
