<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * GET /api/admin/reviews?filter=all|pending|approved
     * Return all reviews with user name and school name.
     */
    public function index(Request $request)
    {
        $query = Review::with(['user:id,name,email', 'school:id,name']);

        switch ($request->filter) {
            case 'pending':
                $query->where('is_approved', false);
                break;
            case 'approved':
                $query->where('is_approved', true);
                break;
        }

        $reviews = $query->latest()->get()->map(fn($r) => [
            'id'          => $r->id,
            'school_id'   => $r->school_id,
            'school_name' => $r->school?->name,
            'user_id'     => $r->user_id,
            'user_name'   => $r->user?->name,
            'user_email'  => $r->user?->email,
            'rating'      => $r->rating,
            'comment'     => $r->comment,
            'is_approved' => (bool) $r->is_approved,
            'date'        => $r->created_at->toDateString(),
        ]);

        return response()->json(['success' => true, 'data' => $reviews]);
    }

    /**
     * PUT /api/admin/reviews/{id}/approve
     * Approve a review.
     */
    public function approve($id)
    {
        $review = Review::findOrFail($id);
        $review->update(['is_approved' => true]);

        return response()->json(['success' => true, 'message' => 'Review approved.']);
    }

    /**
     * DELETE /api/admin/reviews/{id}
     * Delete a review.
     */
    public function destroy($id)
    {
        Review::findOrFail($id)->delete();

        return response()->json(['success' => true, 'message' => 'Review deleted.']);
    }
}
