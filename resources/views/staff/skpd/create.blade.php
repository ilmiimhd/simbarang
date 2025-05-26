@extends('layouts.staff')

{{-- Header --}}
@section('header')
<div class="relative bg-lightBlue-600 md:pt-32 pb-44 pt-12">
  <div class="w-full mx-auto items-center flex justify-between md:flex-nowrap flex-wrap md:px-16 px-4">
    <div>
      <h2 class="text-white text-2xl md:text-3xl uppercase font-bold tracking-tight">
        Tambah Kotak SKPD
      </h2>
      <p class="mt-2 md:mt-3 text-sm md:text-base leading-relaxed text-white opacity-80">
        Silakan isi data inventaris kotak Surat Ketetapan Pajak Daerah (SKPD) untuk kendaraan maupun alat berat.
      </p>
    </div>
  </div>
</div>
@endsection

{{-- Konten --}}
@section('staff-content')
<div class="px-6 -mt-32">

  {{-- Flash Error --}}
  @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-sm">
      <ul class="list-disc pl-4">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Card Form --}}
  <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
    <div class="rounded-t px-6 py-3 border-0 bg-blueGray-50">
      <h3 class="font-semibold text-base text-blueGray-700">Form Tambah Kotak SKPD</h3>
    </div>

    <div class="px-6 py-6">
      <form method="POST" action="{{ route('staff.skpd.store') }}">
        @csrf

        {{-- Kode Kotak --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Kode Kotak</label>
          <input type="text" name="kode_kotak" value="{{ old('kode_kotak') }}" required
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500">
        </div>

        {{-- Jenis SKPD --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Jenis SKPD</label>
          <select name="jenis_skpd" required
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500">
            <option value="">-- Pilih Jenis --</option>
            <option value="kendaraan" {{ old('jenis_skpd') == 'kendaraan' ? 'selected' : '' }}>Kendaraan</option>
            <option value="alat_berat" {{ old('jenis_skpd') == 'alat_berat' ? 'selected' : '' }}>Alat Berat</option>
          </select>
        </div>

        {{-- Jumlah Set Awal --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Jumlah Set Awal</label>
          <input type="number" name="jumlah_set_awal" value="{{ old('jumlah_set_awal') }}" min="1" required
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500">
        </div>

        {{-- Tanggal Masuk --}}
        <div class="mb-6">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Tanggal Masuk</label>
          <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" required
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500">
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end gap-2">
          <a href="{{ route('staff.skpd.index') }}"
            class="bg-blueGray-100 hover:bg-blueGray-200 text-blueGray-600 text-xs font-semibold px-4 py-2 rounded shadow transition">
            Batal
          </a>
          <button type="submit"
            class="bg-lightBlue-500 hover:bg-lightBlue-600 text-white font-bold text-xs px-6 py-2 rounded shadow transition">
            Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

