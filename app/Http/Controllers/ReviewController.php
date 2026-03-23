<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Review;
use App\Models\School;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * GET /api/schools/{id}/reviews
     * Public — approved reviews for a school.
     */
    public function index($schoolId)
    {
        $school = School::findOrFail($schoolId);

        $reviews = Review::with('user:id,name')
            ->where('school_id', $school->id)
            ->where('is_approved', true)
            ->latest()
            ->get()
            ->map(fn($r) => [
                'id'          => $r->id,
                'user'        => $r->user?->name ?? 'Anonymous',
                'rating'      => $r->rating,
                'comment'     => $r->comment,
                'is_verified' => (bool) $r->is_verified,
                'date'        => $r->created_at->toDateString(),
            ]);

        return response()->json(['success' => true, 'data' => $reviews]);
    }

    /**
     * POST /api/schools/{id}/reviews
     * Auth required — submit a review.
     */
    public function store(Request $request, $schoolId)
    {
        $school = School::findOrFail($schoolId);

        $data = $request->validate([
            'rating'  => 'required|integer|between:1,5',
            'comment' => 'required|string|min:10',
        ]);

        $review = Review::create([
            'school_id'   => $school->id,
            'user_id'     => $request->user()->id,
            'rating'      => $data['rating'],
            'comment'     => $data['comment'],
            'is_approved' => false,
        ]);

        $hasConfirmedVisit = Appointment::where('user_id', $request->user()->id)
            ->where('school_id', $school->id)
            ->where('status', 'confirmed')
            ->exists();

        if (!$hasConfirmedVisit) {
            $review->delete();
            return response()->json([
                'success' => false,
                'message' => 'You must have a confirmed visit to this school before reviewing.',
            ], 403);
        }

        $review->update(['is_verified' => true]);

        return response()->json([
            'success' => true,
            'message' => 'Review submitted and pending approval.',
            'data'    => [
                'id'      => $review->id,
                'rating'  => $review->rating,
                'comment' => $review->comment,
                'date'    => $review->created_at->toDateString(),
            ],
        ], 201);
    }

    /**
     * DELETE /api/reviews/{id}
     * Auth required — delete own review.
     */
    public function destroy(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        if ($review->user_id !== $request->user()->id) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized.',
            ], 403);
        }

        $review->delete();

        return response()->json(['success' => true, 'message' => 'Review deleted.']);
    }

    /**
     * GET /api/user/reviews
     * Auth required — current user's own reviews.
     */
    public function userReviews(Request $request)
    {
        $reviews = Review::with('school:id,name')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get()
            ->map(fn($r) => [
                'id'          => $r->id,
                'school_id'   => $r->school_id,
                'school_name' => $r->school?->name,
                'rating'      => $r->rating,
                'comment'     => $r->comment,
                'is_approved' => (bool) $r->is_approved,
                'is_verified' => (bool) $r->is_verified,
                'date'        => $r->created_at->toDateString(),
            ]);

        return response()->json(['success' => true, 'data' => $reviews]);
    }

    /**
     * GET /api/schools/{id}/can-review
     * Public — checks whether the current user can submit a review.
     */
    public function canReview(Request $request, $schoolId)
    {
        $school = School::findOrFail($schoolId);

        $token = $request->bearerToken();
        if (!$token) {
            return response()->json([
                'can_review'      => false,
                'reason'          => 'not_logged_in',
                'has_appointment' => false,
            ]);
        }

        $user = auth('sanctum')->user();
        if (!$user) {
            return response()->json([
                'can_review'      => false,
                'reason'          => 'not_logged_in',
                'has_appointment' => false,
            ]);
        }

        $hasAppointment = Appointment::where('user_id', $user->id)
            ->where('school_id', $school->id)
            ->exists();

        $hasConfirmed = Appointment::where('user_id', $user->id)
            ->where('school_id', $school->id)
            ->where('status', 'confirmed')
            ->exists();

        if (!$hasConfirmed) {
            return response()->json([
                'can_review'      => false,
                'reason'          => 'no_appointment',
                'has_appointment' => $hasAppointment,
            ]);
        }

        return response()->json([
            'can_review'      => true,
            'reason'          => 'ok',
            'has_appointment' => true,
        ]);
    }
}
