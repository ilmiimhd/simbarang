@extends('layouts.staff')

{{-- Header --}}
@section('header')
<div class="relative bg-lightBlue-600 md:pt-32 pb-44 pt-12">
  <div class="w-full mx-auto items-center flex justify-between md:flex-nowrap flex-wrap md:px-16 px-4">
    <div>
      <h2 class="text-white text-2xl md:text-3xl uppercase font-bold tracking-tight">
        Edit Pengeluaran
      </h2>
      <p class="mt-2 md:mt-3 text-sm md:text-base leading-relaxed text-white opacity-80">
        Perbarui data pengeluaran barang jika ada kesalahan atau perubahan.
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
      <h3 class="font-semibold text-base text-blueGray-700">Form Edit Pengeluaran</h3>
    </div>

    <div class="px-6 py-6">
      <form method="POST" action="{{ route('staff.pengeluaran.update', $pengeluaran->id) }}">
        @csrf
        @method('PUT')

        {{-- Pilih Barang --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Pilih Barang</label>
          <select id="barangSelect" name="barang_id" required
            class="block w-full text-sm border border-blueGray-600 rounded">
            <option value="">-- Pilih Barang --</option>
            @foreach ($barangs as $barang)
              <option value="{{ $barang->id }}"
                @if ($barang->id == $pengeluaran->barang_id) selected @endif>
                {{ $barang->nama_barang }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- Jumlah --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Jumlah Pengeluaran</label>
          <input type="number" name="jumlah" min="1" required
            value="{{ old('jumlah', $pengeluaran->jumlah) }}"
            class="block w-full text-sm border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-lightBlue-500">
        </div>

        {{-- Tanggal Pengeluaran --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Tanggal Pengeluaran</label>
          <input type="date" name="tanggal_pengeluaran" required
            value="{{ old('tanggal_pengeluaran', $pengeluaran->tanggal_pengeluaran->format('Y-m-d')) }}"
            class="block w-full text-sm border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-lightBlue-500">
        </div>

        {{-- Dipakai Oleh --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Dipakai Oleh</label>
          <input type="text" name="dipakai_oleh" required
            value="{{ old('dipakai_oleh', $pengeluaran->dipakai_oleh) }}"
            class="block w-full text-sm border px-4 py-2 rounded focus:outline-none focus:ring-2 focus:ring-lightBlue-500">
        </div>

        {{-- Keterangan --}}
        <div class="mb-4">
          <label class="block text-sm font-medium text-blueGray-600 mb-1">Keterangan (Opsional)</label>
          <textarea name="keterangan" rows="3"
            class="w-full border px-4 py-2 rounded text-sm focus:outline-none focus:ring-2 focus:ring-lightBlue-500">{{ old('keterangan', $pengeluaran->keterangan) }}</textarea>
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

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
<script>
  new TomSelect('#barangSelect', {
    create: false,
    sortField: { field: "text", direction: "asc" }
  });
</script>

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
      text: 'Pastikan data pengeluaran sudah benar.',
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
