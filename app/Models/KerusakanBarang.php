<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KerusakanBarang extends Model
{
    use HasFactory;

    protected $table = 'kerusakan_barang';

    protected $fillable = [
        'aset_id',
        'kondisi',
        'deskripsi',
        'biaya_perbaikan',
        'catatan_perbaikan',
    ];

    // Relasi ke tabel aset
    public function aset()
    {
        return $this->belongsTo(Aset::class);
    }
}
