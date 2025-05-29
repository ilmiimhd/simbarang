<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\KerusakanBarang;
use App\Models\Skpd;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Barang::count();

        $totalBarangRusak = KerusakanBarang::where('kondisi', 'rusak')->count();

        $totalPembelian = Barang::whereNotNull('harga_satuan')
            ->whereNotNull('tanggal_masuk')
            ->whereMonth('tanggal_masuk', now()->month)
            ->whereYear('tanggal_masuk', now()->year)
            ->sum(DB::raw('jumlah * harga_satuan'));

        $totalPerbaikan = KerusakanBarang::where('kondisi', 'baik')
            ->whereMonth('updated_at', now()->month)
            ->whereYear('updated_at', now()->year)
            ->sum('biaya_perbaikan');

        $totalPengadaanBulanIni = $totalPembelian + $totalPerbaikan;

        $totalNoticePajak = Skpd::sum('jumlah_sisa');

        return view('staff.dashboard', compact(
            'totalBarang',
            'totalBarangRusak',
            'totalPengadaanBulanIni',
            'totalNoticePajak'
        ));
    }
}
