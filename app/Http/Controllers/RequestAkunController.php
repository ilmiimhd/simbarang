<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestAkun;

class RequestAkunController extends Controller
{
    // Tampilkan form permintaan akun
    public function create()
    {
        return view('auth.request-akun');
    }

    // Simpan permintaan akun ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama'     => 'required|string|max:255',
            'nip'      => 'required|numeric|digits:18|unique:requests,nip',
            'jabatan'  => 'required|string|max:100',
            'instansi' => 'required|string',
            'email'    => 'required|email|unique:requests,email',
        ], [
            'nip.digits' => 'NIP harus terdiri dari 18 digit angka.',
            'nip.unique' => 'NIP ini sudah pernah digunakan.',
            'email.unique' => 'Email ini sudah terdaftar.',
        ]);

        RequestAkun::create([
            'nama'     => $request->nama,
            'nip'      => $request->nip,
            'jabatan'  => $request->jabatan,
            'instansi' => $request->instansi,
            'email'    => $request->email,
            'status'   => 'pending',
        ]);

        return redirect()->route('request-akun.form')->with('success', 'Mohon tunggu verifikasi dari admin.');
    }
}
