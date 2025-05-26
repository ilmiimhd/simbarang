@extends('layouts.staff')

{{-- Header --}}
@section('header')
<div class="relative bg-lightBlue-600 md:pt-32 pb-44 pt-12">
  <div class="w-full mx-auto items-center flex justify-between md:flex-nowrap flex-wrap md:px-16 px-4">
    <div>
      <h2 class="text-white text-2xl md:text-3xl uppercase font-bold tracking-tight">
        Tambah Laporan SKPD
      </h2>
      <p class="mt-2 md:mt-3 text-sm md:text-base leading-relaxed text-white opacity-80">
        Silakan isi data laporan harian pemakaian SKPD.
      </p>
    </div>
  </div>
</div>
@endsection

{{-- Konten --}}
@section('staff-content')
<div class="px-6 -mt-32">

  {{-- Flash error --}}
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
      <h3 class="font-semibold text-base text-blueGray-700">Form Laporan SKPD</h3>
    </div>

    <div class="px-6 py-6">
      <form method="POST" action="{{ route('staff.laporan-skpd.store') }}">
        @csrf

        {{-- Tanggal --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Tanggal</label>
          <input type="date" name="tanggal" value="{{ old('tanggal', \Carbon\Carbon::today()->format('Y-m-d')) }}"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500" required autofocus>
        </div>

        {{-- Kotak SKPD --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Pilih Kotak SKPD</label>
          <select name="skpd_id" id="selectKotak"
            class="block w-full text-sm border border-blueGray-600 rounded" required>
            <option value="">-- Pilih Kotak --</option>
            @foreach ($skpds as $skpd)
              <option value="{{ $skpd->id }}" {{ old('skpd_id') == $skpd->id ? 'selected' : '' }}>
                {{ $skpd->kode_kotak }} (Sisa: {{ $skpd->jumlah_sisa }})
              </option>
            @endforeach
          </select>
        </div>

        {{-- Lokasi Penggunaan --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Lokasi Penggunaan</label>
          <select name="lokasi_penggunaan"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500" required>
            <option value="">Pilih Lokasi</option>
            <option value="samsat_keliling" {{ old('lokasi_penggunaan') === 'samsat_keliling' ? 'selected' : '' }}>Samsat Keliling</option>
            <option value="kantor" {{ old('lokasi_penggunaan') === 'kantor' ? 'selected' : '' }}>Kantor</option>
            <option value="alat_berat" {{ old('lokasi_penggunaan') === 'alat_berat' ? 'selected' : '' }}>Alat Berat</option>
          </select>
        </div>

        {{-- Jumlah Pemakaian (Lembar) --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Jumlah Pemakaian (Lembar)</label>
          <input type="number" name="penggunaan_lembar" value="{{ old('penggunaan_lembar') }}"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500"required min="1">
        </div>

        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Nomor Seri Pemakaian</label>
          <textarea name="penggunaan_noseri" rows="3" placeholder="Contoh: Q1-1050 s.d Q1-1550"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500"
            required>{{ old('penggunaan_noseri') }}</textarea>
        </div>

        {{-- Rusak --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Jumlah Rusak (opsional)</label>
          <input type="number" name="jumlah_rusak" value="{{ old('jumlah_rusak') }}"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500" min="0">
        </div>

        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Nomor Seri Rusak (opsional)</label>
          <textarea name="rusak_noseri" rows="3" placeholder="Contoh: Q1-1050 s.d Q1-1550"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500">{{ old('rusak_noseri') }}</textarea>
        </div>

        {{-- Penambahan --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Penambahan Baru (dalam Set - Opsional)</label>
          <input type="number" name="penambahan" value="{{ old('penambahan') }}"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500" min="0">
          <small class="text-blueGray-400 text-xs italic">
            Misalnya: Tambah 1 set dari SKPD pusat (jika ada)
          </small>
        </div>

        <div class="mb-6">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Nomor Seri Penambahan (opsional)</label>
          <textarea name="penambahan_noseri" rows="3" placeholder="Contoh: Q1-1050 s.d Q1-1550"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500">{{ old('penambahan_noseri') }}</textarea>
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex justify-end gap-2">
          <a href="{{ route('staff.laporan-skpd.index') }}"
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

  @if ($errors->any())
      Swal.fire({
        icon: 'error',
        title: 'Gagal Simpan!',
        html: '{!! implode("<br>", $errors->all()) !!}',
        confirmButtonColor: '#e3342f'
      });
  @endif
</script>

{{-- Tom Select CDN --}}
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script>
  new TomSelect('#selectKotak', {
    create: false,
    sortField: {
      field: "text",
      direction: "asc"
    },
    placeholder: 'Cari Kotak SKPD...'
  });
</script>
@endsection
