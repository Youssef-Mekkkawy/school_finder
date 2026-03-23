<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $reviews = [
            // School 1 — British International School Cairo
            [
                'school_id'   => 1,
                'user_id'     => 1,
                'rating'      => 5,
                'comment'     => 'Excellent academic environment. Our daughter has thrived here. The teachers are highly qualified and the facilities are world-class.',
                'is_approved' => true,
            ],
            [
                'school_id'   => 1,
                'user_id'     => 2,
                'rating'      => 4,
                'comment'     => 'Great school with high fees. The IGCSE programme is outstanding and the kids get lots of extracurricular opportunities.',
                'is_approved' => true,
            ],

            // School 2 — Cairo American College
            [
                'school_id'   => 2,
                'user_id'     => 1,
                'rating'      => 5,
                'comment'     => 'Best American curriculum in Cairo. CAC has an incredible community feel. Our son was accepted into a top US university.',
                'is_approved' => true,
            ],
            [
                'school_id'   => 2,
                'user_id'     => 2,
                'rating'      => 4,
                'comment'     => 'Solid school with strong college counselling. The campus in Maadi is beautiful. Parking can be challenging at pickup time.',
                'is_approved' => true,
            ],

            // School 3 — Rahn Schulen Kairo
            [
                'school_id'   => 3,
                'user_id'     => 1,
                'rating'      => 4,
                'comment'     => 'Excellent German education in Cairo. Our children speak fluent German now and the academic standards are very high.',
                'is_approved' => true,
            ],
            [
                'school_id'   => 3,
                'user_id'     => 2,
                'rating'      => 5,
                'comment'     => 'Perfect for bilingual families. The Abitur opens doors across Europe. Friendly atmosphere and small class sizes.',
                'is_approved' => true,
            ],

            // School 4 — El Alsson
            [
                'school_id'   => 4,
                'user_id'     => 1,
                'rating'      => 4,
                'comment'     => 'Strong academics and great community. El Alsson offers both British and American curricula. The NewGiza campus is modern and spacious.',
                'is_approved' => true,
            ],
            [
                'school_id'   => 4,
                'user_id'     => 2,
                'rating'      => 5,
                'comment'     => 'Top choice for families in 6th of October. Excellent teaching quality and a genuine sense of community.',
                'is_approved' => true,
            ],

            // School 5 — Lycée Français
            [
                'school_id'   => 5,
                'user_id'     => 1,
                'rating'      => 5,
                'comment'     => 'Wonderful French education. Our children are fully fluent in French and the Baccalaureate is recognised worldwide.',
                'is_approved' => true,
            ],
            [
                'school_id'   => 5,
                'user_id'     => 2,
                'rating'      => 4,
                'comment'     => 'Great for French-speaking families. Rich cultural programme and teachers who truly care about each student.',
                'is_approved' => true,
            ],
        ];

        foreach ($reviews as $review) {
            Review::create($review);
        }
    }
}
