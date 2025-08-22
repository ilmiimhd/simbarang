<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    use HasFactory;

    protected $table = 'pengadaan_barang'; 

    protected $fillable = [
        'barang_id',
        'jumlah',
        'harga_satuan',
        'total_harga',
        'supplier',
        'tanggal_pengadaan',
        'keterangan',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
