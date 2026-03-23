<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\School;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * GET /api/favorites
     * Auth required — return all favorited schools for the authenticated user.
     */
    public function index(Request $request)
    {
        $favorites = Favorite::with(['school' => fn($q) => $q->with(['type', 'location', 'curricula', 'fees', 'reviews'])])
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();

        $data = $favorites->map(function ($fav) {
            $s   = $fav->school;
            $fee = $s->fees->first();
            return [
                'id'          => $s->id,
                'name'        => $s->name,
                'type'        => $s->type?->name,
                'area'        => $s->location?->area,
                'location'    => $s->location ? $s->location->area . ', ' . $s->location->city : null,
                'curricula'   => $s->curricula->pluck('abbreviation')->values(),
                'feeMin'      => $fee?->tuition_min,
                'feeMax'      => $fee?->tuition_max,
                'currency'    => $fee?->currency ?? 'EGP',
                'feeDisplay'  => $fee ? number_format($fee->tuition_min) . ' - ' . number_format($fee->tuition_max) . ' ' . $fee->currency : null,
                'rating'      => $s->rating,
                'reviewCount' => $s->review_count,
            ];
        });

        return response()->json(['success' => true, 'data' => $data]);
    }

    /**
     * POST /api/favorites/{schoolId}
     * Auth required — add school to favorites (idempotent).
     */
    public function store(Request $request, $schoolId)
    {
        $school = School::findOrFail($schoolId);

        Favorite::firstOrCreate([
            'user_id'   => $request->user()->id,
            'school_id' => $school->id,
        ]);

        return response()->json(['success' => true, 'message' => 'Added to favorites.']);
    }

    /**
     * DELETE /api/favorites/{schoolId}
     * Auth required — remove school from favorites.
     */
    public function destroy(Request $request, $schoolId)
    {
        Favorite::where('user_id', $request->user()->id)
            ->where('school_id', $schoolId)
            ->delete();

        return response()->json(['success' => true, 'message' => 'Removed from favorites.']);
    }
}
