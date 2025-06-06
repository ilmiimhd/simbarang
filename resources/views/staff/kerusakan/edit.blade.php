@extends('layouts.staff')

{{-- Header --}}
@section('header')
<div class="relative bg-lightBlue-600 md:pt-32 pb-44 pt-12">
  <div class="w-full mx-auto items-center flex justify-between md:flex-nowrap flex-wrap md:px-16 px-4">
    <div>
      <h2 class="text-white text-2xl md:text-3xl uppercase font-bold tracking-tight">
        Edit Kerusakan
      </h2>
      <p class="mt-2 md:mt-3 text-sm md:text-base leading-relaxed text-white opacity-80">
        Perbarui status atau informasi detail kerusakan barang tetap.
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
      <h3 class="font-semibold text-base text-blueGray-700">Form Edit Kerusakan</h3>
    </div>

    <div class="px-6 py-6">
      <form id="formKerusakanEdit" method="POST" action="{{ route('staff.kerusakan.update', $kerusakan->id) }}">
        @csrf
        @method('PUT')

        {{-- Barang --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Barang</label>
          <input type="text" value="{{ $kerusakan->barang->nama_barang }}" class="w-full border px-4 py-2 rounded text-sm bg-blueGray-100 text-blueGray-600" readonly>
        </div>

        {{-- Kode Barang --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Kode Barang</label>
          <input type="text" readonly value="{{ $kerusakan->kode_barang }}"
            class="block w-full text-sm border bg-blueGray-100 text-blueGray-600 rounded px-4 py-2">
        </div>

        {{-- Kondisi --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Kondisi</label>
          <select name="kondisi" id="kondisiSelect" required
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500">
            <option value="rusak" {{ $kerusakan->kondisi === 'rusak' ? 'selected' : '' }}>Rusak</option>
            <option value="perbaikan" {{ $kerusakan->kondisi === 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
            <option value="baik" {{ $kerusakan->kondisi === 'baik' ? 'selected' : '' }}>Baik</option>
            <option value="rusak_berat" {{ $kerusakan->kondisi === 'rusak_berat' ? 'selected' : '' }}>Rusak Berat</option>
          </select>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Deskripsi</label>
          <textarea name="deskripsi" rows="4" required
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500">{{ old('deskripsi', $kerusakan->deskripsi) }}</textarea>
        </div>

        {{-- Biaya Perbaikan --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Biaya Perbaikan (jika sudah diperbaiki)</label>
          <input type="number" name="biaya_perbaikan" value="{{ old('biaya_perbaikan', $kerusakan->biaya_perbaikan) }}"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500">
        </div>

        {{-- Catatan Perbaikan --}}
        <div class="mb-6">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Catatan Perbaikan</label>
          <textarea name="catatan_perbaikan" id="catatanPerbaikan" rows="3"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500">{{ old('catatan_perbaikan', $kerusakan->catatan_perbaikan) }}</textarea>
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end gap-2">
          <a href="{{ route('staff.kerusakan.index') }}"
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formKerusakanEdit');
    const kondisiSelect = document.getElementById('kondisiSelect');
    const catatanPerbaikan = document.getElementById('catatanPerbaikan');

    // ⛔️ Stop auto-submit dan ganti dengan konfirmasi SweetAlert
    form.addEventListener('submit', function (e) {
      e.preventDefault();

      Swal.fire({
        title: 'Simpan Perubahan?',
        text: 'Pastikan data yang diubah sudah benar.',
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#aaa',
        confirmButtonText: 'Yakin, Simpan',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    });

    // ✅ Toggle required untuk catatan perbaikan
    function toggleRequiredField() {
      const isWajibCatatan = ['baik', 'rusak_berat'].includes(kondisiSelect.value);
      catatanPerbaikan.required = isWajibCatatan;
      catatanPerbaikan.parentElement.querySelector('label').innerHTML =
        `Catatan Perbaikan ${isWajibCatatan ? '<span class="text-red-500">*</span>' : ''}`;
    }
    toggleRequiredField();
    kondisiSelect.addEventListener('change', toggleRequiredField);
  });
</script>

@if (session('success'))
<script>
  document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
      icon: 'success',
      title: 'Berhasil!',
      text: '{{ session('success') }}',
      timer: 3000,
      showConfirmButton: false
    });
  });
</script>
@endif
@endsection
