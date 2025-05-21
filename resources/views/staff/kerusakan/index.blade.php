@extends('layouts.staff')

{{-- Header --}}
@section('header')
<div class="relative bg-lightBlue-600 md:pt-32 pb-44 pt-12">
  <div class="w-full mx-auto items-center flex justify-between md:flex-nowrap flex-wrap md:px-16 px-4">
    <div>
      <h2 class="text-white text-2xl md:text-3xl uppercase font-bold tracking-tight">
        Kerusakan Barang
      </h2>
      <p class="mt-2 md:mt-3 text-sm md:text-base leading-relaxed text-white opacity-80">
        Data laporan kerusakan dan status barang tetap.
      </p>
    </div>
  </div>
</div>
@endsection

{{-- Konten --}}
@section('staff-content')
<div class="px-6 -mt-32">

  {{-- Flash Message --}}
  @if (session('success'))
    <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-2 rounded mb-4 text-sm">
      {{ session('success') }}
    </div>
  @endif

  {{-- Tabel --}}
  <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
    <div class="rounded-t mb-0 px-4 py-3 border-0 bg-blueGray-50">
      <div class="flex flex-wrap items-center justify-between">
        <h3 class="font-semibold text-base text-blueGray-700">Tabel Kerusakan</h3>

        <div class="flex flex-wrap items-center gap-2 mt-4 md:mt-0">

          {{-- Tombol Tambah --}}
          <a href="{{ route('staff.kerusakan.create') }}"
            class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs px-4 py-2 rounded shadow transition">
            + Tambah Kerusakan
          </a>

          {{-- Filter --}}
          <form method="GET" class="flex items-center gap-2">
            <label for="filter" class="text-sm text-blueGray-600 font-medium">Filter:</label>
            <select name="status" id="filter" onchange="this.form.submit()"
              class="pl-4 pr-8 py-2 text-sm border border-blueGray-200 rounded bg-white text-blueGray-600 shadow-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500 focus:border-lightBlue-500 transition">
              <option value="">Semua</option>
              <option value="rusak" {{ request('status') === 'rusak' ? 'selected' : '' }}>Rusak</option>
              <option value="perbaikan" {{ request('status') === 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
              <option value="baik" {{ request('status') === 'baik' ? 'selected' : '' }}>Riwayat</option>
            </select>
          </form>
          
        </div>
      </div>
    </div>

    <div class="block w-full overflow-x-auto rounded-t border-b border-blueGray-100">
      <table class="items-center w-full bg-transparent border-collapse">
        <thead>
          <tr>
            <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 bg-blueGray-100 uppercase border-b text-left">Barang</th>
            <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 bg-blueGray-100 uppercase border-b text-left">Kondisi</th>
            <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 bg-blueGray-100 uppercase border-b text-left">Deskripsi</th>
            <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 bg-blueGray-100 uppercase border-b text-left">Biaya</th>
            <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 bg-blueGray-100 uppercase border-b text-left">Catatan</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($kerusakan as $item)
          <tr class="hover:bg-blueGray-50">
            <td class="px-6 py-4 text-sm border-t text-blueGray-700">
              {{ $item->barang->nama_barang ?? '-' }}
            </td>
            <td class="px-6 py-4 text-sm border-t capitalize">
              <span class="px-2 py-1 rounded-full text-white text-xs font-bold
                {{ $item->kondisi === 'baik' ? 'bg-green-500' : ($item->kondisi === 'perbaikan' ? 'bg-yellow-500' : 'bg-red-500') }}">
                {{ $item->kondisi }}
              </span>
            </td>
            <td class="px-6 py-4 text-sm border-t">{{ $item->deskripsi }}</td>
            <td class="px-6 py-4 text-sm border-t">
              @if($item->biaya_perbaikan)
                Rp {{ number_format($item->biaya_perbaikan, 0, ',', '.') }}
              @else
                -
              @endif
            </td>
            <td class="px-6 py-4 text-sm border-t">{{ $item->catatan_perbaikan ?? '-' }}</td>
            <td class="px-6 py-4 text-sm border-t">
              <div class="flex items-center space-x-2">

                {{-- Tombol Edit --}}
                <a href="{{ route('staff.kerusakan.edit', $item->id) }}"
                  class="text-blue-500 hover:text-blue-700 text-sm" title="Edit">
                  <i class="fas fa-edit"></i>
                </a>

              </div>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="px-6 py-4 text-center text-blueGray-400 text-sm">
              Belum ada data kerusakan.
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
