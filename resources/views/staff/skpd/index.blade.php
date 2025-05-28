@extends('layouts.staff')

{{-- Header --}}
@section('header')
<div class="relative bg-lightBlue-600 md:pt-32 pb-28 pt-12 z-0">
  <div class="w-full mx-auto px-4 md:px-16">
    <div class="flex flex-col md:flex-row md:justify-start md:items-center md:gap-16 gap-8">
      
      {{-- Kiri: Judul --}}
      <div class="flex-1 md:ml-6">
        <h2 class="text-white text-2xl md:text-3xl uppercase font-bold tracking-tight">
          Notice Pajak (SKPD)
        </h2>
        <p class="mt-2 text-sm md:text-base leading-relaxed text-white opacity-80">
          Inventaris ketersediaan <span class="font-semibold text-white"> Surat Ketetapan Pajak Daerah (SKPD) </span> untuk kendaraan bermotor
        </p>
      </div>

      {{-- Kanan: Card Mini + Tombol --}}
      <div class="flex flex-col gap-2 w-full max-w-xs mx-auto md:ml-[unset] md:mr-0">
        <div class="bg-white p-4 rounded shadow w-full md:w-52 flex items-center">
          <i class="fas fa-boxes text-lightBlue-500 text-xl"></i>
          <div class="pl-5">
            <p class="text-xs text-blueGray-500 font-semibold">Total Kotak</p>
            <p class="text-xl font-bold text-blueGray-700 mt-1">{{ $totalKotak }}</p>
          </div>
        </div>

        <div class="bg-white p-4 rounded shadow w-full md:w-52 flex items-center">
          <i class="fas fa-layer-group text-yellow-500 text-xl"></i>
          <div class="pl-5">
            <p class="text-xs text-blueGray-500 font-semibold">Total Sisa Set</p>
            <p class="text-xl font-bold text-blueGray-700 mt-1">{{ number_format($totalSisa) }}</p>
          </div>
        </div>
        <a href="{{ route('staff.skpd.create') }}"
          class="bg-emerald-500 hover:bg-lightBlue-600 text-white font-bold text-xs px-4 py-2 rounded shadow transition w-full md:w-52 text-center">
          <i class="fas fa-plus mr-1"></i> Kelola SKPD
        </a>
      </div>
    </div>
  </div>
</div>
@endsection

{{-- Konten --}}
@section('staff-content')
<div class="px-6 mt-10">

  {{-- Flash Message --}}
  @if (session('success'))
    <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-2 rounded mb-4 text-sm">
      {{ session('success') }}
    </div>
  @endif

  {{-- Card Table --}}
  <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
    {{-- Header + Button --}}
    <div class="rounded-t px-4 py-3 border-b border-blueGray-100 bg-blueGray-50 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
      <h3 class="font-semibold text-base text-blueGray-700">Tabel Ketersediaan Surat Ketepatan Pajak Daerah</h3>
    </div>

    {{-- Table Scrollable --}}
    <div class="block w-full overflow-x-auto max-h-[500px] overflow-y-auto">
      <table class="items-center w-full bg-transparent border-collapse">
        <thead class="sticky top-0 bg-blueGray-100 z-0">
          <tr class="text-blueGray-600 text-xs uppercase">
            <th class="px-6 py-3 text-left">Kode Kotak</th>
            <th class="px-6 py-3 text-left">Jenis</th>
            <th class="px-6 py-3 text-left">Jumlah Awal</th>
            <th class="px-6 py-3 text-left">Sisa Sekarang</th>
            <th class="px-6 py-3 text-left">Tanggal Masuk</th>
            </tr>
        </thead>
        <tbody>
          @forelse ($skpds as $skpd)
            <tr class="hover:bg-blueGray-50">
              <td class="px-6 py-4 text-sm text-blueGray-700 border-t border-blueGray-100">{{ $skpd->kode_kotak }}</td>
              <td class="px-6 py-4 text-sm capitalize border-t border-blueGray-100">{{ str_replace('_', ' ', $skpd->jenis_skpd) }}</td>
              <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ $skpd->jumlah_awal }}</td>
              <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ $skpd->jumlah_sisa }}</td>
              <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ \Carbon\Carbon::parse($skpd->tanggal_masuk)->format('d M Y') }}</td>
              
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center text-blueGray-400 text-sm py-4">Belum ada kotak notice.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

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
