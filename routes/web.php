<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestAkunController as PublicRequestAkunController;
use App\Http\Controllers\Admin\RequestAkunController as AdminRequestAkunController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Staff\DashboardController as StaffDashboardController;
use App\Http\Controllers\Staff\BarangController;
use App\Http\Controllers\Staff\AsetController;
use App\Http\Controllers\Staff\KerusakanController;
use App\Http\Controllers\Staff\PengadaanController;
use App\Http\Controllers\Staff\PengeluaranController;
use App\Http\Controllers\Staff\ReportController;
use App\Http\Controllers\Staff\SkpdController;
use App\Http\Controllers\Staff\LaporanSkpdController;


Route::get('/', function () {
    return view('home');
});

// hanya untuk akun dengan auth isadmin
Route::middleware(['auth', 'isadmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/permintaan-akun', [AdminRequestAkunController::class, 'index'])->name('request.index');
    Route::post('/permintaan-akun/{id}/approve', [AdminRequestAkunController::class, 'approve'])->name('request.approve');
    Route::post('/permintaan-akun/{id}/reject', [AdminRequestAkunController::class, 'reject'])->name('request.reject');
});

// hanya untuk akun dengan auth isstaff
Route::middleware(['auth', 'isstaff'])->prefix('staff')->name('staff.')->group(function () {
    Route::get('/dashboard', [StaffDashboardController::class, 'index'])->name('dashboard');
    //barang habis pakai
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
    
    Route::get('/pengadaan', [PengadaanController::class, 'index'])->name('pengadaan.index');
    Route::get('/pengadaan/create', [PengadaanController::class, 'create'])->name('pengadaan.create');
    Route::post('/pengadaan', [PengadaanController::class, 'store'])->name('pengadaan.store');
    Route::get('/pengadaan/{id}/edit', [PengadaanController::class, 'edit'])->name('pengadaan.edit');
    Route::put('/pengadaan/{id}', [PengadaanController::class, 'update'])->name('pengadaan.update');
    Route::delete('/pengadaan/{id}', [PengadaanController::class, 'destroy'])->name('pengadaan.destroy');

    Route::get('/pengeluaran/create', [PengeluaranController::class, 'create'])->name('pengeluaran.create');
    Route::post('/pengeluaran', [PengeluaranController::class, 'store'])->name('pengeluaran.store');
    Route::get('/pengeluaran/{id}/edit', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
    Route::put('/pengeluaran/{id}', [PengeluaranController::class, 'update'])->name('pengeluaran.update');
    Route::delete('/pengeluaran/{id}', [PengeluaranController::class, 'destroy'])->name('pengeluaran.destroy');

    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report/export', [ReportController::class, 'export'])->name('report.export');

    //aset tetap
    Route::get('/aset', [AsetController::class, 'index'])->name('aset.index');
    Route::get('/aset/create', [AsetController::class, 'create'])->name('aset.create');
    Route::post('/aset', [AsetController::class, 'store'])->name('aset.store');
    Route::get('/aset/{id}/edit', [AsetController::class, 'edit'])->name('aset.edit');
    Route::put('/aset/{id}', [AsetController::class, 'update'])->name('aset.update');
    Route::delete('/aset/{id}', [AsetController::class, 'destroy'])->name('aset.destroy');

    Route::resource('kerusakan', KerusakanController::class)->only(['index', 'create', 'store', 'edit', 'update']);
    //notice pajak
    Route::resource('skpd', SkpdController::class)->only(['index', 'create', 'store', 'destroy']);
    Route::resource('laporan-skpd', LaporanSkpdController::class)->only(['index', 'create', 'store']);
    Route::get('/laporan-skpd/export', [LaporanSkpdController::class, 'export'])->name('laporan-skpd.export');
});


Route::get('/request-akun', [PublicRequestAkunController::class, 'create'])->name('request-akun.form');
Route::post('/request-akun', [PublicRequestAkunController::class, 'store'])->name('request-akun.submit');

// Profile (untuk user yang login)
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



require __DIR__.'/auth.php';