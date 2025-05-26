<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Skpd;
use Illuminate\Http\Request;

class SkpdController extends Controller
{
    public function index()
    {
        $skpds = Skpd::orderBy('tanggal_masuk', 'asc')->get();
        $totalKotak = $skpds->count();
        $totalSisa = $skpds->sum('jumlah_sisa');

        return view('staff.skpd.index', compact('skpds', 'totalKotak', 'totalSisa'));
    }

    public function create()
    {
        return view('staff.skpd.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_kotak' => 'required|unique:skpds,kode_kotak',
            'jenis_skpd' => 'required|in:kendaraan,alat_berat',
            'jumlah_set_awal' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
        ]);

        Skpd::create([
            'kode_kotak' => $request->kode_kotak,
            'jenis_skpd' => $request->jenis_skpd,
            'jumlah_set_awal' => $request->jumlah_set_awal,
            'jumlah_sisa' => $request->jumlah_set_awal, // default: sama dengan awal
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        return redirect()->route('staff.skpd.index')->with('success', 'Kotak SKPD berhasil ditambahkan.');
    }

    public function destroy(Skpd $skpd)
    {
        $skpd->delete();
        return redirect()->route('staff.skpd.index')->with('success', 'Kotak SKPD berhasil dihapus.');
    }
}