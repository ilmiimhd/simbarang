@extends('layouts.staff')

@section('header')
<div class="relative bg-lightBlue-600 md:pt-32 pb-32 pt-12">
  <div class="px-4 md:px-10 mx-auto w-full">
    <div class="flex flex-wrap">

      {{-- Card 1: Barang Habis Pakai --}}
      <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
        <x-cards.card-stats
          stat-subtitle="Barang Habis Pakai"
          stat-title="{{ $totalBarangHabisPakai }}"
          stat-icon-name="fas fa-box"
          stat-icon-color="bg-pink-500"
          stat-arrow="up"
          stat-percent-color="text-pink-500"
          stat-descripiron="Stok tercatat"
        />
      </div>

      {{-- Card 2: Barang Tetap --}}
      <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
        <x-cards.card-stats
          stat-subtitle="Barang Tetap"
          stat-title="{{ $totalBarangTetap }}"
          stat-icon-name="fas fa-chair"
          stat-icon-color="bg-blue-500"
          stat-arrow="up"
          stat-percent-color="text-blue-500"
          stat-descripiron="Aset terdata"
        />
      </div>

      {{-- Card 3: Barang Rusak --}}
      <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
        <x-cards.card-stats
          stat-subtitle="Barang Rusak"
          stat-title="{{ $totalBarangRusak }}"
          stat-icon-name="fas fa-tools"
          stat-icon-color="bg-red-500"
          stat-arrow="down"
          stat-percent-color="text-red-500"
          stat-descripiron="Perlu perbaikan"
        />
      </div>

      {{-- Card 4: Pengadaan Bulan Ini --}}
      <div class="w-full lg:w-6/12 xl:w-3/12 px-4">
        <x-cards.card-stats
          stat-subtitle="Pengadaan Bulan Ini"
          stat-title="Rp {{ number_format($totalPengadaanBulanIni, 0, ',', '.') }}"
          stat-icon-name="fas fa-money-bill-wave"
          stat-icon-color="bg-emerald-500"
          stat-arrow="up"
          stat-percent-color="text-emerald-500"
          stat-descripiron="Total pengeluaran"
        />
      </div>

    </div>
  </div>
</div>
@endsection

@section('staff-content')
<div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
  <div class="rounded-t mb-0 px-4 py-3 border-0 bg-blueGray-50">
    <div class="flex items-center justify-between">
      <h3 class="font-semibold text-base text-blueGray-700">
        Selamat datang di dashboard SIMBARANG 👋
      </h3>
      <span class="text-sm text-blueGray-400">
        Silakan gunakan menu di sidebar untuk mengelola data.
      </span>
    </div>
  </div>
</div>
@endsection