<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('staff.barang.index', compact('barangs'));
    }

    public function create()
    {
        // Nanti bisa tambah daftar subkategori kalau pakai dropdown
        return view('staff.barang.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'nama_barang' => 'required|string|max:255',
            'jenis_barang' => 'required|in:habis_pakai,tetap',
            'subkategori' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'satuan' => 'required|string',
        ];

        // Tambahan validasi dinamis
        if ($request->jenis_barang === 'habis_pakai') {
            $rules['harga_satuan'] = 'required|integer|min:0';
        } elseif ($request->jenis_barang === 'tetap') {
            $rules['kode_barang'] = 'required|string|max:100';
        }

        $request->validate($rules);

        Barang::create($request->all());

        return redirect()->route('staff.barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('staff.barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nama_barang' => 'required|string|max:255',
            'jenis_barang' => 'required|in:habis_pakai,tetap',
            'subkategori' => 'required|string',
            'jumlah' => 'required|integer|min:1',
            'satuan' => 'required|string',
        ];

        // Tambahan validasi berdasarkan jenis_barang
        if ($request->jenis_barang === 'habis_pakai') {
            $rules['harga_satuan'] = 'required|integer|min:0';
        } elseif ($request->jenis_barang === 'tetap') {
            $rules['kode_barang'] = 'required|string|max:100';
        }

        $request->validate($rules);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('staff.barang.index')->with('success', 'Barang berhasil diupdate!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('staff.barang.index')->with('success', 'Barang berhasil dihapus!');
    }

}
