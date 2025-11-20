<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Worker\WorkerDashboardController;
use App\Http\Controllers\Worker\WorkerBookingController;
use App\Http\Controllers\Worker\WorkerProfileController;
use App\Http\Controllers\Worker\WorkerSkillController;

Route::get('/dashboard', [WorkerDashboardController::class, 'index'])
    ->name('worker.dashboard');

Route::get('/bookings', [WorkerBookingController::class, 'index'])
    ->name('worker.bookings.index');

Route::post('/bookings/{id}/accept', [WorkerBookingController::class, 'accept'])
    ->name('worker.bookings.accept');

Route::post('/bookings/{id}/reject', [WorkerBookingController::class, 'reject'])
    ->name('worker.bookings.reject');

Route::post('/bookings/{id}/complete', [WorkerBookingController::class, 'complete'])
    ->name('worker.bookings.complete');

// Profile
Route::get('/profile', [WorkerProfileController::class, 'edit'])->name('worker.profile.edit');
Route::post('/profile', [WorkerProfileController::class, 'update'])->name('worker.profile.update');
Route::post('/profile/delete', [WorkerProfileController::class, 'destroy'])->name('worker.profile.delete');

// Skills
Route::get('/skills', [WorkerSkillController::class, 'edit'])->name('worker.skills.edit');
Route::post('/skills', [WorkerSkillController::class, 'update'])->name('worker.skills.update');
