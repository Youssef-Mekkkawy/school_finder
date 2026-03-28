<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Appointment;
use Illuminate\Database\Seeder;

/**
 * ReviewSeeder — Realistic reviews with varied ratings
 *
 * School IDs:
 *   1=Rahn  2=Manaret  3=Saxony  4=GEMS AlRehab  5=El Alsson
 *   6=BCCIS  7=Ethos  8=BISC  9=Regent  10=Evolution
 *   11=Manor House  12=Majesty  13=Heritage  14=MBIS  15=CAC
 *
 * User IDs:
 *   1=Omar  2=Sara  3=Ahmed  4=Nour  5=Layla  6=Khaled
 *   7=Dina  8=Tarek  9=Rania  10=Youssef  11=Mariam
 *   12=Hossam  13=Noha  14=Sherif  15=Amira
 *
 * Rating targets:
 *   BISC → 4.6   CAC → 4.4   Rahn → 4.5   El Alsson → 4.3
 *   MBIS → 4.1   Evolution → 4.3   Ethos → 4.3   Manaret → 4.0
 *   Heritage → 3.9   Manor House → 3.8
 */
class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        // ── Step 1: Confirmed appointments so reviews are verified ─────────────
        $appointments = [
            ['user_id' => 1,  'school_id' => 8,  'preferred_date' => '2026-01-15'],
            ['user_id' => 2,  'school_id' => 8,  'preferred_date' => '2026-01-18'],
            ['user_id' => 3,  'school_id' => 8,  'preferred_date' => '2026-01-20'],
            ['user_id' => 4,  'school_id' => 8,  'preferred_date' => '2026-01-22'],
            ['user_id' => 5,  'school_id' => 8,  'preferred_date' => '2026-01-25'],
            ['user_id' => 1,  'school_id' => 15, 'preferred_date' => '2026-01-10'],
            ['user_id' => 6,  'school_id' => 15, 'preferred_date' => '2026-01-12'],
            ['user_id' => 7,  'school_id' => 15, 'preferred_date' => '2026-01-14'],
            ['user_id' => 8,  'school_id' => 15, 'preferred_date' => '2026-01-16'],
            ['user_id' => 2,  'school_id' => 1,  'preferred_date' => '2026-02-01'],
            ['user_id' => 9,  'school_id' => 1,  'preferred_date' => '2026-02-03'],
            ['user_id' => 10, 'school_id' => 1,  'preferred_date' => '2026-02-05'],
            ['user_id' => 3,  'school_id' => 5,  'preferred_date' => '2026-02-10'],
            ['user_id' => 11, 'school_id' => 5,  'preferred_date' => '2026-02-12'],
            ['user_id' => 12, 'school_id' => 5,  'preferred_date' => '2026-02-14'],
            ['user_id' => 4,  'school_id' => 14, 'preferred_date' => '2026-02-18'],
            ['user_id' => 13, 'school_id' => 14, 'preferred_date' => '2026-02-20'],
            ['user_id' => 14, 'school_id' => 14, 'preferred_date' => '2026-02-22'],
            ['user_id' => 5,  'school_id' => 10, 'preferred_date' => '2026-03-01'],
            ['user_id' => 15, 'school_id' => 10, 'preferred_date' => '2026-03-03'],
            ['user_id' => 6,  'school_id' => 13, 'preferred_date' => '2026-03-05'],
            ['user_id' => 7,  'school_id' => 13, 'preferred_date' => '2026-03-07'],
            ['user_id' => 8,  'school_id' => 2,  'preferred_date' => '2026-03-10'],
            ['user_id' => 9,  'school_id' => 2,  'preferred_date' => '2026-03-12'],
            ['user_id' => 10, 'school_id' => 7,  'preferred_date' => '2026-03-15'],
            ['user_id' => 11, 'school_id' => 7,  'preferred_date' => '2026-03-17'],
            ['user_id' => 12, 'school_id' => 11, 'preferred_date' => '2026-03-18'],
            ['user_id' => 13, 'school_id' => 11, 'preferred_date' => '2026-03-19'],
            ['user_id' => 14, 'school_id' => 4,  'preferred_date' => '2026-03-20'],
            ['user_id' => 15, 'school_id' => 4,  'preferred_date' => '2026-03-21'],
        ];

        foreach ($appointments as $appt) {
            Appointment::create([
                'user_id'        => $appt['user_id'],
                'school_id'      => $appt['school_id'],
                'preferred_date' => $appt['preferred_date'],
                'confirmed_date' => $appt['preferred_date'],
                'status'         => 'confirmed',
                'message'        => null,
            ]);
        }

        // ── Step 2: Realistic reviews ──────────────────────────────────────────
        $reviews = [

            // ── BISC (school 8) — avg 4.6 ─────────────────────────────────────
            [
                'school_id' => 8,
                'user_id' => 1,
                'rating' => 5,
                'comment' => 'Absolutely outstanding school. Our daughter has thrived here academically and socially. The IGCSE results are exceptional and the IB programme is world-class. Teachers genuinely care about each student.',
            ],
            [
                'school_id' => 8,
                'user_id' => 2,
                'rating' => 5,
                'comment' => 'BISC is everything we hoped for. Excellent facilities, a wonderfully diverse student body, and the pastoral care system is superb. Worth every pound for the quality of education delivered.',
            ],
            [
                'school_id' => 8,
                'user_id' => 3,
                'rating' => 4,
                'comment' => 'Very strong academic programme. Extracurricular activities are impressive — robotics, arts, multiple sports. Traffic at pickup is the only real issue. Overall highly recommended for serious families.',
            ],
            [
                'school_id' => 8,
                'user_id' => 4,
                'rating' => 5,
                'comment' => 'World-class education in Cairo. Professional staff, transparent communication, and a genuine sense of community. Our two children have both excelled here. Cannot imagine a better school in Egypt.',
            ],
            [
                'school_id' => 8,
                'user_id' => 5,
                'rating' => 4,
                'comment' => 'High fees but you genuinely get what you pay for. Children develop real critical thinking skills here. The learning environment is stimulating and the teaching quality is consistently excellent.',
            ],

            // ── Cairo American College (school 15) — avg 4.4 ──────────────────
            [
                'school_id' => 15,
                'user_id' => 1,
                'rating' => 5,
                'comment' => 'Best American curriculum in Egypt by far. The college counselling is outstanding — our son received offers from three top US universities. The Maadi campus has a real American college atmosphere.',
            ],
            [
                'school_id' => 15,
                'user_id' => 6,
                'rating' => 5,
                'comment' => 'CAC has a genuinely international community with 60+ nationalities. My daughter made lifelong friends from across the globe. The AP programme is rigorous and prepares students very well for competitive universities.',
            ],
            [
                'school_id' => 15,
                'user_id' => 7,
                'rating' => 4,
                'comment' => 'Exceptional school with a real sense of belonging. Parent involvement is encouraged and school events are vibrant. The IB programme has opened many doors for our children. Would choose CAC again without hesitation.',
            ],
            [
                'school_id' => 15,
                'user_id' => 8,
                'rating' => 3,
                'comment' => 'Good school overall but the USD fee structure is painful with exchange rate volatility. Academic standards are high and the teachers are dedicated. Parking and traffic in Maadi is also a persistent challenge.',
            ],

            // ── Rahn Schulen Kairo (school 1) — avg 4.5 ──────────────────────
            [
                'school_id' => 1,
                'user_id' => 2,
                'rating' => 5,
                'comment' => 'Perfect for German-Egyptian families. Our children are now fully fluent in German and the Abitur qualification opens doors across all of Europe. The school combines German academic rigour with Egyptian warmth beautifully.',
            ],
            [
                'school_id' => 1,
                'user_id' => 9,
                'rating' => 4,
                'comment' => 'Excellent standards. The IB programme alongside the German curriculum is demanding but incredibly rewarding. Small class sizes mean every child receives genuine individual attention from engaged teachers.',
            ],
            [
                'school_id' => 1,
                'user_id' => 10,
                'rating' => 5,
                'comment' => 'We chose Rahn specifically for the bilingual programme and have not regretted it for a single day. Our daughter now speaks German, Arabic, and English fluently. A unique and genuinely valuable opportunity in Cairo.',
            ],

            // ── El Alsson (school 5) — avg 4.3 ───────────────────────────────
            [
                'school_id' => 5,
                'user_id' => 3,
                'rating' => 5,
                'comment' => 'El Alsson NewGiza is an excellent choice for families in the 6th of October area. The campus is modern and well-designed. Having both British and American curricula under one roof gives families remarkable flexibility.',
            ],
            [
                'school_id' => 5,
                'user_id' => 11,
                'rating' => 4,
                'comment' => 'Strong academic reputation matched by a lovely community feel. Teachers are dedicated and communication with parents is responsive. The NewGiza compound location is very convenient for us.',
            ],
            [
                'school_id' => 5,
                'user_id' => 12,
                'rating' => 4,
                'comment' => 'My son has improved significantly since joining. The blend of British and American curricula is unusual but genuinely works well in practice. Sports facilities could be expanded but the academics are solid.',
            ],

            // ── MBIS Maadi (school 14) — avg 4.1 ─────────────────────────────
            [
                'school_id' => 14,
                'user_id' => 4,
                'rating' => 5,
                'comment' => 'MBIS is a hidden gem in Maadi. Very international community, predominantly British and expat families. British curriculum delivered at the highest standard. The small school size means real relationships with teachers.',
            ],
            [
                'school_id' => 14,
                'user_id' => 13,
                'rating' => 4,
                'comment' => 'Great for expat families. Transition from UK schools was completely seamless for our children. Teachers are mostly British trained and maintain very high standards. Fees are significant but clearly justified.',
            ],
            [
                'school_id' => 14,
                'user_id' => 14,
                'rating' => 3,
                'comment' => 'Solid school but quite small. Extracurricular options are more limited compared to larger schools like BISC. Academic standards are good and the Maadi location is convenient for our neighbourhood.',
            ],

            // ── Evolution International School (school 10) — avg 4.3 ──────────
            [
                'school_id' => 10,
                'user_id' => 5,
                'rating' => 4,
                'comment' => 'Evolution is an excellent mid-range option with strong IB and British programmes. Teachers are engaged and communicative. Good value for the fee level compared to the top-tier schools in New Cairo.',
            ],
            [
                'school_id' => 10,
                'user_id' => 15,
                'rating' => 5,
                'comment' => 'Very happy with Evolution. The IB programme is well-delivered and the school maintains a warm, family atmosphere despite growing. Our son has made wonderful friends here. Highly recommend to New Cairo families.',
            ],

            // ── Ethos International School (school 7) — avg 4.3 ──────────────
            [
                'school_id' => 7,
                'user_id' => 10,
                'rating' => 5,
                'comment' => 'Ethos is a fantastic newer school in Sheikh Zayed. Modern facilities, small class sizes, and excellent IGCSE delivery. The teachers are young, enthusiastic, and deeply committed to each student.',
            ],
            [
                'school_id' => 7,
                'user_id' => 11,
                'rating' => 4,
                'comment' => 'Really impressed with Ethos. Already building a strong reputation despite being newer. Competitive fees compared to established schools and the quality is genuinely there. Great option for Sheikh Zayed families.',
            ],

            // ── Manaret Heliopolis (school 2) — avg 4.0 ──────────────────────
            [
                'school_id' => 2,
                'user_id' => 8,
                'rating' => 4,
                'comment' => 'Manaret is one of the best value IB schools in Cairo. Much more accessible fees than BISC or CAC with surprisingly strong quality. An excellent choice for El-Shorouk area families seeking the IB diploma.',
            ],
            [
                'school_id' => 2,
                'user_id' => 9,
                'rating' => 4,
                'comment' => 'We have been very happy with Manaret. The IB programme is challenging and the school environment is supportive and caring. Teachers are knowledgeable. Perfect location for us in El-Shorouk.',
            ],

            // ── Manor House (school 11) — avg 3.8 ────────────────────────────
            [
                'school_id' => 11,
                'user_id' => 12,
                'rating' => 4,
                'comment' => 'Manor House offers good value for money in 6th of October. Both American and British curricula available. The school has a friendly atmosphere and the teachers make real effort with each student.',
            ],
            [
                'school_id' => 11,
                'user_id' => 13,
                'rating' => 3,
                'comment' => 'Average school with decent academics. Facilities are not as modern as newer schools. The fee level is the main attraction. Teachers are generally good but turnover seems high which affects consistency.',
            ],

            // ── GEMS British School Al Rehab (school 4) — avg 4.0 ────────────
            [
                'school_id' => 4,
                'user_id' => 14,
                'rating' => 4,
                'comment' => 'GEMS Al Rehab is very conveniently located for Al Rehab City residents. British curriculum delivered to a good standard. The GEMS group brand brings consistency and quality assurance that gives parents confidence.',
            ],
            [
                'school_id' => 4,
                'user_id' => 15,
                'rating' => 4,
                'comment' => 'Solid school overall. Good teachers and a professional management structure from the GEMS network. Fees are reasonable for the location and quality offered. Our daughter is happy and progressing well.',
            ],

        ];

        foreach ($reviews as $review) {
            Review::create([
                'school_id'   => $review['school_id'],
                'user_id'     => $review['user_id'],
                'rating'      => $review['rating'],
                'comment'     => $review['comment'],
                'is_approved' => true,
                'is_verified' => true,
            ]);
        }
    }
}
