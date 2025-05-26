<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaporanSkpd extends Model
{
    use HasFactory;

    protected $fillable = [
        'skpd_id',
        'tanggal',
        'lokasi_penggunaan',
        'penggunaan_lembar',
        'penggunaan_noseri',
        'jumlah_rusak',
        'rusak_noseri',
        'penambahan',
        'penambahan_noseri',
        'jumlah_sisa_harian',
    ];

    public function skpd()
    {
        return $this->belongsTo(Skpd::class);
    }
}
