<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\Location;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolController extends Controller
{
    /**
     * GET /api/admin/schools
     * Return all schools with type, location, fees, rating, review count.
     */
    public function index()
    {
        $schools = School::with(['type', 'location', 'curricula', 'fees',
                'reviews' => fn($q) => $q->where('is_approved', true)])
            ->get()
            ->map(fn($s) => $this->formatRow($s));

        return response()->json(['success' => true, 'data' => $schools]);
    }

    /**
     * POST /api/admin/schools
     * Create school with location, type, curricula, and fees in one transaction.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'           => 'required|string|max:255|unique:schools,name',
            'type_id'        => 'required|integer|exists:school_types,id',
            'email'          => 'required|email',
            'phone'          => 'required|string',
            'website'        => 'nullable|url',
            'facebook'       => 'nullable|string',
            'instagram'      => 'nullable|string',
            'age_min'        => 'required|integer|between:1,25',
            'age_max'        => 'required|integer|between:1,25',
            'class_size_avg' => 'nullable|integer',
            'num_students'   => 'nullable|string',
            'foreign_ratio'  => 'nullable|numeric',
            'transport'      => 'nullable|string',
            'is_active'      => 'boolean',
            // Location
            'area'           => 'required|string',
            'city'           => 'required|string',
            'compound'       => 'nullable|string',
            'address'        => 'nullable|string',
            'latitude'       => 'nullable|numeric',
            'longitude'      => 'nullable|numeric',
            // Curricula
            'curricula'      => 'required|array|min:1',
            'curricula.*'    => 'integer|exists:curricula,id',
            // Fees
            'fee_min'        => 'required|numeric|min:0',
            'fee_max'        => 'required|numeric|min:0',
            'currency'       => 'nullable|string|max:10',
            'academic_year'  => 'nullable|string',
        ]);

        DB::transaction(function () use ($data, &$school) {
            $location = Location::create([
                'area'      => $data['area'],
                'city'      => $data['city'],
                'compound'  => $data['compound'] ?? null,
                'address'   => $data['address'] ?? '',
                'latitude'  => $data['latitude'] ?? null,
                'longitude' => $data['longitude'] ?? null,
            ]);

            $school = School::create([
                'name'           => $data['name'],
                'type_id'        => $data['type_id'],
                'location_id'    => $location->id,
                'email'          => $data['email'],
                'phone'          => $data['phone'],
                'website'        => $data['website'] ?? null,
                'facebook'       => $data['facebook'] ?? null,
                'instagram'      => $data['instagram'] ?? null,
                'age_min'        => $data['age_min'],
                'age_max'        => $data['age_max'],
                'class_size_avg' => $data['class_size_avg'] ?? null,
                'num_students'   => $data['num_students'] ?? null,
                'foreign_ratio'  => $data['foreign_ratio'] ?? null,
                'transport'      => $data['transport'] ?? null,
                'is_active'      => $data['is_active'] ?? true,
            ]);

            $school->curricula()->sync($data['curricula']);

            Fee::create([
                'school_id'     => $school->id,
                'academic_year' => $data['academic_year'] ?? date('Y') . '/' . (date('Y') + 1),
                'tuition_min'   => $data['fee_min'],
                'tuition_max'   => $data['fee_max'],
                'currency'      => $data['currency'] ?? 'EGP',
                'is_public'     => true,
            ]);
        });

        $school->load(['type', 'location', 'curricula', 'fees']);

        return response()->json([
            'success' => true,
            'message' => 'School created successfully.',
            'data'    => $this->formatRow($school),
        ], 201);
    }

    /**
     * PUT /api/admin/schools/{id}
     * Update school and related data.
     */
    public function update(Request $request, $id)
    {
        $school = School::with(['location', 'fees'])->findOrFail($id);

        $data = $request->validate([
            'name'           => 'sometimes|string|max:255|unique:schools,name,' . $id,
            'type_id'        => 'sometimes|integer|exists:school_types,id',
            'email'          => 'sometimes|email',
            'phone'          => 'sometimes|string',
            'website'        => 'nullable|url',
            'facebook'       => 'nullable|string',
            'instagram'      => 'nullable|string',
            'age_min'        => 'sometimes|integer|between:1,25',
            'age_max'        => 'sometimes|integer|between:1,25',
            'class_size_avg' => 'nullable|integer',
            'num_students'   => 'nullable|string',
            'foreign_ratio'  => 'nullable|numeric',
            'transport'      => 'nullable|string',
            'is_active'      => 'boolean',
            // Location
            'area'           => 'sometimes|string',
            'city'           => 'sometimes|string',
            'compound'       => 'nullable|string',
            'address'        => 'nullable|string',
            'latitude'       => 'nullable|numeric',
            'longitude'      => 'nullable|numeric',
            // Curricula
            'curricula'      => 'sometimes|array|min:1',
            'curricula.*'    => 'integer|exists:curricula,id',
            // Fees
            'fee_min'        => 'sometimes|numeric|min:0',
            'fee_max'        => 'sometimes|numeric|min:0',
            'currency'       => 'nullable|string|max:10',
            'academic_year'  => 'nullable|string',
        ]);

        DB::transaction(function () use ($data, $school) {
            $school->update(array_intersect_key($data, array_flip([
                'name', 'type_id', 'email', 'phone', 'website', 'facebook',
                'instagram', 'age_min', 'age_max', 'class_size_avg',
                'num_students', 'foreign_ratio', 'transport', 'is_active',
            ])));

            $locationFields = array_intersect_key($data, array_flip([
                'area', 'city', 'compound', 'address', 'latitude', 'longitude',
            ]));
            if ($locationFields && $school->location) {
                $school->location->update($locationFields);
            }

            if (isset($data['curricula'])) {
                $school->curricula()->sync($data['curricula']);
            }

            $feeFields = array_intersect_key($data, array_flip(['fee_min', 'fee_max', 'currency', 'academic_year']));
            if ($feeFields) {
                $fee = $school->fees->first();
                $mapped = array_filter([
                    'tuition_min'   => $feeFields['fee_min'] ?? null,
                    'tuition_max'   => $feeFields['fee_max'] ?? null,
                    'currency'      => $feeFields['currency'] ?? null,
                    'academic_year' => $feeFields['academic_year'] ?? null,
                ], fn($v) => !is_null($v));
                if ($fee) {
                    $fee->update($mapped);
                } else {
                    Fee::create(array_merge($mapped, ['school_id' => $school->id, 'is_public' => true]));
                }
            }
        });

        $school->load(['type', 'location', 'curricula', 'fees',
            'reviews' => fn($q) => $q->where('is_approved', true)]);

        return response()->json([
            'success' => true,
            'message' => 'School updated successfully.',
            'data'    => $this->formatRow($school),
        ]);
    }

    /**
     * DELETE /api/admin/schools/{id}
     * Hard delete school and cascade related data.
     */
    public function destroy($id)
    {
        $school = School::findOrFail($id);

        DB::transaction(function () use ($school) {
            $school->reviews()->delete();
            $school->favorites()->delete();
            $school->appointments()->delete();
            $school->fees()->delete();
            $school->curricula()->detach();
            if ($school->location) {
                $school->location()->delete();
            }
            $school->delete();
        });

        return response()->json(['success' => true, 'message' => 'School deleted successfully.']);
    }

    private function formatRow(School $s): array
    {
        $fee             = $s->fees->first();
        $approvedReviews = $s->relationLoaded('reviews')
            ? $s->reviews->filter(fn($r) => $r->is_approved ?? true)
            : collect();
        $rating          = $approvedReviews->count() ? round($approvedReviews->avg('rating'), 1) : null;

        return [
            'id'             => $s->id,
            'name'           => $s->name,
            'type'           => $s->type?->name,
            'type_id'        => $s->type_id,
            'area'           => $s->location?->area,
            'city'           => $s->location?->city,
            'location'       => $s->location ? $s->location->area . ', ' . $s->location->city : null,
            'curricula'      => $s->curricula->pluck('abbreviation')->values(),
            'curricula_ids'  => $s->curricula->pluck('id')->values(),
            'feeMin'         => $fee?->tuition_min,
            'feeMax'         => $fee?->tuition_max,
            'currency'       => $fee?->currency ?? 'EGP',
            'feeDisplay'     => $fee ? number_format($fee->tuition_min) . ' – ' . number_format($fee->tuition_max) . ' ' . $fee->currency : null,
            'rating'         => $rating,
            'reviewCount'    => $approvedReviews->count(),
            'email'          => $s->email,
            'phone'          => $s->phone,
            'website'        => $s->website,
            'facebook'       => $s->facebook,
            'instagram'      => $s->instagram,
            'age_min'        => $s->age_min,
            'age_max'        => $s->age_max,
            'class_size_avg' => $s->class_size_avg,
            'num_students'   => $s->num_students,
            'foreign_ratio'  => $s->foreign_ratio,
            'transport'           => $s->transport,
            'is_active'           => (bool) $s->is_active,
            'is_school_of_month'  => (bool) $s->is_school_of_month,
            'featured_badge_text' => $s->featured_badge_text,
            'featured_until'      => $s->featured_until,
        ];
    }

    /**
     * PUT /api/admin/schools/{id}/set-featured
     */
    public function setSchoolOfMonth(Request $request, $id)
    {
        $request->validate([
            'badge_text'     => 'required|string|max:100',
            'featured_until' => 'required|date|after:today',
        ]);

        School::where('is_school_of_month', true)->update([
            'is_school_of_month'  => false,
            'featured_badge_text' => null,
            'featured_until'      => null,
        ]);

        $school = School::findOrFail($id);
        $school->update([
            'is_school_of_month'  => true,
            'featured_badge_text' => $request->badge_text,
            'featured_until'      => $request->featured_until,
        ]);

        return response()->json(['success' => true, 'message' => 'School of the month set.']);
    }

    /**
     * PUT /api/admin/schools/{id}/remove-featured
     */
    public function removeSchoolOfMonth($id)
    {
        $school = School::findOrFail($id);
        $school->update([
            'is_school_of_month'  => false,
            'featured_badge_text' => null,
            'featured_until'      => null,
        ]);
        return response()->json(['success' => true, 'message' => 'Featured status removed.']);
    }
}
