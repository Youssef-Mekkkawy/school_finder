<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSetting;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * GET /api/admin/homepage/settings
     * Return all homepage settings as a key-value object.
     */
    public function getSettings()
    {
        $rows = HomepageSetting::all()->pluck('value', 'key');

        $settings = [];
        foreach ($rows as $key => $value) {
            $decoded = json_decode($value, true);
            $settings[$key] = json_last_error() === JSON_ERROR_NONE ? $decoded : $value;
        }

        return response()->json(['success' => true, 'data' => $settings]);
    }

    /**
     * POST /api/admin/homepage/hero
     * Save hero section settings.
     */
    public function saveHero(Request $request)
    {
        $data = $request->validate([
            'badge'    => 'nullable|string|max:100',
            'title'    => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'btn_text' => 'nullable|string|max:100',
            'cta_text' => 'nullable|string|max:100',
        ]);

        $this->saveSetting('hero', $data);

        return response()->json(['success' => true, 'message' => 'Hero settings saved.']);
    }

    /**
     * POST /api/admin/homepage/stats
     * Save stats section (4 stat values and labels as JSON).
     */
    public function saveStats(Request $request)
    {
        $data = $request->validate([
            'stats'          => 'required|array|size:4',
            'stats.*.value'  => 'required|string',
            'stats.*.label'  => 'required|string',
        ]);

        $this->saveSetting('stats', $data['stats']);

        return response()->json(['success' => true, 'message' => 'Stats settings saved.']);
    }

    /**
     * POST /api/admin/homepage/types
     * Save school type cards as JSON.
     */
    public function saveTypes(Request $request)
    {
        $data = $request->validate([
            'types'         => 'required|array',
            'types.*.name'  => 'required|string',
            'types.*.count' => 'nullable|string',
            'types.*.icon'  => 'nullable|string',
        ]);

        $this->saveSetting('types', $data['types']);

        return response()->json(['success' => true, 'message' => 'Types settings saved.']);
    }

    /**
     * POST /api/admin/homepage/featured
     * Save array of featured school IDs.
     */
    public function saveFeatured(Request $request)
    {
        $data = $request->validate([
            'ids'   => 'required|array|min:1|max:6',
            'ids.*' => 'integer|exists:schools,id',
        ]);

        $this->saveSetting('featured', $data['ids']);

        return response()->json(['success' => true, 'message' => 'Featured schools saved.']);
    }

    private function saveSetting(string $key, mixed $value): void
    {
        HomepageSetting::updateOrCreate(
            ['key' => $key],
            ['value' => json_encode($value)]
        );
    }
}
