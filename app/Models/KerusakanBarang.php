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
        'jenis_barang',
        'kondisi',
        'deskripsi',
        'foto_rusak',
        'biaya_perbaikan',
        'catatan_perbaikan',
    ];

    // Relasi ke tabel barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
