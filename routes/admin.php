<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminSkillController;

Route::get('/skills', [AdminSkillController::class, 'index'])->name('admin.skills.index');
Route::get('/skills/create', [AdminSkillController::class, 'create'])->name('admin.skills.create');
Route::post('/skills/store', [AdminSkillController::class, 'store'])->name('admin.skills.store');
Route::get('/skills/{id}/edit', [AdminSkillController::class, 'edit'])->name('admin.skills.edit');
Route::post('/skills/{id}/update', [AdminSkillController::class, 'update'])->name('admin.skills.update');
Route::delete('/skills/{id}/delete', [AdminSkillController::class, 'destroy'])->name('admin.skills.delete');


use App\Http\Controllers\Admin\AdminWorkerController;

Route::get('/workers', [AdminWorkerController::class, 'index'])->name('admin.workers.index');
Route::get('/workers/{id}', [AdminWorkerController::class, 'show'])->name('admin.workers.show');
Route::post('/workers/{id}/approve', [AdminWorkerController::class, 'approve'])->name('admin.workers.approve');
Route::post('/workers/{id}/reject', [AdminWorkerController::class, 'reject'])->name('admin.workers.reject');


use App\Http\Controllers\Admin\AdminCustomerController;

Route::get('/customers', [AdminCustomerController::class, 'index'])->name('admin.customers.index');
Route::get('/customers/{id}', [AdminCustomerController::class, 'show'])->name('admin.customers.show');
Route::delete('/customers/{id}', [AdminCustomerController::class, 'destroy'])->name('admin.customers.delete');


use App\Http\Controllers\Admin\AdminBookingController;

Route::get('/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings.index');
Route::get('/bookings/{id}', [AdminBookingController::class, 'show'])->name('admin.bookings.show');
