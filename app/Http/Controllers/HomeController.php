<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolType;
use App\Models\HomepageSetting;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // ── School of the month ───────────────────────────────────────────────
        $schoolOfMonth = School::where('is_school_of_month', true)
            ->where(fn($q) => $q->whereNull('featured_until')
                ->orWhere('featured_until', '>=', today()))
            ->with(['type', 'location', 'fees', 'curricula'])
            ->first();

        // ── School types — dynamic count from DB ──────────────────────────────
        // This is live: adding/removing schools automatically updates the count
        $schoolTypes = SchoolType::select('school_types.id', 'school_types.name')
            ->withCount(['schools' => fn($q) => $q->where('is_active', true)])
            ->having('schools_count', '>', 0)
            ->orderByDesc('schools_count')
            ->get()
            ->map(fn($t) => [
                'id'    => $t->id,
                'name'  => $t->name,
                'count' => $t->schools_count,
                'icon'  => $this->typeIcon($t->name),
                'desc'  => $this->typeDesc($t->name),
            ]);

        // ── Stats bar — dynamic ───────────────────────────────────────────────
        $stats = [
            ['value' => School::where('is_active', true)->count() . '+', 'label' => 'Schools Listed'],
            ['value' => DB::table('reviews')->where('is_approved', true)->count() . '+', 'label' => 'Parent Reviews'],
            ['value' => DB::table('curricula')->count(), 'label' => 'Curricula Types'],
            ['value' => 'Free', 'label' => 'Always Free'],
        ];

        // ── Hero & other settings from homepage_settings ──────────────────────
        $hero     = $this->setting('hero');
        $featured = $this->setting('featured');

        // ── Featured schools from DB (not hardcoded IDs) ──────────────────────
        $featuredSchools = School::with(['type', 'location', 'fees', 'curricula'])
            ->where('is_active', true)
            ->where('is_school_of_month', false)
            ->when(
                is_array($featured) && count($featured),
                fn($q) => $q->whereIn('id', $featured),
                fn($q) => $q->orderByDesc('id')->limit(3)
            )
            ->get();

        return view('home.index', compact(
            'schoolOfMonth',
            'schoolTypes',
            'stats',
            'hero',
            'featuredSchools'
        ));
    }

    // ── Helpers ───────────────────────────────────────────────────────────────

    private function setting(string $key): mixed
    {
        $row = HomepageSetting::where('key', $key)->first();
        return $row ? json_decode($row->value, true) : null;
    }

    private function typeIcon(string $name): string
    {
        return match (strtolower($name)) {
            'british'       => '🇬🇧',
            'american'      => '🇺🇸',
            'german'        => '🇩🇪',
            'french'        => '🇫🇷',
            'ib world'      => '🌍',
            'international' => '🌐',
            'canadian'      => '🇨🇦',
            'montessori'    => '🎨',
            'egyptian'      => '🏫',
            default         => '🏫',
        };
    }

    private function typeDesc(string $name): string
    {
        return match (strtolower($name)) {
            'british'       => 'IGCSE & A-Level curriculum',
            'american'      => 'US Diploma & AP courses',
            'german'        => 'Abitur & IB programmes',
            'french'        => 'French Baccalaureate',
            'ib world'      => 'International Baccalaureate',
            'international' => 'Global curriculum standards',
            'canadian'      => 'Dogwood & Ontario diplomas',
            'montessori'    => 'Child-centred learning',
            'egyptian'      => 'National curriculum',
            default         => 'International curriculum',
        };
    }
}
