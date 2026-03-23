<?php

use Illuminate\Support\Facades\Route;

// ── PUBLIC PAGES ─────────────────────────────────────────────
// These controllers just return the blade views.
// All real logic is handled by the API + JavaScript.

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    // return view('auth.login');
    return;
})->name('register');


// ── PROTECTED PAGES (JS auth guard handles redirect) ─────────
// No server-side middleware needed here.
// The JavaScript on each page checks localStorage for sf_token
// and redirects to /login if not found.

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::post('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
    }
    return back();
})->name('lang.switch');
