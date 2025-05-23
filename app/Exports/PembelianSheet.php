<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PembelianSheet implements FromView
{
    protected $data, $total, $bulan, $tahun;

    public function __construct($data, $total, $bulan, $tahun,  $namaBulan)
    {
        $this->data = $data;
        $this->total = $total;
        $this->bulan = $bulan;
        $this->tahun = $tahun;
        $this->namaBulan = $namaBulan;
    }

    public function view(): View
    {
        return view('exports.pengadaan.pembelian', [
            'data' => $this->data,
            'total' => $this->total,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
            'namaBulan' => $this->namaBulan,
        ]);
    }
}
