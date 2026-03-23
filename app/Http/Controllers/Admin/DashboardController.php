<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Review;
use App\Models\School;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * GET /api/admin/stats
     * Return dashboard statistics.
     */
    public function index()
    {
        // Only the static admin UI – all stats are fetched via AJAX.
        return view('admin.dashboard');
    }
    public function stats()
    {
        // Counts
        $totalSchools           = School::count();
        $totalUsers             = User::count();
        $totalReviews           = Review::count();
        $pendingReviews         = Review::where('is_approved', false)->count();
        $totalAppointments      = Appointment::count();
        $pendingAppointments    = Appointment::where('status', 'pending')->count();

        // Schools by type
        $schoolsByType = School::join('school_types', 'schools.type_id', '=', 'school_types.id')
            ->selectRaw('school_types.name as type, COUNT(schools.id) as count')
            ->groupBy('school_types.id', 'school_types.name')
            ->get()
            ->map(fn($r) => ['type' => $r->type, 'count' => (int) $r->count]);

        // Top rated schools (approved reviews only, min 1 review)
        $topRated = School::withAvg(
            ['reviews as avg_rating' => fn($q) => $q->where('is_approved', true)],
            'rating'
        )
            ->withCount(['reviews as review_count' => fn($q) => $q->where('is_approved', true)])
            ->having('review_count', '>=', 1)
            ->orderByDesc('avg_rating')
            ->limit(5)
            ->get()
            ->map(fn($s) => [
                'id'     => $s->id,
                'name'   => $s->name,
                'rating' => round($s->avg_rating, 1),
            ]);

        // Recent activity — last 10 appointments + reviews combined
        $recentAppointments = Appointment::with(['user:id,name', 'school:id,name'])
            ->latest()
            ->limit(10)
            ->get()
            ->map(fn($a) => [
                'user'   => $a->user?->name,
                'action' => 'appointment',
                'school' => $a->school?->name,
                'time'   => $a->created_at->diffForHumans(),
                'status' => $a->status,
            ]);

        $recentReviews = Review::with(['user:id,name', 'school:id,name'])
            ->latest()
            ->limit(10)
            ->get()
            ->map(fn($r) => [
                'user'   => $r->user?->name,
                'action' => 'review',
                'school' => $r->school?->name,
                'time'   => $r->created_at->diffForHumans(),
                'status' => $r->is_approved ? 'approved' : 'pending',
            ]);

        $recentActivity = $recentAppointments->concat($recentReviews)
            ->sortByDesc(fn($item) => $item['time'])
            ->take(10)
            ->values();

        return response()->json([
            'success' => true,
            'data'    => [
                'total_schools'           => $totalSchools,
                'total_users'             => $totalUsers,
                'total_reviews'           => $totalReviews,
                'pending_reviews'         => $pendingReviews,
                'total_appointments'      => $totalAppointments,
                'pending_appointments'    => $pendingAppointments,
                'schools_by_type'         => $schoolsByType,
                'top_rated'               => $topRated,
                'recent_activity'         => $recentActivity,
            ],
        ]);
    }
}
