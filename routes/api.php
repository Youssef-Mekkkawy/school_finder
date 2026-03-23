<?php

use App\Http\Controllers\Admin\HomepageController as AdminHomepageController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\Route;

// ─── Auth routes ─────────────────────────────────────────────────────────────
require __DIR__.'/api_auth.php';

// ─── Public (no auth) ────────────────────────────────────────────────────────
Route::get('homepage/settings',    [AdminHomepageController::class, 'getSettings']);

// ─── Schools (Public) ────────────────────────────────────────────────────────
Route::get('schools/compare',      [SchoolController::class, 'compare']);
Route::get('schools/{id}',         [SchoolController::class, 'show']);
Route::get('schools',              [SchoolController::class, 'index']);
Route::get('schools/{id}/reviews',    [ReviewController::class, 'index']);
Route::get('schools/{id}/can-review', [ReviewController::class, 'canReview']);

// ─── Protected User Routes ───────────────────────────────────────────────────
Route::middleware('auth:sanctum')->group(function () {
    Route::post('schools/{id}/reviews',       [ReviewController::class, 'store']);
    Route::delete('reviews/{id}',             [ReviewController::class, 'destroy']);
    Route::get('user/reviews',                [ReviewController::class, 'userReviews']);

    // Favorites
    Route::get('favorites',                   [FavoriteController::class, 'index']);
    Route::post('favorites/{schoolId}',       [FavoriteController::class, 'store']);
    Route::delete('favorites/{schoolId}',     [FavoriteController::class, 'destroy']);

    // Appointments
    Route::post('appointments',               [AppointmentController::class, 'store']);
    Route::get('appointments',                [AppointmentController::class, 'userIndex']);
    Route::put('appointments/{id}/cancel',    [AppointmentController::class, 'cancel']);

    // Notifications — static segments before {id} wildcard
    Route::get('notifications/unread-count',  [NotificationController::class, 'unreadCount']);
    Route::put('notifications/read-all',      [NotificationController::class, 'markAllRead']);
    Route::get('notifications',               [NotificationController::class, 'index']);
    Route::put('notifications/{id}/read',     [NotificationController::class, 'markRead']);
});

// ─── Admin routes ─────────────────────────────────────────────────────────────
require __DIR__.'/api_admin.php';
