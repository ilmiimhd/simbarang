<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'nip'      => 'required|string|max:50|unique:requests,nip',
            'jabatan'  => 'required|string|max:100',
            'instansi' => 'required|string',
            'email'    => 'required|email|unique:requests,email',
        ]);

        DB::table('requests')->insert([
            'nama'       => $request->nama,
            'nip'        => $request->nip,
            'jabatan'    => $request->jabatan,
            'instansi'   => $request->instansi,
            'email'      => $request->email,
            'status'     => 'pending',
            'created_at' => now(),
        ]);

        return redirect()->route('request-akun.form')->with('success', 'Mohon tunggu verifikasi dari admin.');
    }
}
