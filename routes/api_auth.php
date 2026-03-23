<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

// ─── Public Auth ─────────────────────────────────────────────────────────────
Route::prefix('auth')->group(function () {
    Route::post('register',        [AuthController::class, 'register'])
         ->name('api.auth.register');
    Route::post('login',           [AuthController::class, 'login'])
         ->name('api.auth.login');
    Route::post('admin/login',     [AuthController::class, 'adminLogin'])
         ->name('api.auth.admin.login');
    Route::post('forgot-password', [AuthController::class, 'forgotPassword'])
         ->name('api.auth.forgot');
});

// ─── Protected Auth ───────────────────────────────────────────────────────────
Route::middleware('auth:sanctum')->prefix('auth')->group(function () {
    Route::post('logout',  [AuthController::class, 'logout'])
         ->name('api.auth.logout');
    Route::get('me',       [AuthController::class, 'me'])
         ->name('api.auth.me');
    Route::put('profile',  [AuthController::class, 'updateProfile'])
         ->name('api.auth.profile');
    Route::put('password', [AuthController::class, 'changePassword'])
         ->name('api.auth.password');
});
