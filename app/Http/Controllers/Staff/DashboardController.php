<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Dummy data dulu, nanti diganti pakai model
        return view('staff.dashboard', [
            'totalBarangHabisPakai' => 1200,
            'totalBarangTetap' => 150,
            'totalBarangRusak' => 12,
            'totalPengadaanBulanIni' => 3500000,
        ]);
    }
}
