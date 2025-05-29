<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $query = Barang::query();

        $subkategoris = Barang::select('subkategori')->distinct()->pluck('subkategori');

        if ($request->has('search') || $request->has('subkategori') || $request->has('jenis')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_barang', 'like', $search . '%')
                ->orWhere('nama_barang', 'like', '% ' . $search . '%')
                ->orWhere('nama_barang', 'like', '%' . $search . '%');
            });

            if ($request->subkategori) {
                $query->where('subkategori', $request->subkategori);
            }

            if ($request->jenis) {
                $query->where('jenis_barang', $request->jenis);
            }
        }

        $barangs = $query->get();

        if ($request->ajax()) {
            return view('staff.barang._table', compact('barangs'))->render();
        }

        return view('staff.barang.index', compact('barangs', 'subkategoris'));
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
        
        if ($request->jenis_barang === 'habis_pakai') {
            $rules['harga_satuan'] = 'required|integer|min:0';
            $rules['tanggal_masuk'] = 'required|date';
        } elseif ($request->jenis_barang === 'tetap') {
            $rules['kode_barang'] = 'required|string|max:100';
            $rules['tahun_masuk'] = 'required|digits:4';
            $rules['tanggal_masuk'] = 'nullable|date';
            $rules['harga_satuan'] = 'nullable|integer|min:0';
        }

        $request->validate($rules);

        $data = $request->all();
        $data['harga_satuan'] = $request->filled('harga_satuan') ? $request->harga_satuan : null;
        $data['tanggal_masuk'] = $request->filled('tanggal_masuk') ? $request->tanggal_masuk : null;

        if ($request->jenis_barang === 'habis_pakai') {
            $data['tahun_masuk'] = null;
            $data['kode_barang'] = null;
        } elseif ($request->jenis_barang === 'tetap') {
            $data['tahun_masuk'] = $request->tahun_masuk;
            $data['kode_barang'] = $request->kode_barang;
            // harga_satuan biarin aja otomatis
        }

        Barang::create($data);

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

        if ($request->jenis_barang === 'habis_pakai') {
            $rules['harga_satuan'] = 'required|integer|min:0';
            $rules['tanggal_masuk'] = 'required|date';
        } elseif ($request->jenis_barang === 'tetap') {
            $rules['kode_barang'] = 'required|string|max:100';
            $rules['tahun_masuk'] = 'required|digits:4';
            $rules['tanggal_masuk'] = 'nullable|date';
            $rules['harga_satuan'] = 'nullable|integer|min:0';
        }

        $request->validate($rules);

        $data = $request->all();
        $data['harga_satuan'] = $request->filled('harga_satuan') ? $request->harga_satuan : null;
        $data['tanggal_masuk'] = $request->filled('tanggal_masuk') ? $request->tanggal_masuk : null;

        if ($request->jenis_barang === 'habis_pakai') {
            $data['tahun_masuk'] = null;
            $data['kode_barang'] = null;
            $data['tanggal_masuk'] = $request->tanggal_masuk;
        } elseif ($request->jenis_barang === 'tetap') {
            $data['tanggal_masuk'] = $request->tanggal_masuk;
            $data['tahun_masuk'] = $request->tahun_masuk;
            $data['kode_barang'] = $request->kode_barang;
            // harga_satuan biarin aja otomatis
        }

        $barang = Barang::findOrFail($id);
        $barang->update($data);

        return redirect()->route('staff.barang.index')->with('success', 'Barang berhasil diupdate!');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('staff.barang.index')->with('success', 'Barang berhasil dihapus!');
    }

}
