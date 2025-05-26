<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanSkpdExport implements FromView
{
    protected $laporans, $bulan, $tahun;

    public function __construct($laporans, $bulan, $tahun)
    {
        $this->laporans = $laporans;
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function view(): View
    {
        return view('exports.skpd.laporan', [
            'laporans' => $this->laporans,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
        ]);
    }
}