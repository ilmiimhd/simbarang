<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'nama_barang',
        'kategori',
        'satuan',
        'ketersediaan',
    ];

    public function pengadaans()
    {
        return $this->hasMany(PengadaanBarang::class);
    }

    public function pengeluarans()
    {
        return $this->hasMany(PengeluaranBarang::class);
    }
}
