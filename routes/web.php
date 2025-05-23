<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestAkunController as PublicRequestAkunController;
use App\Http\Controllers\Admin\RequestAkunController as AdminRequestAkunController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Staff\DashboardController as StaffDashboardController;
use App\Http\Controllers\Staff\BarangController;
use App\Http\Controllers\Staff\KerusakanController;
use App\Http\Controllers\Staff\PengadaanController;


// Halaman utama (home page publik)
Route::get('/', function () {
    return view('home');
});

// Route admin - hanya untuk akun dengan auth + isadmin
Route::middleware(['auth', 'isadmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/permintaan-akun', [AdminRequestAkunController::class, 'index'])->name('request.index');
    Route::post('/permintaan-akun/{id}/approve', [AdminRequestAkunController::class, 'approve'])->name('request.approve');
    Route::post('/permintaan-akun/{id}/reject', [AdminRequestAkunController::class, 'reject'])->name('request.reject');
});

// Route staff - hanya untuk akun dengan auth + isstaff
Route::middleware(['auth', 'isstaff'])->prefix('staff')->name('staff.')->group(function () {
    Route::get('/dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
    Route::resource('kerusakan', KerusakanController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    Route::get('pengadaan', [PengadaanController::class, 'index'])->name('pengadaan.index');
    Route::get('/pengadaan/export', [PengadaanController::class, 'export'])->name('pengadaan.export');

    // Dummy sementara buat sidebar biar gak error
    Route::get('/notice', fn () => 'Halaman Notice Pajak')->name('notice.index');
});

// Form request akun (public)
Route::get('/request-akun', [PublicRequestAkunController::class, 'create'])->name('request-akun.form');
Route::post('/request-akun', [PublicRequestAkunController::class, 'store'])->name('request-akun.submit');

// Profile routes (untuk user yang login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return redirect()->route(
        auth()->user()->role === 'admin' ? 'admin.dashboard' : 'staff.dashboard'
    );
})->middleware('auth')->name('dashboard');


// Auth routes
require __DIR__.'/auth.php';