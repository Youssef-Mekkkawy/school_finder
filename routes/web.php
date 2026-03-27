<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
// ── PUBLIC PAGES ─────────────────────────────────────────────
// These controllers just return the blade views.
// All real logic is handled by the API + JavaScript.

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    // return view('auth.login');
    return;
})->name('register');


// ── PROTECTED PAGES ──────────────────────────────────────────
Route::get('/dashboard', function () {
    return view('user.dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth:admin');

// ── WEB SESSION ENDPOINTS (called by login.js to establish session) ──
Route::post('/auth/session', function (Illuminate\Http\Request $request) {
    $credentials = $request->validate(['email' => 'required|email', 'password' => 'required']);
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return response()->json(['success' => true]);
    }
    return response()->json(['success' => false], 401);
})->name('auth.session');

Route::post('/auth/admin-session', function (Illuminate\Http\Request $request) {
    $credentials = $request->validate(['email' => 'required|email', 'password' => 'required']);
    if (Auth::guard('admin')->attempt($credentials)) {
        $request->session()->regenerate();
        return response()->json(['success' => true]);
    }
    return response()->json(['success' => false], 401);
})->name('auth.admin.session');

Route::post('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
    }
    return back();
})->name('lang.switch');

Route::post('/logout', function () {
    Auth::logout();
    Auth::guard('admin')->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');
