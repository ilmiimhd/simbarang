@extends('layouts.staff')

{{-- Header --}}
@section('header')
<div class="relative bg-lightBlue-600 md:pt-32 pb-44 pt-12">
  <div class="w-full mx-auto flex flex-col md:flex-row justify-between items-start md:items-center md:px-16 px-4 gap-6">
    <div>
      <h2 class="text-white text-2xl md:text-3xl uppercase font-bold tracking-tight">
        Laporan Pengadaan
      </h2>
      <p class="mt-2 text-sm md:text-base leading-relaxed text-white opacity-80">
        Rekap pengeluaran pembelian barang & perbaikan aset berdasarkan bulan dan tahun.
      </p>
    </div>

    {{-- Filter Form --}}
    <form method="GET" class="flex flex-wrap gap-2 items-end bg-transparent">
      <div>
        <label class="block text-xs font-medium text-white mb-1">Bulan</label>
        <select name="bulan"
          class="px-4 py-2 border border-blueGray-200 text-sm rounded focus:ring-2 focus:ring-lightBlue-500 focus:outline-none">
          @for ($m = 1; $m <= 12; $m++)
            <option value="{{ str_pad($m, 2, '0', STR_PAD_LEFT) }}" {{ $bulan == str_pad($m, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
              {{ DateTime::createFromFormat('!m', $m)->format('F') }}
            </option>
          @endfor
        </select>
      </div>

      <div>
        <label class="block text-xs font-medium text-white mb-1">Tahun</label>
        <select name="tahun"
          class="px-4 py-2 border border-blueGray-200 text-sm rounded focus:ring-2 focus:ring-lightBlue-500 focus:outline-none">
          @for ($y = date('Y'); $y >= 2020; $y--)
            <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
          @endfor
        </select>
      </div>

      {{-- Tombol --}}
      <div class="flex gap-2 pt-[22px]">
        <button type="submit"
          class="bg-white text-lightBlue-500 font-bold text-xs px-4 py-2 rounded shadow hover:bg-lightBlue-100 transition">
          Tampilkan
        </button>

        <a href="{{ route('staff.pengadaan.export', ['bulan' => $bulan, 'tahun' => $tahun]) }}"
          class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs px-4 py-2 rounded shadow transition">
          Export ke Excel
        </a>
      </div>
    </form>
  </div>
</div>
@endsection

{{-- Konten --}}
@section('staff-content')
<div class="px-6 md:px-10 -mt-32 md:-mt-40">

    {{-- Ringkasan Total --}}
    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-white p-4 rounded shadow">
        <h4 class="text-sm font-semibold text-blueGray-600">Total Pembelian Barang</h4>
        <p class="text-lg font-bold text-emerald-600 mt-2">Rp {{ number_format($totalPembelian, 0, ',', '.') }}</p>
      </div>
      <div class="bg-white p-4 rounded shadow">
        <h4 class="text-sm font-semibold text-blueGray-600">Total Biaya Perbaikan</h4>
        <p class="text-lg font-bold text-yellow-500 mt-2">Rp {{ number_format($totalPerbaikan, 0, ',', '.') }}</p>
      </div>
      <div class="bg-white p-4 rounded shadow">
        <h4 class="text-sm font-semibold text-blueGray-600">Total Keseluruhan</h4>
        <p class="text-lg font-bold text-lightBlue-500 mt-2">Rp {{ number_format($totalKeseluruhan, 0, ',', '.') }}</p>
      </div>
    </div>
  </div>

  {{-- Tabel Pembelian --}}
  <div class="mb-6">
    <h3 class="font-semibold text-blueGray-700 text-base mb-2">Barang yang Dibeli</h3>
    <div class="bg-white rounded shadow overflow-x-auto">
      <table class="w-full table-auto border-collapse">
        <thead>
          <tr class="bg-blueGray-100 text-blueGray-600 text-xs uppercase">
            <th class="px-6 py-3 text-left">Nama</th>
            <th class="px-6 py-3 text-left">Jenis</th>
            <th class="px-6 py-3 text-left">Jumlah</th>
            <th class="px-6 py-3 text-left">Harga Satuan</th>
            <th class="px-6 py-3 text-left">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($pembelian as $barang)
            <tr class="hover:bg-blueGray-50">
              <td class="px-6 py-4 text-sm">{{ $barang->nama_barang }}</td>
              <td class="px-6 py-4 text-sm capitalize">{{ str_replace('_', ' ', $barang->jenis_barang) }}</td>
              <td class="px-6 py-4 text-sm">{{ $barang->jumlah }}</td>
              <td class="px-6 py-4 text-sm">Rp {{ number_format($barang->harga_satuan, 0, ',', '.') }}</td>
              <td class="px-6 py-4 text-sm font-semibold text-blueGray-700">
                Rp {{ number_format($barang->jumlah * $barang->harga_satuan, 0, ',', '.') }}
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center text-blueGray-400 text-sm py-4">Tidak ada data pembelian.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  {{-- Tabel Perbaikan --}}
  <div>
    <h3 class="font-semibold text-blueGray-700 text-base mb-2">Barang yang Diperbaiki</h3>
    <div class="bg-white rounded shadow overflow-x-auto">
      <table class="w-full table-auto border-collapse">
        <thead>
          <tr class="bg-blueGray-100 text-blueGray-600 text-xs uppercase">
            <th class="px-6 py-3 text-left">Barang</th>
            <th class="px-6 py-3 text-left">Deskripsi</th>
            <th class="px-6 py-3 text-left">Biaya Perbaikan</th>
            <th class="px-6 py-3 text-left">Catatan</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($perbaikan as $rusak)
            <tr class="hover:bg-blueGray-50">
              <td class="px-6 py-4 text-sm">{{ $rusak->barang->nama_barang ?? '-' }}</td>
              <td class="px-6 py-4 text-sm">{{ $rusak->deskripsi }}</td>
              <td class="px-6 py-4 text-sm text-yellow-600 font-semibold">
                Rp {{ number_format($rusak->biaya_perbaikan, 0, ',', '.') }}
              </td>
              <td class="px-6 py-4 text-sm">{{ $rusak->catatan_perbaikan ?? '-' }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="text-center text-blueGray-400 text-sm py-4">Tidak ada data perbaikan.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</div>
@endsection
