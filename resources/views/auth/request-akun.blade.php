@extends('layouts.request')

@section('auth-content')
<div class="container mx-auto px-4 h-full">
  <div class="flex content-center items-center justify-center h-full">
    <div class="w-full lg:w-5/12 px-4">
      <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0">
        <div class="rounded-t mb-0 px-6 py-2">
          <div class="text-center mb-1 pt-4">
            <img src="{{ asset('img/logo-samsat.png') }}" alt="Logo SAMSAT" class="mx-auto mb-4 h-16 w-auto" />
            <h6 class="text-blueGray-500 text-sm font-bold">Form Permintaan Akun Staff</h6>
          </div>
        </div>
        <div class="flex-auto px-4 lg:px-10 pt-4 pb-8">
          
        @if (session('success'))
          <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-2 rounded mb-4 text-sm">
            {{ session('success') }}
          </div>
        @endif

          <div class="text-blueGray-400 text-center mb-6 font-bold">
            <small>Silakan isi data di bawah ini untuk mengajukan akun SIMBARANG</small>
          </div>

          <form method="POST" action="{{ route('request-akun.submit') }}">
            @csrf

            {{-- Nama --}}
            <div class="mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Nama Lengkap</label>
              <input type="text" name="nama" required
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full transition-all duration-150"
                placeholder="Masukkan nama lengkap">
            </div>

            {{-- NIP --}}
            <div class="mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">NIP</label>
              <input type="text" name="nip" required
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full transition-all duration-150"
                placeholder="Masukkan NIP">
            </div>

            {{-- Jabatan --}}
            <div class="mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Jabatan</label>
              <input type="text" name="jabatan" required
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full transition-all duration-150"
                placeholder="Masukkan jabatan">
            </div>

            {{-- Instansi --}}
            <div class="mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Instansi</label>
              <select name="instansi" required
                class="border-0 px-3 py-3 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full transition-all duration-150">
                <option value="">-- Pilih Instansi --</option>
                <option value="UPTPPD Kalimantan Tengah">UPTPPD Kalimantan Tengah</option>
                <option value="POLRI">POLRI</option>
                <option value="Jasaraharja">Jasaraharja</option>
              </select>
            </div>

            {{-- Email --}}
            <div class="mb-3">
              <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2">Email</label>
              <input type="email" name="email" required
                class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full transition-all duration-150"
                placeholder="Masukkan email aktif">
            </div>

            <div class="text-center mt-6">
              <button type="submit"
                class="bg-blueGray-800 text-white text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg w-full transition duration-150">
                Kirim Permintaan Akun
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
