@extends('layouts.staff')

{{-- Header --}}
@section('header')
<div class="relative bg-lightBlue-600 md:pt-32 pb-28 pt-12 z-0">

  <div class="w-full mx-auto flex flex-col md:flex-row justify-between items-start md:items-center md:px-16 px-4 gap-6">
    <div>
      <h2 class="text-white text-2xl md:text-3xl uppercase font-bold tracking-tight">
        Laporan Harian SKPD
      </h2>
      <p class="mt-2 text-sm md:text-base leading-relaxed text-white opacity-80">
        Rekap pemakaian surat ketetapan pajak (SKPD) harian berdasarkan bulan dan tahun.
      </p>
    </div>

    {{-- Filter Form --}}
    <form method="GET" class="flex flex-wrap gap-2 items-end bg-transparent ml-6 md:ml-12">
      <div>
        <label class="block text-xs font-medium text-white mb-1">Bulan</label>
        <select name="bulan"
          class="appearance-none px-4 py-2 pr-10 border border-blueGray-200 text-sm rounded focus:ring-2 focus:ring-lightBlue-500 focus:outline-none">
          @php
            $bulanList = [
              '01' => 'Januari', '02' => 'Februari', '03' => 'Maret', '04' => 'April',
              '05' => 'Mei', '06' => 'Juni', '07' => 'Juli', '08' => 'Agustus',
              '09' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
            ];
          @endphp

          @foreach ($bulanList as $kode => $nama)
            <option value="{{ $kode }}" {{ $bulan == $kode ? 'selected' : '' }}>
              {{ $nama }}
            </option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block text-xs font-medium text-white mb-1">Tahun</label>
        <select name="tahun"
          class="appearance-none px-4 py-2 pr-10 border border-blueGray-200 text-sm rounded focus:ring-2 focus:ring-lightBlue-500 focus:outline-none">
          @for ($y = date('Y'); $y >= 2022; $y--)
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

        <a href="{{ route('staff.laporan-skpd.export', ['bulan' => request('bulan'), 'tahun' => request('tahun')]) }}"
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
<div class="px-6 relative z-0 transform translate-y-[3.2rem] pb-28">

  {{-- Table Card --}}
  <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
    <div class="rounded-t px-4 py-3 border-b border-blueGray-100 bg-blueGray-50 flex justify-between items-center">
      <h3 class="font-semibold text-base text-blueGray-700"> Tabel Laporan Harian Periode {{ $bulanList[$bulan] ?? '-' }} {{ $tahun }} </h3>
      <a href="{{ route('staff.laporan-skpd.create') }}"
        class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs px-4 py-2 rounded shadow transition">
        + Tambah Laporan
      </a>
    </div>

    {{-- Table --}}
    <div class="block w-full overflow-x-auto max-h-[500px] overflow-y-auto">
      <table class="items-center w-full bg-transparent border-collapse">
        <thead class="sticky top-0 bg-blueGray-100 z-0 text-xs uppercase text-blueGray-500">
          <tr>
            <th class="px-6 py-3 text-left">Tanggal</th>
            <th class="px-6 py-3 text-left">Kode Kotak</th>
            <th class="px-6 py-3 text-left">Lokasi</th>
            <th class="px-6 py-3 text-left">Pemakaian</th>
            <th class="px-6 py-3 text-left">Rusak</th>
            <th class="px-6 py-3 text-left">Sisa Harian</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($laporans as $laporan)
          <tr class="hover:bg-blueGray-50 text-sm border-t border-blueGray-100 text-blueGray-700">
            <td class="px-6 py-3">{{ \Carbon\Carbon::parse($laporan->tanggal)->translatedFormat('d F Y') }}</td>
            <td class="px-6 py-3">{{ $laporan->skpd->kode_kotak }}</td>
            <td class="px-6 py-3 capitalize">{{ str_replace('_', ' ', $laporan->lokasi_penggunaan) }}</td>
            <td class="px-6 py-3">{{ number_format($laporan->penggunaan_lembar) }} lembar</td>
            <td class="px-6 py-3">{{ number_format($laporan->jumlah_rusak) }} lembar</td>
            <td class="px-6 py-3">{{ $laporan->jumlah_sisa_harian }} lembar</td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center text-blueGray-400 py-4">Belum ada laporan harian.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

{{-- SweetAlert --}}
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  @if (session('success'))
    Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: '{{ session('success') }}',
      timer: 3000,
      showConfirmButton: false
    });
  @endif
</script>
@endsection
