<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PerbaikanSheet implements FromView
{
    protected $data, $total, $grandTotal, $bulan, $tahun, $namaBulan;

    public function __construct($data, $total, $grandTotal, $bulan, $tahun, $namaBulan)
    {
        $this->data = $data;
        $this->total = $total;
        $this->grandTotal = $grandTotal;
        $this->bulan = $bulan;
        $this->tahun = $tahun;
        $this->namaBulan = $namaBulan;
    }

    public function view(): View
    {
        return view('exports.pengadaan.perbaikan', [
            'data' => $this->data,
            'total' => $this->total,
            'grandTotal' => $this->grandTotal,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
            'namaBulan' => $this->namaBulan,
        ]);
    }
}
