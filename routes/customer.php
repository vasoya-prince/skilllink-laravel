<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\Customer\CustomerSkillBrowseController;
use App\Http\Controllers\Customer\CustomerBookingController;
use App\Http\Controllers\Customer\CustomerReviewController;

/*
|--------------------------------------------------------------------------
| CUSTOMER ROUTES
|--------------------------------------------------------------------------
| All customer-related pages: dashboard, browsing, workers, booking, reviews
| These routes should be loaded inside the auth + customer middleware group.
| Example:
| Route::middleware(['auth', 'role:customer'])->group(function () {
|     require __DIR__.'/customer.php';
| });
|
*/

// Dashboard
Route::get('/dashboard', [CustomerDashboardController::class, 'index'])
    ->name('customer.dashboard');



/**
 * ----------------------------------------------------
 *    SKILL BROWSING
 * ----------------------------------------------------
 */

// All skills list
Route::get('/skills', [CustomerSkillBrowseController::class, 'index'])
    ->name('customer.skills');

// Workers by skill (this loads workers.blade.php)
Route::get('/skills/{skillId}/workers', [CustomerSkillBrowseController::class, 'workers'])
    ->name('customer.skills.workers');



/**
 * ----------------------------------------------------
 *    WORKER PROFILE + BOOKING
 * ----------------------------------------------------
 */

// View worker profile
Route::get('/worker/{id}', [CustomerSkillBrowseController::class, 'viewWorker'])
    ->name('customer.worker.view');

// Book worker
Route::post('/worker/{id}/book', [CustomerBookingController::class, 'store'])
    ->name('customer.worker.book');



/**
 * ----------------------------------------------------
 *    BOOKINGS
 * ----------------------------------------------------
 */

Route::get('/bookings', [CustomerBookingController::class, 'index'])
    ->name('customer.bookings.index');

Route::post('/bookings/{id}/cancel', [CustomerBookingController::class, 'cancel'])
    ->name('customer.bookings.cancel');



/**
 * ----------------------------------------------------
 *    REVIEWS
 * ----------------------------------------------------
 */

Route::get('/bookings/{id}/review', [CustomerReviewController::class, 'create'])
    ->name('customer.review.create');

Route::post('/bookings/{id}/review', [CustomerReviewController::class, 'store'])
    ->name('customer.review.store');
