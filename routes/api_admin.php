<?php

use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\HomepageController as AdminHomepageController;
use App\Http\Controllers\Admin\NotificationController as AdminNotificationController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\SchoolController as AdminSchoolController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Route;

// ─── Admin Routes ─────────────────────────────────────────────────────────────
Route::middleware(['auth:sanctum', 'admin'])->prefix('admin')->group(function () {
    // Dashboard
    Route::get('stats',            [AdminDashboardController::class, 'stats']);

    // Schools
    Route::get('schools',                        [AdminSchoolController::class, 'index']);
    Route::post('schools',                       [AdminSchoolController::class, 'store']);
    Route::put('schools/{id}',                   [AdminSchoolController::class, 'update']);
    Route::delete('schools/{id}',                [AdminSchoolController::class, 'destroy']);
    Route::put('schools/{id}/set-featured',      [AdminSchoolController::class, 'setSchoolOfMonth']);
    Route::put('schools/{id}/remove-featured',   [AdminSchoolController::class, 'removeSchoolOfMonth']);

    // Reviews
    Route::get('reviews',                      [AdminReviewController::class, 'index']);
    Route::put('reviews/{id}/approve',         [AdminReviewController::class, 'approve']);
    Route::delete('reviews/{id}',              [AdminReviewController::class, 'destroy']);

    // Appointments
    Route::get('appointments',                 [AdminAppointmentController::class, 'index']);
    Route::put('appointments/{id}/status',     [AdminAppointmentController::class, 'updateStatus']);
    Route::delete('appointments/{id}',         [AdminAppointmentController::class, 'destroy']);

    // Users
    Route::get('users',                        [AdminUserController::class, 'index']);
    Route::delete('users/{id}',                [AdminUserController::class, 'destroy']);

    // Notifications
    Route::post('notifications/send',          [AdminNotificationController::class, 'send']);

    // Homepage settings
    Route::get('homepage/settings',            [AdminHomepageController::class, 'getSettings']);
    Route::post('homepage/hero',               [AdminHomepageController::class, 'saveHero']);
    Route::post('homepage/stats',              [AdminHomepageController::class, 'saveStats']);
    Route::post('homepage/types',              [AdminHomepageController::class, 'saveTypes']);
    Route::post('homepage/featured',           [AdminHomepageController::class, 'saveFeatured']);
});
