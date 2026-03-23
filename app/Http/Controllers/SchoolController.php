<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index(Request $request)
    {
        $query = School::with(['type', 'location', 'curricula', 'fees'])
            ->where('is_active', true);

        if ($search = $request->search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhereHas('location', fn($l) => $l->where('area', 'like', "%{$search}%")
                      ->orWhere('city', 'like', "%{$search}%"));
            });
        }

        if ($type = $request->type) {
            $query->whereHas('type', fn($q) => $q->where('name', 'like', "%{$type}%"));
        }

        if ($curriculum = $request->curriculum) {
            $query->whereHas('curricula', fn($q) => $q->where('abbreviation', 'like', "%{$curriculum}%")
                ->orWhere('name', 'like', "%{$curriculum}%"));
        }

        if ($location = $request->location) {
            $query->whereHas('location', fn($q) => $q->where('area', 'like', "%{$location}%")
                ->orWhere('city', 'like', "%{$location}%")
                ->orWhere('compound', 'like', "%{$location}%"));
        }

        if ($feeMin = $request->fee_min) {
            $query->whereHas('fees', fn($q) => $q->where('tuition_min', '>=', $feeMin)->where('is_public', true));
        }
        if ($feeMax = $request->fee_max) {
            $query->whereHas('fees', fn($q) => $q->where('tuition_max', '<=', $feeMax)->where('is_public', true));
        }

        switch ($request->sort) {
            case 'fee_low':
                $query->leftJoin('fees', 'schools.id', '=', 'fees.school_id')
                      ->orderBy('fees.tuition_min', 'asc')
                      ->select('schools.*');
                break;
            case 'fee_high':
                $query->leftJoin('fees', 'schools.id', '=', 'fees.school_id')
                      ->orderByDesc('fees.tuition_max')
                      ->select('schools.*');
                break;
            case 'rating':
                $query->withAvg(['reviews as avg_rating' => fn($q) => $q->where('is_approved', true)], 'rating')
                      ->orderByDesc('avg_rating');
                break;
            default:
                $query->orderBy('name');
        }

        $perPage = min((int) ($request->per_page ?? 12), 50);
        $schools = $query->paginate($perPage);
        $data    = $schools->getCollection()->map(fn($s) => $this->formatCard($s));

        return response()->json([
            'success' => true,
            'data'    => $data,
            'meta'    => [
                'current_page' => $schools->currentPage(),
                'last_page'    => $schools->lastPage(),
                'per_page'     => $schools->perPage(),
                'total'        => $schools->total(),
            ],
        ]);
    }

    public function show($id)
    {
        $school = School::with([
            'type',
            'location',
            'curricula',
            'fees'    => fn($q) => $q->where('is_public', true),
            'reviews' => fn($q) => $q->where('is_approved', true)->with('user:id,name')->latest(),
        ])->findOrFail($id);

        $fee = $school->fees->first();

        return response()->json([
            'success' => true,
            'data'    => [
                'id'             => $school->id,
                'name'           => $school->name,
                'type'           => $school->type?->name,
                'location'       => $school->location,
                'curricula'      => $school->curricula->pluck('abbreviation'),
                'feeMin'         => $fee?->tuition_min,
                'feeMax'         => $fee?->tuition_max,
                'currency'       => $fee?->currency ?? 'EGP',
                'feeDisplay'     => $fee ? number_format($fee->tuition_min) . ' - ' . number_format($fee->tuition_max) . ' ' . $fee->currency : null,
                'email'          => $school->email,
                'phone'          => $school->phone,
                'website'        => $school->website,
                'facebook'       => $school->facebook,
                'instagram'      => $school->instagram,
                'age_min'        => $school->age_min,
                'age_max'        => $school->age_max,
                'class_size_avg' => $school->class_size_avg,
                'num_students'   => $school->num_students,
                'foreign_ratio'  => $school->foreign_ratio,
                'transport'      => $school->transport,
                'rating'         => round($school->reviews->avg('rating') ?? 0, 1),
                'reviewCount'    => $school->reviews->count(),
                'reviews'        => $school->reviews->map(fn($r) => [
                    'id'      => $r->id,
                    'user'    => $r->user?->name ?? 'Anonymous',
                    'rating'  => $r->rating,
                    'comment' => $r->comment,
                    'date'    => $r->created_at->toDateString(),
                ]),
            ],
        ]);
    }

    public function compare(Request $request)
    {
        $request->validate([
            'ids'   => 'required|array|min:2|max:3',
            'ids.*' => 'integer|exists:schools,id',
        ]);

        $schools = School::with(['type', 'location', 'curricula', 'fees',
                'reviews' => fn($q) => $q->where('is_approved', true)])
            ->whereIn('id', $request->ids)
            ->get();

        $data = $schools->map(fn($s) => $this->formatCard($s, full: true));

        return response()->json(['success' => true, 'data' => $data]);
    }

    private function formatCard(School $s, bool $full = false): array
    {
        $fee             = $s->fees->first();
        $approvedReviews = $s->relationLoaded('reviews')
            ? $s->reviews->filter(fn($r) => $r->is_approved ?? true)
            : collect();
        $rating          = $approvedReviews->count() ? round($approvedReviews->avg('rating'), 1) : null;

        $base = [
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
            'rating'      => $rating,
            'reviewCount' => $approvedReviews->count(),
        ];

        if ($full) {
            $base += [
                'email'          => $s->email,
                'phone'          => $s->phone,
                'website'        => $s->website,
                'age_min'        => $s->age_min,
                'age_max'        => $s->age_max,
                'class_size_avg' => $s->class_size_avg,
                'transport'      => $s->transport,
            ];
        }

        return $base;
    }
}
