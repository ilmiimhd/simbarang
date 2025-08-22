@extends('layouts.staff')

{{-- Header --}}
@section('header')
<div class="relative bg-lightBlue-600 md:pt-32 pb-44 pt-12">
  <div class="w-full mx-auto flex justify-between md:flex-nowrap flex-wrap md:px-16 px-4">
    <div>
      <h2 class="text-white text-2xl md:text-3xl uppercase font-bold tracking-tight">
        Tambah Aset
      </h2>
      <p class="mt-2 md:mt-3 text-sm md:text-base text-white opacity-80">
        Silakan isi data aset tetap yang mau diinput ke sistem.
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
      <h3 class="font-semibold text-base text-blueGray-700">Form Tambah Aset</h3>
    </div>

    <div class="px-6 py-6">
      <form method="POST" action="{{ route('staff.aset.store') }}">
        @csrf

        {{-- Kode Barang --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Kode Barang</label>
          <input type="text" name="kode_barang" value="{{ old('kode_barang') }}"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500" required>
        </div>

        {{-- Nama Aset --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Nama Aset</label>
          <input type="text" name="nama_aset" value="{{ old('nama_aset') }}"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500" required>
        </div>

        {{-- Field Tambahan --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          {{-- No. Reg --}}
          <div>
            <label class="block text-sm font-medium text-blueGray-600 mb-1">No. Reg</label>
            <input type="text" name="no_reg" value="{{ old('no_reg') }}" class="w-full border px-4 py-2 rounded text-sm">
          </div>

          {{-- Merk/Type --}}
          <div>
            <label class="block text-sm font-medium text-blueGray-600 mb-1">Merk/Type</label>
            <input type="text" name="merk_type" value="{{ old('merk_type') }}" class="w-full border px-4 py-2 rounded text-sm">
          </div>

          {{-- Ukuran/CC --}}
          <div>
            <label class="block text-sm font-medium text-blueGray-600 mb-1">Ukuran/CC</label>
            <input type="text" name="ukuran_cc" value="{{ old('ukuran_cc') }}" class="w-full border px-4 py-2 rounded text-sm">
          </div>

          {{-- Bahan --}}
          <div>
            <label class="block text-sm font-medium text-blueGray-600 mb-1">Bahan</label>
            <input type="text" name="bahan" value="{{ old('bahan') }}" class="w-full border px-4 py-2 rounded text-sm">
          </div>

          {{-- Tahun Pembelian --}}
          <div>
            <label class="block text-sm font-medium text-blueGray-600 mb-1">Tahun Pembelian</label>
            <input type="number" name="tahun_pembelian" value="{{ old('tahun_pembelian') }}" class="w-full border px-4 py-2 rounded text-sm" min="1900" max="{{ date('Y') }}">
          </div>

          {{-- Harga Satuan --}}
          <div>
            <label class="block text-sm font-medium text-blueGray-600 mb-1">Harga (Rp)</label>
            <input type="number" name="harga_satuan" value="{{ old('harga_satuan') }}" class="w-full border px-4 py-2 rounded text-sm">
          </div>
        </div>

        {{-- Nomor-nomor --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
          <div>
            <label class="block text-sm font-medium text-blueGray-600 mb-1">No. Pabrik</label>
            <input type="text" name="nomor_pabrik" value="{{ old('nomor_pabrik') }}" class="w-full border px-4 py-2 rounded text-sm">
          </div>

          <div>
            <label class="block text-sm font-medium text-blueGray-600 mb-1">No. Rangka</label>
            <input type="text" name="nomor_rangka" value="{{ old('nomor_rangka') }}" class="w-full border px-4 py-2 rounded text-sm">
          </div>

          <div>
            <label class="block text-sm font-medium text-blueGray-600 mb-1">No. Mesin</label>
            <input type="text" name="nomor_mesin" value="{{ old('nomor_mesin') }}" class="w-full border px-4 py-2 rounded text-sm">
          </div>

          <div>
            <label class="block text-sm font-medium text-blueGray-600 mb-1">No. Polisi</label>
            <input type="text" name="nomor_polisi" value="{{ old('nomor_polisi') }}" class="w-full border px-4 py-2 rounded text-sm">
          </div>

          <div>
            <label class="block text-sm font-medium text-blueGray-600 mb-1">No. BPKB</label>
            <input type="text" name="nomor_bpkb" value="{{ old('nomor_bpkb') }}" class="w-full border px-4 py-2 rounded text-sm">
          </div>
        </div>

        {{-- Lain-lain --}}
        <div class="mt-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Asal Usul</label>
          <input type="text" name="asal_usul" value="{{ old('asal_usul') }}" class="w-full border px-4 py-2 rounded text-sm">
        </div>

        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Keberadaan</label>
          <div class="flex gap-4">
            <label class="flex items-center">
              <input type="radio" name="keberadaan" value="Ada"
                {{ old('keberadaan') === 'Ada' ? 'checked' : '' }}
                class="mr-2">
              Ada
            </label>
            <label class="flex items-center">
              <input type="radio" name="keberadaan" value="Tidak Ada"
                {{ old('keberadaan') === 'Tidak Ada' ? 'checked' : '' }}
                class="mr-2">
              Tidak Ada
            </label>
          </div>
        </div>

        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Kondisi</label>
          <div class="flex gap-4">
            <label class="flex items-center">
              <input type="radio" name="kondisi" value="Baik"
                {{ old('kondisi') === 'Baik' ? 'checked' : '' }}
                class="mr-2">
              Baik
            </label>
            <label class="flex items-center">
              <input type="radio" name="kondisi" value="Rusak Ringan"
                {{ old('kondisi') === 'Rusak Ringan' ? 'checked' : '' }}
                class="mr-2">
              Rusak Ringan
            </label>
            <label class="flex items-center">
              <input type="radio" name="kondisi" value="Rusak Berat"
                {{ old('kondisi') === 'Rusak Berat' ? 'checked' : '' }}
                class="mr-2">
              Rusak Berat
            </label>
          </div>
        </div>

        <div class="mt-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Paraf</label>
          <input type="text" name="paraf" value="{{ old('paraf') }}" class="w-full border px-4 py-2 rounded text-sm">
        </div>

        <div class="mt-4 mb-6">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Keterangan</label>
          <textarea name="keterangan" rows="3" class="w-full border px-4 py-2 rounded text-sm">{{ old('keterangan') }}</textarea>
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex justify-end gap-2">
          <a href="{{ route('staff.aset.index') }}"
            class="bg-blueGray-100 hover:bg-blueGray-200 text-blueGray-600 text-xs font-semibold px-4 py-2 rounded shadow">
            Batal
          </a>
          <button type="submit"
            class="bg-lightBlue-500 hover:bg-lightBlue-600 text-white font-bold text-xs px-6 py-2 rounded shadow">
            Simpan
          </button>
        </div>

      </form>
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
