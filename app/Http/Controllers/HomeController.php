<?php

namespace App\Http\Controllers;

use App\Models\School;

class HomeController extends Controller
{
    public function index()
    {
        $schoolOfMonth = School::where('is_school_of_month', true)
            ->where('featured_until', '>=', today())
            ->with(['type', 'location', 'fees', 'curricula'])
            ->first();

        return view('home.index', compact('schoolOfMonth'));
    }
}
