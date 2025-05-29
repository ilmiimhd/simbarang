<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\KerusakanBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengadaanExport;
use Carbon\Carbon;

class PengadaanController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan ?? date('m');
        $tahun = $request->tahun ?? date('Y');

        // ✅ Pembelian pakai tanggal_masuk
        $pembelian = Barang::whereNotNull('harga_satuan')
            ->whereMonth('tanggal_masuk', $bulan)
            ->whereYear('tanggal_masuk', $tahun)
            ->get();

        $totalPembelian = $pembelian->sum(fn($b) => $b->jumlah * $b->harga_satuan);

        // Perbaikan tetap pakai updated_at
        $perbaikan = KerusakanBarang::where('kondisi', 'baik')
            ->whereNotNull('biaya_perbaikan')
            ->whereMonth('updated_at', $bulan)
            ->whereYear('updated_at', $tahun)
            ->get();

        $totalPerbaikan = $perbaikan->sum('biaya_perbaikan');

        $totalKeseluruhan = $totalPembelian + $totalPerbaikan;

        return view('staff.pengadaan.index', compact(
            'pembelian', 'perbaikan', 'totalPembelian', 'totalPerbaikan', 'totalKeseluruhan', 'bulan', 'tahun'
        ));
    }

    public function export(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        Carbon::setLocale('id');
        $namaBulan = Carbon::createFromDate(null, $bulan, null)->translatedFormat('F');

        // ✅ Pembelian pakai tanggal_masuk
        $pembelian = Barang::whereNotNull('harga_satuan')
            ->whereMonth('tanggal_masuk', $bulan)
            ->whereYear('tanggal_masuk', $tahun)
            ->get();

        $totalPembelian = $pembelian->sum(fn($item) => $item->jumlah * $item->harga_satuan);

        // Perbaikan pakai updated_at
        $perbaikan = KerusakanBarang::where('kondisi', 'baik')
            ->whereMonth('updated_at', $bulan)
            ->whereYear('updated_at', $tahun)
            ->get();

        $totalPerbaikan = $perbaikan->sum('biaya_perbaikan');
        $totalKeseluruhan = $totalPembelian + $totalPerbaikan;

        return Excel::download(
            new PengadaanExport($pembelian, $perbaikan, $totalPembelian, $totalPerbaikan, $totalKeseluruhan, $bulan, $tahun, $namaBulan),
            'Laporan_Pengadaan_' . now()->format('Ym') . '.xlsx'
        );
    }
}