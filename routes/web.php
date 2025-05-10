<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestAkunController as PublicRequestAkunController;
use App\Http\Controllers\Admin\RequestAkunController as AdminRequestAkunController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\IsAdmin;

// Halaman utama
Route::get('/', function () {
    return view('home');
});

// Dashboard user biasa
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route admin - hanya untuk akun dengan auth
Route::middleware(['auth', IsAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/permintaan-akun', [AdminRequestAkunController::class, 'index'])->name('request.index');
    Route::post('/permintaan-akun/{id}/approve', [AdminRequestAkunController::class, 'approve'])->name('request.approve');
    Route::post('/permintaan-akun/{id}/reject', [AdminRequestAkunController::class, 'reject'])->name('request.reject');
});

// Form request akun (public)
// Form request akun (public)
Route::get('/request-akun', [PublicRequestAkunController::class, 'create'])->name('request-akun.form');
Route::post('/request-akun', [PublicRequestAkunController::class, 'store'])->name('request-akun.submit');

// Profile routes (untuk user yang login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes
require __DIR__.'/auth.php';