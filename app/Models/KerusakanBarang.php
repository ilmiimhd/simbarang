<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerusakanBarang extends Model
{
    use HasFactory;

    protected $table = 'kerusakan_barang';

    protected $fillable = [
        'barang_id',
        'kode_barang',
        'jenis_barang',
        'kondisi',
        'deskripsi',
        'biaya_perbaikan',
        'catatan_perbaikan',
    ];

    // Relasi ke tabel barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
