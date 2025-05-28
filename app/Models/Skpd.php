<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\LaporanSkpd;

class Skpd extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_kotak',
        'jenis_skpd',
        'jumlah_awal',
        'jumlah_sisa',
        'tanggal_masuk',
    ];

    /**
     * Get semua laporan untuk kotak SKPD ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function laporan(): HasMany
    {
        return $this->hasMany(LaporanSkpd::class);
    }
}
