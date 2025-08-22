<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $table = 'asets';

    protected $fillable = [
        'kode_barang',
        'nama_aset',
        'no_reg',
        'merk_type',
        'ukuran_cc',
        'bahan',
        'tahun_pembelian',
        'nomor_pabrik',
        'nomor_rangka',
        'nomor_mesin',
        'nomor_polisi',
        'nomor_bpkb',
        'asal_usul',
        'harga_satuan',
        'keberadaan',
        'kondisi',
        'paraf',
        'keterangan',
    ];
}

