<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\KerusakanBarang;
use App\Models\Barang;
use Illuminate\Http\Request;

class KerusakanController extends Controller
{
    public function index(Request $request)
    {
        $query = \App\Models\KerusakanBarang::with('barang')->latest();

        if ($request->status) {
            $query->where('kondisi', $request->status);
        }

        $kerusakan = $query->get();
        $status = $request->status;

        // 🧠 Kalau request AJAX (dari filter live), balikin partial table aja
        if ($request->ajax()) {
            return view('staff.kerusakan._table', compact('kerusakan'))->render();
        }

        // 🧠 Kalau bukan AJAX, balikin halaman full
        return view('staff.kerusakan.index', compact('kerusakan', 'status'));
    }

    public function create()
    {
        // Ambil semua barang_id yang kondisi terakhirnya masih rusak atau perbaikan
        $usedIds = \App\Models\KerusakanBarang::whereIn('kondisi', ['rusak', 'perbaikan'])
            ->pluck('barang_id')
            ->toArray();

        // Ambil barang tetap yang belum dalam status rusak/perbaikan
        $barangs = \App\Models\Barang::where('jenis_barang', 'tetap')
            ->whereNotIn('id', $usedIds)
            ->get();

        return view('staff.kerusakan.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'deskripsi' => 'required|string',
            'foto_rusak' => 'nullable|image|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('foto_rusak')) {
            $path = $request->file('foto_rusak')->store('kerusakan', 'public');
        }

        \App\Models\KerusakanBarang::create([
            'barang_id' => $request->barang_id,
            'jenis_barang' => 'tetap', // default karena hanya barang tetap
            'kondisi' => 'rusak',
            'deskripsi' => $request->deskripsi,
            'foto_rusak' => $path,
        ]);

        return redirect()->route('staff.kerusakan.index')->with('success', 'Data kerusakan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kerusakan = \App\Models\KerusakanBarang::with('barang')->findOrFail($id);
        return view('staff.kerusakan.edit', compact('kerusakan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kondisi' => 'required|in:baik,rusak,perbaikan',
            'deskripsi' => 'required|string',
            'biaya_perbaikan' => 'nullable|integer|min:0',
            'catatan_perbaikan' => 'nullable|string|max:255',
        ]);

        $kerusakan = \App\Models\KerusakanBarang::findOrFail($id);

        $kerusakan->update([
            'kondisi' => $request->kondisi,
            'deskripsi' => $request->deskripsi,
            'biaya_perbaikan' => $request->kondisi === 'baik' ? $request->biaya_perbaikan : null,
            'catatan_perbaikan' => $request->kondisi === 'baik' ? $request->catatan_perbaikan : null,
        ]);

        return redirect()->route('staff.kerusakan.index')->with('success', 'Data kerusakan berhasil diperbarui!');
    }

}
