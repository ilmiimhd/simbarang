@extends('layouts.staff')

{{-- Header --}}
@section('header')
<div class="relative bg-lightBlue-600 md:pt-32 pb-44 pt-12">
  <div class="w-full mx-auto items-center flex justify-between md:flex-nowrap flex-wrap md:px-16 px-4">
    <div>
      <h2 class="text-white text-2xl md:text-3xl uppercase font-bold tracking-tight">
        Edit Barang
      </h2>
      <p class="mt-2 md:mt-3 text-sm md:text-base leading-relaxed text-white opacity-80">
        Perbarui informasi barang dengan data terbaru.
      </p>
    </div>
  </div>
</div>
@endsection

{{-- Konten --}}
@section('staff-content')
<div class="px-6 -mt-32">

  {{-- Error --}}
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
      <h3 class="font-semibold text-base text-blueGray-700">Form Edit Barang</h3>
    </div>

    <div class="px-6 py-6">
      <form method="POST" action="{{ route('staff.barang.update', $barang->id) }}">
        @csrf
        @method('PUT')

        {{-- Nama Barang --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Nama Barang</label>
          <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500" required>
        </div>

        {{-- Jenis Barang --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Jenis Barang</label>
          <select name="jenis_barang"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500" required>
            <option value="">Pilih Jenis</option>
            <option value="habis_pakai" {{ $barang->jenis_barang === 'habis_pakai' ? 'selected' : '' }}>Habis Pakai</option>
            <option value="tetap" {{ $barang->jenis_barang === 'tetap' ? 'selected' : '' }}>Tetap</option>
          </select>
        </div>

        {{-- Subkategori --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Subkategori</label>
          <input type="text" name="subkategori" value="{{ old('subkategori', $barang->subkategori) }}"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500" required>
        </div>

        {{-- Jumlah --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Jumlah</label>
          <input type="number" name="jumlah" value="{{ old('jumlah', $barang->jumlah) }}"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500" required min="1">
        </div>

        {{-- Satuan --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Satuan</label>
          <input type="text" name="satuan" value="{{ old('satuan', $barang->satuan) }}"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500" required>
        </div>

        {{-- Tanggal Masuk (Habis Pakai) --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Tanggal Masuk</label>
          <input type="date" name="tanggal_masuk" value="{{ old('tanggal_masuk', $barang->tanggal_masuk) }}"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500">
        </div>

        {{-- Tahun Masuk (Barang Tetap) --}}
        <div class="mb-6">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Tahun Masuk</label>
          <input type="number" name="tahun_masuk" value="{{ old('tahun_masuk', $barang->tahun_masuk) }}"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500"
            min="1900" max="{{ date('Y') }}">
        </div>

        {{-- Harga Satuan --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Harga Satuan (opsional)</label>
          <input type="number" name="harga_satuan" value="{{ old('harga_satuan', $barang->harga_satuan) }}"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500">
        </div>

        {{-- Kode Barang --}}
        <div class="mb-6">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Kode Barang (opsional)</label>
          <input type="text" name="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500">
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end gap-2">
          <a href="{{ route('staff.barang.index') }}"
            class="bg-blueGray-100 hover:bg-blueGray-200 text-blueGray-600 text-xs font-semibold px-4 py-2 rounded shadow transition">
            Batal
          </a>
          <button type="submit"
            class="bg-lightBlue-500 hover:bg-lightBlue-600 text-white font-bold text-xs px-6 py-2 rounded shadow transition">
            Simpan Perubahan
          </button>
        </div>

      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')

  {{-- SweetAlert --}}
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

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const jenisSelect = document.querySelector('select[name="jenis_barang"]');
      const tanggalInput = document.querySelector('input[name="tanggal_masuk"]');
      const tahunInput = document.querySelector('input[name="tahun_masuk"]');
      const hargaInput = document.querySelector('input[name="harga_satuan"]');
      const kodeInput = document.querySelector('input[name="kode_barang"]');

      function toggleRequired() {
        const jenis = jenisSelect.value;
        if (jenis === 'habis_pakai') {
          tanggalInput.required = true;
          tahunInput.required = false;
          hargaInput.required = true;
          kodeInput.required = false;
        } else if (jenis === 'tetap') {
          tanggalInput.required = false;
          tahunInput.required = true;
          hargaInput.required = false;
          kodeInput.required = true;
        } else {
          tanggalInput.required = false;
          tahunInput.required = false;
          hargaInput.required = false;
          kodeInput.required = false;
        }
      }

      jenisSelect.addEventListener('change', toggleRequired);
      toggleRequired();
    });
  </script>
@endsection