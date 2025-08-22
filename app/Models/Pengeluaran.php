<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran_barang';

    protected $casts = [
    'tanggal_pengeluaran' => 'date',
    ];

    protected $fillable = [
        'barang_id',
        'jumlah',
        'tanggal_pengeluaran',
        'dipakai_oleh',
        'keterangan',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
