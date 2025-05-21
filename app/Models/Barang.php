<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'nama_barang', 'jenis_barang', 'subkategori', 'jumlah',
        'satuan', 'harga_satuan', 'kode_barang'
    ];

}
