@extends('layouts.staff')

{{-- Header --}}
@section('header')
<div class="relative bg-lightBlue-600 md:pt-32 pb-44 pt-12">
  <div class="w-full mx-auto items-center flex justify-between md:flex-nowrap flex-wrap md:px-16 px-4">
    <div>
      <h2 class="text-white text-2xl md:text-3xl uppercase font-bold tracking-tight">
        Tambah Kerusakan
      </h2>
      <p class="mt-2 md:mt-3 text-sm md:text-base leading-relaxed text-white opacity-80">
        Silakan isi data kerusakan barang tetap yang ditemukan.
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
      <h3 class="font-semibold text-base text-blueGray-700">Form Tambah Kerusakan</h3>
    </div>

    <div class="px-6 py-6">
      <form method="POST" action="{{ route('staff.kerusakan.store') }}" enctype="multipart/form-data">
        @csrf

        {{-- Pilih Barang --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Pilih Barang Tetap</label>
          <select id="barangSelect" name="barang_id" required
            class="block w-full text-sm border border-blueGray-600 rounded">
            <option value="">-- Pilih Barang --</option>
            @foreach ($barangs as $barang)
              <option value="{{ $barang->id }}" data-kode="{{ $barang->kode_barang }}">{{ $barang->nama_barang }}</option>
            @endforeach
          </select>
        </div>

        {{-- Kode Barang (auto terisi) --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Kode Barang</label>
          <input type="text" id="kodeBarangInput" name="kode_barang" readonly
            class="block w-full text-sm border bg-blueGray-100 text-blueGray-600 rounded px-4 py-2">
        </div>

        {{-- Deskripsi --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Deskripsi Kerusakan</label>
          <textarea name="deskripsi" rows="4" required
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500">{{ old('deskripsi') }}</textarea>
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end gap-2">
          <a href="{{ route('staff.kerusakan.index') }}"
            class="bg-blueGray-100 hover:bg-blueGray-200 text-blueGray-600 text-xs font-semibold px-4 py-2 rounded shadow transition">
            Batal
          </a>
          <button type="button" id="btnConfirmSubmit"
            class="bg-lightBlue-500 hover:bg-lightBlue-600 text-white font-bold text-xs px-6 py-2 rounded shadow transition">
            Simpan
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script>
  new TomSelect('#barangSelect', {
    create: false,
    sortField: { field: "text", direction: "asc" }
  });

  const barangSelect = document.getElementById('barangSelect');
  const kodeBarangInput = document.getElementById('kodeBarangInput');
  barangSelect.addEventListener('change', function () {
    const selectedOption = barangSelect.options[barangSelect.selectedIndex];
    const kode = selectedOption.getAttribute('data-kode') || '';
    kodeBarangInput.value = kode;
  });
</script>

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
  
  document.getElementById('btnConfirmSubmit').addEventListener('click', function () {
    const form = this.closest('form');

    // Cek validasi form HTML5 terlebih dahulu
    if (!form.checkValidity()) {
      form.reportValidity(); // Tampilkan pesan error browser (untuk required)
      return; // Stop di sini
    }

    Swal.fire({
      title: 'Simpan Data?',
      text: 'Pastikan semua data kerusakan sudah benar.',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#aaa',
      confirmButtonText: 'Yakin, Simpan',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit(); // Submit hanya jika disetujui
      }
    });
  });
</script>
@endsection
