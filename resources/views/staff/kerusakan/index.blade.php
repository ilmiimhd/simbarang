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
  <div x-data="liveKerusakan()" x-init="fetchTable()" class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
    <div class="rounded-t mb-0 px-4 py-3 border-0 bg-blueGray-50">
      <div class="flex flex-wrap items-center justify-between">
        <h3 class="font-semibold text-base text-blueGray-700">Tabel Kerusakan</h3>

        <div class="flex flex-wrap items-center gap-2 mt-4 md:mt-0">

          {{-- Filter --}}
          <div class="flex items-center gap-2">
            <label for="filter" class="text-xs text-blueGray-600 font-medium">Filter:</label>
            <select x-model="status"
              @change="fetchTable()"
              class="pl-4 pr-8 py-2 text-xs border border-blueGray-200 rounded bg-white text-blueGray-600 shadow-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500 focus:border-lightBlue-500 transition">
              <option value="">Semua</option>
              <option value="rusak">Rusak</option>
              <option value="perbaikan">Perbaikan</option>
              <option value="baik">Riwayat</option>
            </select>
          </div>

          {{-- Tombol Tambah --}}
          <a href="{{ route('staff.kerusakan.create') }}"
            class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs px-4 py-2 rounded shadow transition">
            + Tambah Kerusakan
          </a>

        </div>
      </div>
    </div>
    <div class="block w-full overflow-x-auto max-h-[500px] overflow-y-auto">
      <div id="kerusakan-table">
        @include('staff.kerusakan._table')
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  function liveKerusakan() {
    return {
      status: '{{ request('status') }}',
      fetchTable() {
        const url = new URL("{{ route('staff.kerusakan.index') }}");
        if (this.status) {
          url.searchParams.set('status', this.status);
        }

        fetch(url, {
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        })
        .then(res => res.text())
        .then(html => {
          document.getElementById('kerusakan-table').innerHTML = html;
        });
      }
    }
  }
</script>
@endsection

