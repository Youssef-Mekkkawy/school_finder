<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\Location;
use App\Models\Fee;
use Illuminate\Database\Seeder;

/**
 * SchoolSeeder
 *
 * Seeds all 105 international schools in Egypt.
 * Each school gets its own Location row.
 * Fee row is only created when fees are publicly available.
 *
 * Type IDs:
 *   1=British  2=American  3=German  4=French  5=Egyptian
 *   6=International  7=Canadian  8=Montessori  9=IB World
 *
 * Curriculum IDs:
 *   1=IGCSE  2=IB Diploma  3=American Diploma  4=Abitur  5=French Bac
 *   6=A-Levels  7=Dogwood Diploma  8=OSSD  9=Manitoba Diploma
 *   10=High School Diploma  11=Thanaweya Amma
 */
class SchoolSeeder extends Seeder
{
    public function run(): void
    {
        $schools = [

            // ──────────────────────────────────────────────
            // 1  Rahn Schulen Kairo
            // ──────────────────────────────────────────────
            [
                'name'           => 'Rahn Schulen Kairo',
                'type_id'        => 3,
                'email'          => 'info@rsk-kairo.de',
                'phone'          => '+20 2 2630 0000',
                'website'        => 'https://rsk-kairo.de',
                'facebook'       => 'https://www.facebook.com/rahnschulenkairo',
                'instagram'      => 'https://www.instagram.com/rahnschulenkairo/',
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => 'Available',
                'location'       => ['area' => 'El-Shorouk', 'city' => 'El-Shorouk City', 'compound' => "N/A", 'address' => 'El-Shorouk City, Cairo, Egypt'],
                'curricula'      => [2, 4],
                'fee'            => ['tuition_min' => 137400, 'tuition_max' => 217000, 'currency' => 'EGP', 'academic_year' => '2025/2026'],
            ],

            // ──────────────────────────────────────────────
            // 2  Modern School of Egypt 2000 (MSE)
            // ──────────────────────────────────────────────
            [
                'name'           => 'Modern School of Egypt 2000 (MSE)',
                'type_id'        => 1,
                'email'          => 'info@mse2000.com',
                'phone'          => '+202 2617 0000',
                'website'        => 'http://mse2000.com',
                'facebook'       => 'https://www.facebook.com/mse2000official',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [1, 3, 5],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 3  Maadi Narmer School (MNS)
            // ──────────────────────────────────────────────
            [
                'name'           => 'Maadi Narmer School (MNS)',
                'type_id'        => 1,
                'email'          => 'info@narmerschools.edu.eg',
                'phone'          => '+202 2358 0000',
                'website'        => 'https://narmerschools.edu.eg',
                'facebook'       => 'https://www.facebook.com/MaadiNarmerSchool',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Maadi', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'Maadi, Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 4  Lycée Albert Camus
            // ──────────────────────────────────────────────
            [
                'name'           => 'Lycée Albert Camus',
                'type_id'        => 4,
                'email'          => 'info@lycee-albert-camus.com',
                'phone'          => '+202 2537 0000',
                'website'        => 'http://www.lycee-albert-camus.com',
                'facebook'       => 'https://www.facebook.com/lycee.albert.camus.egypte',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [5],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 5  Gamma International College
            // ──────────────────────────────────────────────
            [
                'name'           => 'Gamma International College',
                'type_id'        => 6,
                'email'          => "N/A",
                'phone'          => "N/A",
                'website'        => "N/A",
                'facebook'       => "N/A",
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'Cairo, Egypt'],
                'curricula'      => [],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 6  Green Land Pré Vert International School (GPIS)
            // ──────────────────────────────────────────────
            [
                'name'           => 'Green Land Pré Vert International School (GPIS)',
                'type_id'        => 9,
                'email'          => 'info@gpis.edu.eg',
                'phone'          => '+20 2 3381 0000',
                'website'        => 'http://www.gpis.edu.eg',
                'facebook'       => 'https://www.facebook.com/GPISchools',
                'instagram'      => 'https://www.instagram.com/gpischools/',
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => 18,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Giza', 'city' => 'Giza', 'compound' => "N/A", 'address' => 'Giza / New Cairo, Egypt'],
                'curricula'      => [2],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 7  British Ramses School Katamya
            // ──────────────────────────────────────────────
            [
                'name'           => 'British Ramses School Katamya',
                'type_id'        => 1,
                'email'          => 'info@brs-eg.com',
                'phone'          => '+202 2727 0000',
                'website'        => 'https://brs-eg.com',
                'facebook'       => 'https://www.facebook.com/BRSKatamya',
                'instagram'      => "N/A",
                'age_min'        => 4,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Katamya', 'city' => 'New Cairo', 'compound' => "N/A", 'address' => 'Katamya, New Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 8  Sama American School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Sama American School',
                'type_id'        => 2,
                'email'          => 'info@sama-school.com',
                'phone'          => '+202 2537 0000',
                'website'        => 'http://sama-school.com',
                'facebook'       => 'https://www.facebook.com/SamaAmericanSchool',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 9  Manchester International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Manchester International School',
                'type_id'        => 1,
                'email'          => 'info@manchester-international-school.com',
                'phone'          => '+20 100 000 0000',
                'website'        => 'http://manchester-international-school.com',
                'facebook'       => 'https://www.facebook.com/ManchesterInternationalSchool',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 10  Hayah International Academy
            // ──────────────────────────────────────────────
            [
                'name'           => 'Hayah International Academy',
                'type_id'        => 9,
                'email'          => 'info@hayahacademy.com',
                'phone'          => '+202 2617 0000',
                'website'        => 'http://hayahacademy.com',
                'facebook'       => 'https://www.facebook.com/hayahacademy',
                'instagram'      => 'https://www.instagram.com/hayahacademy/',
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => 20,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [2, 3],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 11  Manaret Heliopolis International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Manaret Heliopolis International School',
                'type_id'        => 9,
                'email'          => 'info@mhis.edu.eg',
                'phone'          => '+202 2630 0000',
                'website'        => 'https://mhis.edu.eg',
                'facebook'       => 'https://www.facebook.com/ManaretHeliopolisInternationalSchool',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 17,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'El-Shorouk', 'city' => 'El-Shorouk City', 'compound' => "N/A", 'address' => 'El-Shorouk City, Cairo, Egypt'],
                'curricula'      => [2],
                'fee'            => ['tuition_min' => 55000, 'tuition_max' => 140000, 'currency' => 'EGP', 'academic_year' => '2024/2025'],
            ],

            // ──────────────────────────────────────────────
            // 12  Repton Cairo
            // ──────────────────────────────────────────────
            [
                'name'           => 'Repton Cairo',
                'type_id'        => 1,
                'email'          => 'info@reptoncairo.org',
                'phone'          => '+2 16127',
                'website'        => 'https://www.reptoncairo.org',
                'facebook'       => 'https://www.facebook.com/ReptonCairo',
                'instagram'      => 'https://www.instagram.com/reptoncairo/',
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => 15,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Mivida', 'city' => 'New Cairo', 'compound' => 'Mivida', 'address' => 'Mivida, New Cairo, Egypt'],
                'curricula'      => [1, 6],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 13  Saxony International School Cairo West (SIS)
            // ──────────────────────────────────────────────
            [
                'name'           => 'Saxony International School Cairo West (SIS)',
                'type_id'        => 3,
                'email'          => 'info@sis-cairo-west.com',
                'phone'          => '+2 15243',
                'website'        => 'https://sis-cairo-west.com',
                'facebook'       => 'https://www.facebook.com/siscairowest',
                'instagram'      => 'https://www.instagram.com/siscairowest/',
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => 18,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Giza', 'city' => '6th of October', 'compound' => 'New Giza', 'address' => 'New Giza, 6th of October City, Egypt'],
                'curricula'      => [4],
                'fee'            => ['tuition_min' => 135000, 'tuition_max' => 225000, 'currency' => 'EGP', 'academic_year' => '2025/2026'],
            ],

            // ──────────────────────────────────────────────
            // 14  Stanford International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Stanford International School',
                'type_id'        => 2,
                'email'          => 'info@stanfordschool.edu.eg',
                'phone'          => '+202 2308 0000',
                'website'        => 'http://stanfordschool.edu.eg',
                'facebook'       => 'https://www.facebook.com/StanfordInternationalSchoolEgypt',
                'instagram'      => "N/A",
                'age_min'        => 6,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'El Banafseg', 'city' => 'New Cairo', 'compound' => "N/A", 'address' => 'El Banafseg 1, First Settlement, New Cairo, Egypt'],
                'curricula'      => [1, 3],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 15  The International School of Egypt (ISE)
            // ──────────────────────────────────────────────
            [
                'name'           => 'The International School of Egypt (ISE)',
                'type_id'        => 2,
                'email'          => 'info@isegypt.org',
                'phone'          => '+202 2537 0000',
                'website'        => 'http://isegypt.org',
                'facebook'       => 'https://www.facebook.com/ISEgypt',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 16  Pakistan International School Cairo
            // ──────────────────────────────────────────────
            [
                'name'           => 'Pakistan International School Cairo',
                'type_id'        => 6,
                'email'          => 'info@pisc.edu.eg',
                'phone'          => '+20 2 3835 0000',
                'website'        => 'https://pisc.edu.eg',
                'facebook'       => "N/A",
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => '6th of October', 'city' => 'Giza', 'compound' => "N/A", 'address' => '6th of October City, Giza, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 17  Leaders International College
            // ──────────────────────────────────────────────
            [
                'name'           => 'Leaders International College',
                'type_id'        => 9,
                'email'          => 'info@leaders-college.com',
                'phone'          => '+20 100 000 0000',
                'website'        => 'http://leaders-college.com',
                'facebook'       => 'https://www.facebook.com/LeadersInternationalCollege',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => 'Southern Investors Area', 'address' => 'Southern Investors Area, New Cairo, Egypt'],
                'curricula'      => [2, 3],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 18  Nile International College
            // ──────────────────────────────────────────────
            [
                'name'           => 'Nile International College',
                'type_id'        => 9,
                'email'          => 'info@nic.edu.eg',
                'phone'          => "N/A",
                'website'        => 'http://nic.edu.eg',
                'facebook'       => "N/A",
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 11,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [2],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 19  Uptown International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Uptown International School',
                'type_id'        => 9,
                'email'          => 'info@uptowninternationalschool.com',
                'phone'          => '+2 16127',
                'website'        => 'https://uptowninternationalschool.com',
                'facebook'       => 'https://www.facebook.com/UptownInternationalSchool',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 16,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Mokattam', 'city' => 'Cairo', 'compound' => 'Uptown Cairo', 'address' => 'Uptown Cairo, Mokattam, Egypt'],
                'curricula'      => [2],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 20  CADMUS International School – Alburouj
            // ──────────────────────────────────────────────
            [
                'name'           => 'CADMUS International School – Alburouj',
                'type_id'        => 6,
                'email'          => 'info@cadmusalburouj.sabis.net',
                'phone'          => '+20 100 000 0000',
                'website'        => 'https://cadmusalburouj.sabis.net',
                'facebook'       => 'https://www.facebook.com/CADMUSAlburouj',
                'instagram'      => 'https://www.instagram.com/cadmusalburouj/',
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => 20,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Alburouj', 'city' => 'Cairo', 'compound' => 'Alburouj', 'address' => 'Alburouj Compound, Cairo-Ismailia Desert Road, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 21  GEMS British International School Madinaty
            // ──────────────────────────────────────────────
            [
                'name'           => 'GEMS British International School Madinaty',
                'type_id'        => 1,
                'email'          => 'info_bsm@gemsedu.com',
                'phone'          => '+2 16127',
                'website'        => 'https://www.gemsbritishschool-madinaty.com',
                'facebook'       => 'https://www.facebook.com/GEMSMadinaty',
                'instagram'      => 'https://www.instagram.com/gemsmadinaty/',
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Madinaty', 'city' => 'Cairo', 'compound' => 'Madinaty', 'address' => 'Madinaty, Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 22  GEMS British School Al Rehab
            // ──────────────────────────────────────────────
            [
                'name'           => 'GEMS British School Al Rehab',
                'type_id'        => 1,
                'email'          => 'info_bsr@gemsedu.com',
                'phone'          => '+2 16127',
                'website'        => 'https://www.gemsbritishschool-alrehab.com',
                'facebook'       => 'https://www.facebook.com/GEMSAlRehab',
                'instagram'      => 'https://www.instagram.com/gemsalrehab/',
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Al Rehab', 'city' => 'New Cairo', 'compound' => 'Al Rehab City', 'address' => 'Al Rehab City, New Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => ['tuition_min' => 100750, 'tuition_max' => 225599, 'currency' => 'EGP', 'academic_year' => '2024/2025'],
            ],

            // ──────────────────────────────────────────────
            // 23  American School Beverly Hills Cairo
            // ──────────────────────────────────────────────
            [
                'name'           => 'American School Beverly Hills Cairo',
                'type_id'        => 2,
                'email'          => 'info@beverlyhillsschool.com',
                'phone'          => '+202 3857 0000',
                'website'        => 'http://beverlyhillsschool.com',
                'facebook'       => 'https://www.facebook.com/BeverlyHillsSchool',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Beverly Hills', 'city' => 'Sheikh Zayed', 'compound' => 'Beverly Hills', 'address' => 'Beverly Hills, Sheikh Zayed City, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 24  King's School The Crown
            // ──────────────────────────────────────────────
            [
                'name'           => "King's School The Crown",
                'type_id'        => 1,
                'email'          => 'admissions@kingsschoolthecrown.com',
                'phone'          => '+20 100 000 0000',
                'website'        => 'https://www.kingsschoolthecrown.com',
                'facebook'       => 'https://www.facebook.com/kingsschoolthecrown',
                'instagram'      => 'https://www.instagram.com/kingsschoolthecrown/',
                'age_min'        => 1,
                'age_max'        => 18,
                'class_size_avg' => 15,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'The Crown', 'city' => '6th of October', 'compound' => 'The Crown', 'address' => 'The Crown, 6th of October City, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 25  New Vision International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'New Vision International School',
                'type_id'        => 9,
                'email'          => 'info@nvis.edu.eg',
                'phone'          => '+202 3857 0000',
                'website'        => 'http://nvis.edu.eg',
                'facebook'       => 'https://www.facebook.com/NVIS.Egypt',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Sheikh Zayed', 'city' => 'Sheikh Zayed City', 'compound' => "N/A", 'address' => 'Sheikh Zayed City, Egypt'],
                'curricula'      => [2, 3],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 26  Marvel International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Marvel International School',
                'type_id'        => 1,
                'email'          => 'info@marvel-school.com',
                'phone'          => "N/A",
                'website'        => 'http://marvel-school.com',
                'facebook'       => 'https://www.facebook.com/MarvelSchool',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 27  Salahaldin International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Salahaldin International School',
                'type_id'        => 2,
                'email'          => 'info@sis.edu.eg',
                'phone'          => '+202 2617 0000',
                'website'        => 'http://sis.edu.eg',
                'facebook'       => 'https://www.facebook.com/SalahaldinSchool',
                'instagram'      => "N/A",
                'age_min'        => 4,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [3, 2],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 28  Windrose Academy
            // ──────────────────────────────────────────────
            [
                'name'           => 'Windrose Academy',
                'type_id'        => 1,
                'email'          => 'info@windroseacademy.com',
                'phone'          => '+20 2 2727 0000',
                'website'        => 'http://windroseacademy.com',
                'facebook'       => 'https://www.facebook.com/WindroseAcademy',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 29  El Alsson British and American International Schools NewGiza
            // ──────────────────────────────────────────────
            [
                'name'           => 'El Alsson British and American International Schools NewGiza',
                'type_id'        => 1,
                'email'          => 'info@alsson.com',
                'phone'          => '+2 16127',
                'website'        => 'https://www.alsson.com',
                'facebook'       => 'https://www.facebook.com/ElAlsson',
                'instagram'      => 'https://www.instagram.com/elalsson/',
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => 22,
                'num_students'   => null,
                'transport'      => 'Available',
                'location'       => ['area' => 'NewGiza', 'city' => '6th of October', 'compound' => 'NewGiza', 'address' => 'NewGiza, 6th of October City, Egypt'],
                'curricula'      => [1, 10, 2],
                'fee'            => ['tuition_min' => 217990, 'tuition_max' => 352305, 'currency' => 'EGP', 'academic_year' => '2025/2026'],
            ],

            // ──────────────────────────────────────────────
            // 30  Bedayia International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Bedayia International School',
                'type_id'        => 9,
                'email'          => 'info@bedayia.com',
                'phone'          => '+202 2630 0000',
                'website'        => 'http://bedayia.com',
                'facebook'       => 'https://www.facebook.com/BedayiaSchool',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'El-Shorouk', 'city' => 'El-Shorouk City', 'compound' => "N/A", 'address' => 'El-Shorouk City, Cairo, Egypt'],
                'curricula'      => [2, 3],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 31  Nefertari International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Nefertari International School',
                'type_id'        => 6,
                'email'          => 'info@nefertarischool.com',
                'phone'          => '+202 2620 0000',
                'website'        => 'http://nefertarischool.com',
                'facebook'       => 'https://www.facebook.com/NefertariInternationalSchool',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Cairo-Ismailia Road', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'Cairo-Ismailia Desert Road, Cairo, Egypt'],
                'curricula'      => [2, 3, 1, 4],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 32  Kent College West Cairo
            // ──────────────────────────────────────────────
            [
                'name'           => 'Kent College West Cairo',
                'type_id'        => 1,
                'email'          => 'admissions@kentcollegewestcairo.com',
                'phone'          => '+2 16127',
                'website'        => 'https://kentcollegewestcairo.com',
                'facebook'       => 'https://www.facebook.com/KentCollegeWestCairo',
                'instagram'      => 'https://www.instagram.com/kentcollegewestcairo/',
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => 18,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'O West', 'city' => '6th of October', 'compound' => 'O West', 'address' => 'O West, 6th of October City, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 33  British Columbia Canadian International School East (BCCIS)
            // ──────────────────────────────────────────────
            [
                'name'           => 'British Columbia Canadian International School East (BCCIS)',
                'type_id'        => 7,
                'email'          => 'info@bccis.com',
                'phone'          => '+20 2 2630 0000',
                'website'        => 'https://bccis.com',
                'facebook'       => 'https://www.facebook.com/BCCIS.Egypt',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'El-Shorouk', 'city' => 'El-Shorouk City', 'compound' => "N/A", 'address' => 'El-Shorouk City, Cairo, Egypt'],
                'curricula'      => [7],
                'fee'            => ['tuition_min' => 184000, 'tuition_max' => 294000, 'currency' => 'EGP', 'academic_year' => '2025/2026'],
            ],

            // ──────────────────────────────────────────────
            // 34  The International School of Choueifat – Cairo
            // ──────────────────────────────────────────────
            [
                'name'           => 'The International School of Choueifat – Cairo',
                'type_id'        => 6,
                'email'          => 'isccairo@sabis.net',
                'phone'          => '+202 2617 0000',
                'website'        => 'https://isccairo.sabis.net',
                'facebook'       => 'https://www.facebook.com/ISCCairo',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 35  Malvern College Egypt
            // ──────────────────────────────────────────────
            [
                'name'           => 'Malvern College Egypt',
                'type_id'        => 1,
                'email'          => 'info@malverncollegeegypt.org',
                'phone'          => '+2 16127',
                'website'        => 'https://malverncollegeegypt.org',
                'facebook'       => 'https://www.facebook.com/MalvernCollegeEgypt',
                'instagram'      => 'https://www.instagram.com/malverncollegeegypt/',
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => 20,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [1, 2],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 36  Cairo English School (CES)
            // ──────────────────────────────────────────────
            [
                'name'           => 'Cairo English School (CES)',
                'type_id'        => 1,
                'email'          => 'info@cesegypt.com',
                'phone'          => '+202 2448 0000',
                'website'        => 'http://cesegypt.com',
                'facebook'       => 'https://www.facebook.com/CairoEnglishSchool',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Mirage City', 'city' => 'New Cairo', 'compound' => 'Mirage City', 'address' => 'Mirage City, New Cairo, Egypt'],
                'curricula'      => [1, 2],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 37  Ethos International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Ethos International School',
                'type_id'        => 1,
                'email'          => 'info@ethosic.com',
                'phone'          => '+2 16127',
                'website'        => 'https://ethosic.com',
                'facebook'       => 'https://www.facebook.com/EthosInternationalSchool',
                'instagram'      => 'https://www.instagram.com/ethosic/',
                'age_min'        => 3,
                'age_max'        => 16,
                'class_size_avg' => 18,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Sheikh Zayed', 'city' => 'Sheikh Zayed City', 'compound' => "N/A", 'address' => 'Sheikh Zayed City, Egypt'],
                'curricula'      => [1],
                'fee'            => ['tuition_min' => 143500, 'tuition_max' => 181000, 'currency' => 'EGP', 'academic_year' => '2026/2027'],
            ],

            // ──────────────────────────────────────────────
            // 38  Wycombe Abbey International Cairo East
            // ──────────────────────────────────────────────
            [
                'name'           => 'Wycombe Abbey International Cairo East',
                'type_id'        => 1,
                'email'          => 'admissions@wycombeabbeyegypt.com',
                'phone'          => "N/A",
                'website'        => 'https://wycombeabbeyegypt.com',
                'facebook'       => 'https://www.facebook.com/WycombeAbbeyEgypt',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 11,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 39  Asten College
            // ──────────────────────────────────────────────
            [
                'name'           => 'Asten College',
                'type_id'        => 1,
                'email'          => 'info@astencollege.com',
                'phone'          => '+2 16127',
                'website'        => 'https://astencollege.com',
                'facebook'       => 'https://www.facebook.com/AstenCollege',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'El-Shorouk', 'city' => 'El-Shorouk City', 'compound' => "N/A", 'address' => 'El-Shorouk City, Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 40  GEMS International School Cairo
            // ──────────────────────────────────────────────
            [
                'name'           => 'GEMS International School Cairo',
                'type_id'        => 2,
                'email'          => 'info_gisc@gemsedu.com',
                'phone'          => '+2 16127',
                'website'        => 'https://www.gemsinternationalschool-cairo.com',
                'facebook'       => 'https://www.facebook.com/GEMSInternationalSchoolCairo',
                'instagram'      => 'https://www.instagram.com/gems_gisc/',
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Al Rehab', 'city' => 'New Cairo', 'compound' => 'Al Rehab City', 'address' => 'Al Rehab City, New Cairo, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 41  Continental Palace International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Continental Palace International School',
                'type_id'        => 2,
                'email'          => 'info@continentalpalace.com',
                'phone'          => '+202 2617 0000',
                'website'        => 'http://continentalpalace.com',
                'facebook'       => 'https://www.facebook.com/ContinentalPalace',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [3, 1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 42  The British International School, Cairo (BISC)
            // ──────────────────────────────────────────────
            [
                'name'           => 'The British International School, Cairo (BISC)',
                'type_id'        => 1,
                'email'          => 'admissions@bisc.edu.eg',
                'phone'          => '+202 3857 0000',
                'website'        => 'https://www.bisc.edu.eg',
                'facebook'       => 'https://www.facebook.com/BISCEgypt',
                'instagram'      => 'https://www.instagram.com/bisc_egypt/',
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => 18,
                'num_students'   => 1000,
                'transport'      => 'Available on request',
                'location'       => ['area' => 'Beverly Hills', 'city' => 'Sheikh Zayed', 'compound' => 'Beverly Hills', 'address' => 'Beverly Hills, Sheikh Zayed City, Egypt'],
                'curricula'      => [1, 2],
                'fee'            => ['tuition_min' => 419805, 'tuition_max' => 1097574, 'currency' => 'EGP', 'academic_year' => '2025/2026'],
            ],

            // ──────────────────────────────────────────────
            // 43  SKILLS
            // ──────────────────────────────────────────────
            [
                'name'           => 'SKILLS',
                'type_id'        => 6,
                'email'          => 'info@skills.edu.eg',
                'phone'          => '+20 2 3835 0000',
                'website'        => 'http://skills.edu.eg',
                'facebook'       => 'https://www.facebook.com/SKILLS.School',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => '6th of October', 'city' => 'Giza', 'compound' => "N/A", 'address' => '6th of October City, Egypt'],
                'curricula'      => [3, 1, 4],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 44  Regent International School West
            // ──────────────────────────────────────────────
            [
                'name'           => 'Regent International School West',
                'type_id'        => 1,
                'email'          => 'info@regentwest.com',
                'phone'          => '+2 16127',
                'website'        => 'https://regentwest.com',
                'facebook'       => 'https://www.facebook.com/RegentWest',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 15,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => '6th of October', 'city' => 'Giza', 'compound' => "N/A", 'address' => '6th of October City, Egypt'],
                'curricula'      => [1, 3],
                'fee'            => ['tuition_min' => 127000, 'tuition_max' => 160000, 'currency' => 'EGP', 'academic_year' => '2026/2027'],
            ],

            // ──────────────────────────────────────────────
            // 45  New Generation International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'New Generation International School',
                'type_id'        => 2,
                'email'          => 'info@ngis.edu.eg',
                'phone'          => '+20 2 4610 0000',
                'website'        => 'http://ngis.edu.eg',
                'facebook'       => 'https://www.facebook.com/NGISEgypt',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'El-Obour', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'El-Obour City, Cairo, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 46  Egypt British International School (EBIS)
            // ──────────────────────────────────────────────
            [
                'name'           => 'Egypt British International School (EBIS)',
                'type_id'        => 1,
                'email'          => 'info@ebis-school.com',
                'phone'          => '+202 2617 0000',
                'website'        => 'http://ebis-school.com',
                'facebook'       => 'https://www.facebook.com/EBIS.Egypt',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 47  The British School in Cairo
            // ──────────────────────────────────────────────
            [
                'name'           => 'The British School in Cairo',
                'type_id'        => 1,
                'email'          => 'info@bsc.edu.eg',
                'phone'          => "N/A",
                'website'        => 'http://bsc.edu.eg',
                'facebook'       => 'https://www.facebook.com/BritishSchoolCairo',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Madinaty', 'city' => 'Cairo', 'compound' => 'Madinaty', 'address' => 'Madinaty, Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 48  Sahara International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Sahara International School',
                'type_id'        => 1,
                'email'          => 'info@sahara-school.com',
                'phone'          => '+202 2537 0000',
                'website'        => 'http://sahara-school.com',
                'facebook'       => 'https://www.facebook.com/SaharaInternationalSchool',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 16,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 49  Evolution International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Evolution International School',
                'type_id'        => 1,
                'email'          => 'info@evolution-school.com',
                'phone'          => '+2 16127',
                'website'        => 'https://evolution-school.com',
                'facebook'       => 'https://www.facebook.com/EvolutionSchoolEgypt',
                'instagram'      => 'https://www.instagram.com/evolution_school/',
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [2, 1],
                'fee'            => ['tuition_min' => 163600, 'tuition_max' => 220500, 'currency' => 'EGP', 'academic_year' => '2024/2025'],
            ],

            // ──────────────────────────────────────────────
            // 50  Europa-Schule Kairo
            // ──────────────────────────────────────────────
            [
                'name'           => 'Europa-Schule Kairo',
                'type_id'        => 3,
                'email'          => 'info@europaschulekairo.com',
                'phone'          => '+202 2537 0000',
                'website'        => 'http://europaschulekairo.com',
                'facebook'       => 'https://www.facebook.com/EuropaSchuleKairo',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [4],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 51  Manor House School – October
            // ──────────────────────────────────────────────
            [
                'name'           => 'Manor House School – October',
                'type_id'        => 2,
                'email'          => 'info@manorhouse.edu.eg',
                'phone'          => '+20 2 3835 0000',
                'website'        => 'http://manorhouse.edu.eg',
                'facebook'       => 'https://www.facebook.com/ManorHouseSchool',
                'instagram'      => "N/A",
                'age_min'        => 4,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => '6th of October', 'city' => 'Giza', 'compound' => "N/A", 'address' => '6th of October City, Egypt'],
                'curricula'      => [3, 1],
                'fee'            => ['tuition_min' => 84000, 'tuition_max' => 103000, 'currency' => 'EGP', 'academic_year' => '2025/2026'],
            ],

            // ──────────────────────────────────────────────
            // 52  Canadian International School of Egypt (CISE)
            // ──────────────────────────────────────────────
            [
                'name'           => 'Canadian International School of Egypt (CISE)',
                'type_id'        => 7,
                'email'          => 'info@cise.edu.eg',
                'phone'          => '+202 2617 0000',
                'website'        => 'http://cise.edu.eg',
                'facebook'       => 'https://www.facebook.com/CISE.Egypt',
                'instagram'      => "N/A",
                'age_min'        => 4,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'El-Tagamoa El-Khames', 'city' => 'New Cairo', 'compound' => "N/A", 'address' => 'El-Tagamoa El-Khames, New Cairo, Egypt'],
                'curricula'      => [8],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 53  Sun of Knowledge British International School (SOK)
            // ──────────────────────────────────────────────
            [
                'name'           => 'Sun of Knowledge British International School (SOK)',
                'type_id'        => 1,
                'email'          => 'info@sok.edu.eg',
                'phone'          => '+202 2537 0000',
                'website'        => 'http://sok.edu.eg',
                'facebook'       => 'https://www.facebook.com/SunOfKnowledge',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 54  Genesis International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Genesis International School',
                'type_id'        => 2,
                'email'          => 'info@genesis.edu.eg',
                'phone'          => '+202 2537 0000',
                'website'        => 'http://genesis.edu.eg',
                'facebook'       => 'https://www.facebook.com/GenesisInternationalSchool',
                'instagram'      => "N/A",
                'age_min'        => 6,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [3, 11],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 55  The International School of Choueifat – 6th of October
            // ──────────────────────────────────────────────
            [
                'name'           => 'The International School of Choueifat – 6th of October',
                'type_id'        => 6,
                'email'          => 'isc6october@sabis.net',
                'phone'          => '+20 2 3835 0000',
                'website'        => 'https://isc6october.sabis.net',
                'facebook'       => 'https://www.facebook.com/ISC6October',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => '6th of October', 'city' => 'Giza', 'compound' => "N/A", 'address' => '6th of October City, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 56  Majesty International Schools
            // ──────────────────────────────────────────────
            [
                'name'           => 'Majesty International Schools',
                'type_id'        => 2,
                'email'          => 'info@majesty-schools.com',
                'phone'          => '+20 100 000 0000',
                'website'        => 'http://majesty-schools.com',
                'facebook'       => 'https://www.facebook.com/MajestySchools',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'El-Tagamoa El-Thaleth', 'city' => 'New Cairo', 'compound' => "N/A", 'address' => 'El-Tagamoa El-Thaleth, New Cairo, Egypt'],
                'curricula'      => [3, 1],
                'fee'            => ['tuition_min' => 75000, 'tuition_max' => 141000, 'currency' => 'EGP', 'academic_year' => '2025/2026'],
            ],

            // ──────────────────────────────────────────────
            // 57  Royal Canadian School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Royal Canadian School',
                'type_id'        => 7,
                'email'          => 'info@royalcanadianschool.ca',
                'phone'          => '+202 3857 0000',
                'website'        => 'http://royalcanadianschool.ca',
                'facebook'       => 'https://www.facebook.com/RoyalCanadianSchool',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Sheikh Zayed', 'city' => 'Sheikh Zayed City', 'compound' => "N/A", 'address' => 'Sheikh Zayed City, Egypt'],
                'curricula'      => [7, 2],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 58  Kompass School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Kompass School',
                'type_id'        => 6,
                'email'          => 'info@kompass-school.com',
                'phone'          => "N/A",
                'website'        => 'http://kompass-school.com',
                'facebook'       => 'https://www.facebook.com/KompassSchool',
                'instagram'      => "N/A",
                'age_min'        => 1,
                'age_max'        => 14,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [1, 4, 11],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 59  Global Paradigm Schools (GPS)
            // ──────────────────────────────────────────────
            [
                'name'           => 'Global Paradigm Schools (GPS)',
                'type_id'        => 6,
                'email'          => 'info@gps.edu.eg',
                'phone'          => '+202 2617 0000',
                'website'        => 'http://gps.edu.eg',
                'facebook'       => 'https://www.facebook.com/GPSchools',
                'instagram'      => "N/A",
                'age_min'        => 2,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [2, 3, 1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 60  Heritage International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Heritage International School',
                'type_id'        => 7,
                'email'          => 'info@heritageinternationalschool.com',
                'phone'          => '+202 3857 0000',
                'website'        => 'http://heritageinternationalschool.com',
                'facebook'       => 'https://www.facebook.com/HeritageInternationalSchool',
                'instagram'      => "N/A",
                'age_min'        => 4,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Beverly Hills', 'city' => 'Sheikh Zayed', 'compound' => 'Beverly Hills', 'address' => 'Beverly Hills, Sheikh Zayed City, Egypt'],
                'curricula'      => [9],
                'fee'            => ['tuition_min' => 144500, 'tuition_max' => 348000, 'currency' => 'EGP', 'academic_year' => '2025/2026'],
            ],

            // ──────────────────────────────────────────────
            // 61  Dream International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Dream International School',
                'type_id'        => 2,
                'email'          => 'info@dream-school.com',
                'phone'          => '+20 2 3835 0000',
                'website'        => 'http://dream-school.com',
                'facebook'       => 'https://www.facebook.com/DreamInternationalSchool',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => '6th of October', 'city' => 'Giza', 'compound' => "N/A", 'address' => '6th of October City, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 62  Deutsche Schule Beverly Hills Kairo
            // ──────────────────────────────────────────────
            [
                'name'           => 'Deutsche Schule Beverly Hills Kairo',
                'type_id'        => 3,
                'email'          => 'info@dsbh-kairo.de',
                'phone'          => '+202 3857 0000',
                'website'        => 'https://dsbh-kairo.de',
                'facebook'       => 'https://www.facebook.com/DSBHKairo',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Beverly Hills', 'city' => 'Sheikh Zayed', 'compound' => 'Beverly Hills', 'address' => 'Beverly Hills, Sheikh Zayed City, Egypt'],
                'curricula'      => [2, 4],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 63  Nile River Montessori
            // ──────────────────────────────────────────────
            [
                'name'           => 'Nile River Montessori',
                'type_id'        => 8,
                'email'          => 'info@nilerivermontessori.com',
                'phone'          => "N/A",
                'website'        => 'http://nilerivermontessori.com',
                'facebook'       => 'https://www.facebook.com/NileRiverMontessori',
                'instagram'      => "N/A",
                'age_min'        => 1,
                'age_max'        => 12,
                'class_size_avg' => 12,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Maadi', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'Maadi, Cairo, Egypt'],
                'curricula'      => [],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 64  Gateway International Montessori School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Gateway International Montessori School',
                'type_id'        => 8,
                'email'          => 'info@gateway.edu.eg',
                'phone'          => '+202 2537 0000',
                'website'        => 'http://gateway.edu.eg',
                'facebook'       => 'https://www.facebook.com/GatewayMontessori',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [3, 2],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 65  Lycée International Balzac
            // ──────────────────────────────────────────────
            [
                'name'           => 'Lycée International Balzac',
                'type_id'        => 4,
                'email'          => 'info@lyceebalzac.com',
                'phone'          => '+202 2617 0000',
                'website'        => 'http://lyceebalzac.com',
                'facebook'       => 'https://www.facebook.com/LyceeBalzac',
                'instagram'      => "N/A",
                'age_min'        => 4,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [5],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 66  The Continental School Cairo
            // ──────────────────────────────────────────────
            [
                'name'           => 'The Continental School Cairo',
                'type_id'        => 6,
                'email'          => 'info@thecontinentalschoolcairo.com',
                'phone'          => '+202 4610 0000',
                'website'        => 'http://thecontinentalschoolcairo.com',
                'facebook'       => 'https://www.facebook.com/ContinentalSchoolCairo',
                'instagram'      => "N/A",
                'age_min'        => 2,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Obour City', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'Obour City, Cairo, Egypt'],
                'curricula'      => [1, 11],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 67  The British School of Egypt (BSE)
            // ──────────────────────────────────────────────
            [
                'name'           => 'The British School of Egypt (BSE)',
                'type_id'        => 1,
                'email'          => 'info@bse.edu.eg',
                'phone'          => '+2 16127',
                'website'        => 'http://bse.edu.eg',
                'facebook'       => 'https://www.facebook.com/BSE.Egypt',
                'instagram'      => "N/A",
                'age_min'        => 2,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Sheikh Zayed', 'city' => 'Sheikh Zayed City', 'compound' => "N/A", 'address' => 'Sheikh Zayed City, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 68  Narmer International College (NIC)
            // ──────────────────────────────────────────────
            [
                'name'           => 'Narmer International College (NIC)',
                'type_id'        => 1,
                'email'          => 'info@nic.edu.eg',
                'phone'          => '+202 2617 0000',
                'website'        => 'http://nic.edu.eg',
                'facebook'       => 'https://www.facebook.com/NarmerInternationalCollege',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [1, 2, 3],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 69  British International College of Cairo (BICC)
            // ──────────────────────────────────────────────
            [
                'name'           => 'British International College of Cairo (BICC)',
                'type_id'        => 1,
                'email'          => 'info@bicc-eg.com',
                'phone'          => '+2 16127',
                'website'        => 'http://bicc-eg.com',
                'facebook'       => 'https://www.facebook.com/BICCEgypt',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 16,
                'class_size_avg' => 15,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 70  American International School in Egypt, West Campus (AIS West)
            // ──────────────────────────────────────────────
            [
                'name'           => 'American International School in Egypt, West Campus (AIS West)',
                'type_id'        => 2,
                'email'          => 'admissions@aiswest.com',
                'phone'          => '+202 3857 0000',
                'website'        => 'https://www.aisegypt.com/west',
                'facebook'       => 'https://www.facebook.com/AISEgyptWest',
                'instagram'      => "N/A",
                'age_min'        => 4,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Sheikh Zayed', 'city' => 'Sheikh Zayed City', 'compound' => "N/A", 'address' => 'Sheikh Zayed City, Egypt'],
                'curricula'      => [3, 2],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 71  Maadi British International School (MBIS)
            // ──────────────────────────────────────────────
            [
                'name'           => 'Maadi British International School (MBIS)',
                'type_id'        => 1,
                'email'          => 'info@mbisegypt.com',
                'phone'          => '+202 2358 0000',
                'website'        => 'http://mbisegypt.com',
                'facebook'       => 'https://www.facebook.com/MBISegypt',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 16,
                'class_size_avg' => 16,
                'num_students'   => null,
                'transport'      => 'Available',
                'location'       => ['area' => 'Maadi', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'Maadi, Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => ['tuition_min' => 369141, 'tuition_max' => 849685, 'currency' => 'EGP', 'academic_year' => '2024/2025'],
            ],

            // ──────────────────────────────────────────────
            // 72  MSG British International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'MSG British International School',
                'type_id'        => 1,
                'email'          => 'N/A',
                'phone'          => "N/A",
                'website'        => "N/A",
                'facebook'       => "N/A",
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 73  Dr. Nermien Ismail International Schools (NIS) – Main
            // ──────────────────────────────────────────────
            [
                'name'           => 'Dr. Nermien Ismail International Schools (NIS)',
                'type_id'        => 6,
                'email'          => 'info@nis-egypt.com',
                'phone'          => '+2 16127',
                'website'        => 'https://nis-egypt.com',
                'facebook'       => 'https://www.facebook.com/NIS.Schools',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [3, 1, 2],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 74  New Era International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'New Era International School',
                'type_id'        => 1,
                'email'          => 'info@neira-school.com',
                'phone'          => '+202 2537 0000',
                'website'        => 'http://neira-school.com',
                'facebook'       => 'https://www.facebook.com/NewEraInternationalSchool',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 75  Beverly Hills American International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Beverly Hills American International School',
                'type_id'        => 2,
                'email'          => 'info@bhais.edu.eg',
                'phone'          => '+202 3857 0000',
                'website'        => 'http://bhais.edu.eg',
                'facebook'       => 'https://www.facebook.com/BHAIS.Egypt',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Beverly Hills', 'city' => 'Sheikh Zayed', 'compound' => 'Beverly Hills', 'address' => 'Beverly Hills, Sheikh Zayed City, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 76  Cairo American College (CAC)
            // ──────────────────────────────────────────────
            [
                'name'           => 'Cairo American College (CAC)',
                'type_id'        => 2,
                'email'          => 'info@cacegypt.org',
                'phone'          => '+202 2755 0000',
                'website'        => 'https://www.cacegypt.org',
                'facebook'       => 'https://www.facebook.com/CairoAmericanCollege',
                'instagram'      => 'https://www.instagram.com/cairo_american_college/',
                'age_min'        => 4,
                'age_max'        => 18,
                'class_size_avg' => 15,
                'num_students'   => 800,
                'transport'      => 'Not available',
                'location'       => ['area' => 'Maadi', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'Maadi, Cairo, Egypt'],
                'curricula'      => [3, 2],
                'fee'            => ['tuition_min' => 27000, 'tuition_max' => 35000, 'currency' => 'USD', 'academic_year' => '2024/2025'],
            ],

            // ──────────────────────────────────────────────
            // 77  International School of Elite
            // ──────────────────────────────────────────────
            [
                'name'           => 'International School of Elite',
                'type_id'        => 2,
                'email'          => 'info@eliteschool-egypt.com',
                'phone'          => '+202 2617 0000',
                'website'        => 'http://eliteschool-egypt.com',
                'facebook'       => 'https://www.facebook.com/InternationalSchoolOfElite',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [3, 1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 78  Roots International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Roots International School',
                'type_id'        => 1,
                'email'          => 'info@roots-school.com',
                'phone'          => '+202 2270 0000',
                'website'        => 'http://roots-school.com',
                'facebook'       => 'https://www.facebook.com/RootsInternationalSchool',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Nasr City', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'Nasr City, Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 79  Sumait International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Sumait International School',
                'type_id'        => 1,
                'email'          => 'info@sumait-school.com',
                'phone'          => "N/A",
                'website'        => 'http://sumait-school.com',
                'facebook'       => 'https://www.facebook.com/SumaitInternationalSchool',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 80  St. Fatima International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'St. Fatima International School',
                'type_id'        => 1,
                'email'          => 'info@stfatima.com',
                'phone'          => '+202 2240 0000',
                'website'        => 'http://stfatima.com',
                'facebook'       => 'https://www.facebook.com/StFatimaSchools',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Heliopolis', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'Heliopolis, Cairo, Egypt'],
                'curricula'      => [1, 3],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 81  Green Valley School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Green Valley School',
                'type_id'        => 1,
                'email'          => 'info@greenvalleyschool.com',
                'phone'          => '+20 2 4610 0000',
                'website'        => 'http://greenvalleyschool.com',
                'facebook'       => 'https://www.facebook.com/GreenValleySchoolEgypt',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Obour City', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'Obour City, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 82  Nefertari British International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Nefertari British International School',
                'type_id'        => 1,
                'email'          => 'info@nefertarischool.com',
                'phone'          => '+202 2620 0000',
                'website'        => 'http://nefertarischool.com',
                'facebook'       => 'https://www.facebook.com/NefertariBritish',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Cairo-Ismailia Road', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'Cairo-Ismailia Desert Road, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 83  Futures International Schools
            // ──────────────────────────────────────────────
            [
                'name'           => 'Futures International Schools',
                'type_id'        => 6,
                'email'          => 'info@futures-schools.com',
                'phone'          => '+2 16127',
                'website'        => 'http://futures-schools.com',
                'facebook'       => 'https://www.facebook.com/FuturesSchools',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt (Multiple Branches)'],
                'curricula'      => [3, 1, 4, 5],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 84  Dover American International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Dover American International School',
                'type_id'        => 2,
                'email'          => 'info@dais-egypt.com',
                'phone'          => '+202 2630 0000',
                'website'        => 'http://dais-egypt.com',
                'facebook'       => 'https://www.facebook.com/DAISEgypt',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'El Shorouk', 'city' => 'El-Shorouk City', 'compound' => "N/A", 'address' => 'El Shorouk City, Cairo, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 85  Wise International School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Wise International School',
                'type_id'        => 2,
                'email'          => 'info@wise-school.com',
                'phone'          => '+202 2537 0000',
                'website'        => 'http://wise-school.com',
                'facebook'       => 'https://www.facebook.com/WiseInternationalSchool',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 86  Malvern College Egypt – Secondary Section
            // ──────────────────────────────────────────────
            [
                'name'           => 'Malvern College Egypt – Secondary Section',
                'type_id'        => 1,
                'email'          => 'info@malverncollegeegypt.org',
                'phone'          => '+2 16127',
                'website'        => 'https://malverncollegeegypt.org',
                'facebook'       => 'https://www.facebook.com/MalvernCollegeEgypt',
                'instagram'      => "N/A",
                'age_min'        => 11,
                'age_max'        => 18,
                'class_size_avg' => 20,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [1, 2],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 87  International School of Choueifat – Cairo (Maadi Branch)
            // ──────────────────────────────────────────────
            [
                'name'           => 'International School of Choueifat – Cairo (Maadi Branch)',
                'type_id'        => 6,
                'email'          => 'isccairo@sabis.net',
                'phone'          => '+202 2358 0000',
                'website'        => 'https://isccairo.sabis.net',
                'facebook'       => 'https://www.facebook.com/ISCCairo',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Maadi', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'Maadi, Cairo, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 88  Victory College
            // ──────────────────────────────────────────────
            [
                'name'           => 'Victory College',
                'type_id'        => 1,
                'email'          => 'info@victorycollege.com',
                'phone'          => '+202 2358 0000',
                'website'        => 'http://victorycollege.com',
                'facebook'       => 'https://www.facebook.com/VictoryCollegeMaadi',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Maadi', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'Maadi, Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 89  Port Said American School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Port Said American School',
                'type_id'        => 2,
                'email'          => 'info@portsaid-school.com',
                'phone'          => '+202 2736 0000',
                'website'        => 'http://portsaid-school.com',
                'facebook'       => 'https://www.facebook.com/PortSaidSchool',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Zamalek', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'Zamalek, Cairo, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 90  British International School Madinaty
            // ──────────────────────────────────────────────
            [
                'name'           => 'British International School Madinaty',
                'type_id'        => 1,
                'email'          => 'info_bsm@gemsedu.com',
                'phone'          => '+2 16127',
                'website'        => 'https://www.gemsbritishschool-madinaty.com',
                'facebook'       => 'https://www.facebook.com/GEMSMadinaty',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Madinaty', 'city' => 'Cairo', 'compound' => 'Madinaty', 'address' => 'Madinaty, Cairo, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 91  Misr American College (MAC)
            // ──────────────────────────────────────────────
            [
                'name'           => 'Misr American College (MAC)',
                'type_id'        => 2,
                'email'          => 'info@mac-egypt.com',
                'phone'          => '+202 2358 0000',
                'website'        => 'http://mac-egypt.com',
                'facebook'       => 'https://www.facebook.com/MisrAmericanCollege',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => 18,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Maadi', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'Maadi, Cairo, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 92  NIS – 6th of October Branch
            // ──────────────────────────────────────────────
            [
                'name'           => 'Dr. Nermien Ismail Schools (NIS) – 6th of October',
                'type_id'        => 2,
                'email'          => 'info@nis-egypt.com',
                'phone'          => '+2 16127',
                'website'        => 'https://nis-egypt.com',
                'facebook'       => 'https://www.facebook.com/NIS.Schools',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => '6th of October', 'city' => 'Giza', 'compound' => "N/A", 'address' => '6th of October City, Egypt'],
                'curricula'      => [3, 1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 93  International School of Choueifat – Dreamland
            // ──────────────────────────────────────────────
            [
                'name'           => 'International School of Choueifat – Dreamland',
                'type_id'        => 6,
                'email'          => 'iscdreamland@sabis.net',
                'phone'          => '+20 2 3857 0000',
                'website'        => 'https://iscdreamland.sabis.net',
                'facebook'       => 'https://www.facebook.com/ISCDreamland',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Dreamland', 'city' => '6th of October', 'compound' => 'Dreamland', 'address' => 'Dreamland, 6th of October City, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 94  Global Paradigm Baccalaureate School
            // ──────────────────────────────────────────────
            [
                'name'           => 'Global Paradigm Baccalaureate School',
                'type_id'        => 9,
                'email'          => 'info@gps.edu.eg',
                'phone'          => '+202 2617 0000',
                'website'        => 'http://gps.edu.eg',
                'facebook'       => 'https://www.facebook.com/GPBSchools',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => 20,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [2],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 95  International School of Choueifat – New Cairo
            // ──────────────────────────────────────────────
            [
                'name'           => 'International School of Choueifat – New Cairo',
                'type_id'        => 6,
                'email'          => 'isccairo@sabis.net',
                'phone'          => '+202 2617 0000',
                'website'        => 'https://isccairo.sabis.net',
                'facebook'       => 'https://www.facebook.com/ISCCairo',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 96  Repton Cairo West
            // ──────────────────────────────────────────────
            [
                'name'           => 'Repton Cairo West',
                'type_id'        => 1,
                'email'          => 'info@reptoncairowest.org',
                'phone'          => '+2 16127',
                'website'        => 'https://reptoncairowest.org',
                'facebook'       => 'https://www.facebook.com/ReptonCairoWest',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => 15,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'O West', 'city' => '6th of October', 'compound' => 'O West', 'address' => 'O West, 6th of October City, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 97  GEMS International School Madinaty
            // ──────────────────────────────────────────────
            [
                'name'           => 'GEMS International School Madinaty',
                'type_id'        => 2,
                'email'          => 'info_gism@gemsedu.com',
                'phone'          => '+2 16127',
                'website'        => 'https://www.gemsinternationalschool-madinaty.com',
                'facebook'       => 'https://www.facebook.com/GEMSMadinaty',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Madinaty', 'city' => 'Cairo', 'compound' => 'Madinaty', 'address' => 'Madinaty, Cairo, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 98  King's School The Crown – Secondary
            // ──────────────────────────────────────────────
            [
                'name'           => "King's School The Crown – Secondary",
                'type_id'        => 1,
                'email'          => 'admissions@kingsschoolthecrown.com',
                'phone'          => '+20 100 000 0000',
                'website'        => 'https://www.kingsschoolthecrown.com',
                'facebook'       => 'https://www.facebook.com/kingsschoolthecrown',
                'instagram'      => "N/A",
                'age_min'        => 11,
                'age_max'        => 18,
                'class_size_avg' => 15,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'The Crown', 'city' => '6th of October', 'compound' => 'The Crown', 'address' => '6th of October City, Egypt'],
                'curricula'      => [1, 6],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 99  American International School in Egypt (AIS) – Main Campus
            // ──────────────────────────────────────────────
            [
                'name'           => 'American International School in Egypt (AIS) – Main Campus',
                'type_id'        => 2,
                'email'          => 'admissions@aisegypt.com',
                'phone'          => '+202 2617 0000',
                'website'        => 'https://www.aisegypt.com',
                'facebook'       => 'https://www.facebook.com/AISEgypt',
                'instagram'      => "N/A",
                'age_min'        => 4,
                'age_max'        => 18,
                'class_size_avg' => 20,
                'num_students'   => 1500,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [3, 2],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 100  British School of Egypt (BSE) – West Campus
            // ──────────────────────────────────────────────
            [
                'name'           => 'British School of Egypt (BSE) – West Campus',
                'type_id'        => 1,
                'email'          => 'info@bse.edu.eg',
                'phone'          => '+2 16127',
                'website'        => 'http://bse.edu.eg',
                'facebook'       => 'https://www.facebook.com/BSE.Egypt',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Sheikh Zayed', 'city' => 'Sheikh Zayed City', 'compound' => "N/A", 'address' => 'Sheikh Zayed City, Egypt'],
                'curricula'      => [1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 101  Nefertari International School – American Section
            // ──────────────────────────────────────────────
            [
                'name'           => 'Nefertari International School – American Section',
                'type_id'        => 2,
                'email'          => 'info@nefertarischool.com',
                'phone'          => '+202 2620 0000',
                'website'        => 'http://nefertarischool.com',
                'facebook'       => 'https://www.facebook.com/NefertariAmerican',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Cairo-Ismailia Road', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'Cairo-Ismailia Desert Road, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 102  NIS – El Shorouk Branch
            // ──────────────────────────────────────────────
            [
                'name'           => 'Dr. Nermien Ismail Schools (NIS) – El Shorouk',
                'type_id'        => 2,
                'email'          => 'info@nis-egypt.com',
                'phone'          => '+2 16127',
                'website'        => 'https://nis-egypt.com',
                'facebook'       => 'https://www.facebook.com/NIS.Schools',
                'instagram'      => "N/A",
                'age_min'        => 3,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'El Shorouk', 'city' => 'El-Shorouk City', 'compound' => "N/A", 'address' => 'El Shorouk City, Egypt'],
                'curricula'      => [3, 1],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 103  GEMS British School Madinaty – Secondary
            // ──────────────────────────────────────────────
            [
                'name'           => 'GEMS British School Madinaty – Secondary',
                'type_id'        => 1,
                'email'          => 'info_bsm@gemsedu.com',
                'phone'          => '+2 16127',
                'website'        => 'https://www.gemsbritishschool-madinaty.com',
                'facebook'       => 'https://www.facebook.com/GEMSMadinaty',
                'instagram'      => "N/A",
                'age_min'        => 11,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'Madinaty', 'city' => 'Cairo', 'compound' => 'Madinaty', 'address' => 'Madinaty, Cairo, Egypt'],
                'curricula'      => [1, 6],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 104  International School of Choueifat – 6th October (Secondary)
            // ──────────────────────────────────────────────
            [
                'name'           => 'International School of Choueifat – 6th of October (Secondary)',
                'type_id'        => 6,
                'email'          => 'isc6october@sabis.net',
                'phone'          => '+20 2 3835 0000',
                'website'        => 'https://isc6october.sabis.net',
                'facebook'       => 'https://www.facebook.com/ISC6October',
                'instagram'      => "N/A",
                'age_min'        => 11,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => '6th of October', 'city' => 'Giza', 'compound' => "N/A", 'address' => '6th of October City, Egypt'],
                'curricula'      => [10],
                'fee'            => "N/A",
            ],

            // ──────────────────────────────────────────────
            // 105  Lycée International Balzac – Secondary Section
            // ──────────────────────────────────────────────
            [
                'name'           => 'Lycée International Balzac – Secondary Section',
                'type_id'        => 4,
                'email'          => 'info@lyceebalzac.com',
                'phone'          => '+202 2617 0000',
                'website'        => 'http://lyceebalzac.com',
                'facebook'       => 'https://www.facebook.com/LyceeBalzac',
                'instagram'      => "N/A",
                'age_min'        => 11,
                'age_max'        => 18,
                'class_size_avg' => null,
                'num_students'   => null,
                'transport'      => "N/A",
                'location'       => ['area' => 'New Cairo', 'city' => 'Cairo', 'compound' => "N/A", 'address' => 'New Cairo, Egypt'],
                'curricula'      => [5],
                'fee'            => "N/A",
            ],

        ]; // end $schools array

        foreach ($schools as $data) {
            // 1 — Create location
            $location = Location::create($data['location']);

            // 2 — Create school
            $school = School::create([
                'name'           => $data['name'],
                'type_id'        => $data['type_id'],
                'location_id'    => $location->id,
                'email'          => $data['email'] ?? "N/A",
                'phone'          => $data['phone'] ?? "N/A",
                'website'        => $data['website'] ?? "N/A",
                'facebook'       => $data['facebook'] ?? "N/A",
                'instagram'      => $data['instagram'] ?? "N/A",
                'age_min'        => $data['age_min'],
                'age_max'        => $data['age_max'],
                'class_size_avg' => $data['class_size_avg'] ?? null,
                'num_students'   => $data['num_students'] ?? null,
                'transport'      => $data['transport'] ?? "N/A",
                'is_active'      => true,
                'is_school_of_month' => false,
            ]);

            // 3 — Attach curricula (pivot)
            if (!empty($data['curricula'])) {
                $school->curricula()->attach($data['curricula']);
            }

            // 4 — Create fee only when data is available
            if (!empty($data['fee'])) {
                Fee::create([
                    'school_id'     => $school->id,
                    'tuition_min'   => $data['fee']['tuition_min'] ?? 0,
                    'tuition_max'   => $data['fee']['tuition_max'] ?? 0,
                    'currency'      => $data['fee']['currency'] ?? 'N/A',
                    'academic_year' => $data['fee']['academic_year'] ?? 'N/A',
                    'is_public'     => true,
                ]);
            }
        }
    }
}
