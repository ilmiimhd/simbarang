@extends('layouts.staff')

{{-- Header --}}
@section('header')
<div class="relative bg-lightBlue-600 md:pt-32 pb-44 pt-12">
  <div class="w-full mx-auto items-center flex justify-between md:flex-nowrap flex-wrap md:px-16 px-4">
    <div>
      <h2 class="text-white text-2xl md:text-3xl uppercase font-bold tracking-tight">
        Edit Pengadaan
      </h2>
      <p class="mt-2 md:mt-3 text-sm md:text-base leading-relaxed text-white opacity-80">
        Perbarui data pengadaan barang sesuai perubahan terbaru.
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
      <h3 class="font-semibold text-base text-blueGray-700">Form Edit Pengadaan</h3>
    </div>

    <div class="px-6 py-6">
      <form method="POST" action="{{ route('staff.pengadaan.update', $pengadaan->id) }}">
        @csrf
        @method('PUT')

        {{-- Nama Barang --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Nama Barang</label>
          <input type="text" value="{{ $pengadaan->barang->nama_barang }}" disabled
            class="block w-full text-sm border bg-blueGray-100 px-4 py-2 rounded focus:outline-none">
          {{-- Hidden input untuk barang_id --}}
          <input type="hidden" name="barang_id" value="{{ $pengadaan->barang_id }}">
        </div>

        {{-- Jumlah --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Jumlah</label>
          <input type="number" name="jumlah" min="1" required
            value="{{ old('jumlah', $pengadaan->jumlah) }}"
            class="block w-full text-sm border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-lightBlue-500">
        </div>

        {{-- Harga Satuan --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Harga Satuan (Rp)</label>
          <input type="number" name="harga_satuan" min="0" step="1" required
            value="{{ old('harga_satuan', $pengadaan->harga_satuan) }}"
            class="block w-full text-sm border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-lightBlue-500">
        </div>

        {{-- Tanggal Pengadaan --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Tanggal Pengadaan</label>
          <input type="date" name="tanggal_pengadaan" required
            value="{{ old('tanggal_pengadaan', \Carbon\Carbon::parse($pengadaan->tanggal_pengadaan)->format('Y-m-d')) }}"
            class="block w-full text-sm border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-lightBlue-500">
        </div>

        {{-- Supplier --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Supplier</label>
          <input type="text" name="supplier" required
            value="{{ old('supplier', $pengadaan->supplier) }}"
            class="block w-full text-sm border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-lightBlue-500">
        </div>

        {{-- Keterangan --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Keterangan (Opsional)</label>
          <textarea name="keterangan" rows="3"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500">{{ old('keterangan', $pengadaan->keterangan) }}</textarea>
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end gap-2">
          <a href="{{ route('staff.pengadaan.index') }}"
            class="bg-blueGray-100 hover:bg-blueGray-200 text-blueGray-600 text-xs font-semibold px-4 py-2 rounded shadow transition">
            Batal
          </a>
          <button type="button" id="btnConfirmSubmit"
            class="bg-lightBlue-500 hover:bg-lightBlue-600 text-white font-bold text-xs px-6 py-2 rounded shadow transition">
            Perbarui
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

{{-- Scripts --}}
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.getElementById('btnConfirmSubmit').addEventListener('click', function () {
    const form = this.closest('form');

    if (!form.checkValidity()) {
      form.reportValidity();
      return;
    }

    Swal.fire({
      title: 'Perbarui Data?',
      text: 'Pastikan data pengadaan sudah benar.',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#aaa',
      confirmButtonText: 'Yakin, Perbarui',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();
      }
    });
  });
</script>
@endsection
