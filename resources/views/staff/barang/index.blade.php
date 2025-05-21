@extends('layouts.staff')

{{-- Header --}}
@section('header')
<div class="relative bg-lightBlue-600 md:pt-32 pb-44 pt-12">
  <div class="w-full mx-auto items-center flex justify-between md:flex-nowrap flex-wrap md:px-16 px-4">
    <div>
      <h2 class="text-white text-2xl md:text-3xl uppercase font-bold tracking-tight">
        Data Barang
      </h2>
      <p class="mt-2 md:mt-3 text-sm md:text-base leading-relaxed text-white opacity-80">
        Berikut adalah daftar seluruh barang inventaris, baik habis pakai maupun barang tetap.
      </p>
    </div>
  </div>
</div>
@endsection

{{-- Konten --}}
@section('staff-content')
<div class="px-6 -mt-32">

  {{-- Flash Message --}}
  {{-- @if (session('success'))
    <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-2 rounded mb-4 text-sm">
      {{ session('success') }}
    </div>
  @endif --}}

  {{-- Card Table --}}
  <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
    <div class="rounded-t mb-0 px-4 py-3 border-0 bg-blueGray-50">
      <div class="flex flex-wrap items-center justify-between">
        <h3 class="font-semibold text-base text-blueGray-700">Tabel Barang</h3>
        <a href="{{ route('staff.barang.create') }}"
          class="bg-emerald-500 hover:bg-emerald-600 text-white font-bold text-xs px-4 py-2 rounded shadow transition">
          + Tambah Barang
        </a>
      </div>
    </div>

    <div class="block w-full overflow-x-auto rounded-t border-b border-blueGray-100">
      <table class="items-center w-full bg-transparent border-collapse">
        <thead>
          <tr>
            <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 bg-blueGray-100 uppercase border-b border-blueGray-200 text-left">
              Nama
            </th>
            <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 bg-blueGray-100 uppercase border-b border-blueGray-200 text-left">
              Jenis
            </th>
            <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 bg-blueGray-100 uppercase border-b border-blueGray-200 text-left">
              Subkategori
            </th>
            <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 bg-blueGray-100 uppercase border-b border-blueGray-200 text-left">
              Jumlah
            </th>
            <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 bg-blueGray-100 uppercase border-b border-blueGray-200 text-left">
              Satuan
            </th>
            <th class="px-6 py-3 text-xs font-semibold text-blueGray-500 bg-blueGray-100 uppercase border-b border-blueGray-200 text-left">
              Aksi
            </th>
          </tr>
        </thead>
        <tbody>
          @forelse ($barangs as $barang)
            <tr class="hover:bg-blueGray-50">
              <td class="px-6 py-4 text-sm text-blueGray-700 border-t border-blueGray-100">{{ $barang->nama_barang }}</td>
              <td class="px-6 py-4 text-sm capitalize border-t border-blueGray-100">{{ str_replace('_', ' ', $barang->jenis_barang) }}</td>
              <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ $barang->subkategori }}</td>
              <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ $barang->jumlah }}</td>
              <td class="px-6 py-4 text-sm border-t border-blueGray-100">{{ $barang->satuan }}</td>

              {{-- Aksi --}}
              <td class="px-6 py-4 border-t border-blueGray-100">
                <div class="flex items-center space-x-2">

                  {{-- Tombol Edit --}}
                  <a href="{{ route('staff.barang.edit', $barang->id) }}"
                    class="text-blue-500 hover:text-blue-700 text-sm" title="Edit">
                    <i class="fas fa-edit"></i>
                  </a>

                  {{-- Tombol Delete --}}
                  <form method="POST" action="{{ route('staff.barang.destroy', $barang->id) }}" class="form-delete">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-700 text-sm btn-delete" data-nama="{{ $barang->nama_barang }}">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="px-6 py-4 text-center text-blueGray-400 text-sm">Belum ada data barang.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

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

{{-- SweetAlert Konfirmasi Hapus --}}
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const deleteButtons = document.querySelectorAll('.btn-delete');

      deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
          e.preventDefault();
          const form = this.closest('form');
          const nama = this.getAttribute('data-nama') || 'barang ini';

          Swal.fire({
            title: 'Yakin mau hapus?',
            text: `Data "${nama}" akan dihapus secara permanen.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e3342f',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
              form.submit();
            }
          });
        });
      });
    });
  </script>
@endsection

