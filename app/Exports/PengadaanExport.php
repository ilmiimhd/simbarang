<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class PengadaanExport implements WithMultipleSheets
{
    protected $pembelian;
    protected $perbaikan;
    protected $totalPembelian;
    protected $totalPerbaikan;
    protected $totalKeseluruhan;
    protected $bulan;
    protected $tahun;
    protected $namaBulan;

    public function __construct($pembelian, $perbaikan, $totalPembelian, $totalPerbaikan, $totalKeseluruhan, $bulan, $tahun, $namaBulan)
    {
        $this->pembelian = $pembelian;
        $this->perbaikan = $perbaikan;
        $this->totalPembelian = $totalPembelian;
        $this->totalPerbaikan = $totalPerbaikan;
        $this->totalKeseluruhan = $totalKeseluruhan;
        $this->bulan = $bulan;
        $this->tahun = $tahun;
        $this->namaBulan = $namaBulan;
    }

    public function sheets(): array
    {
        return [
            new PembelianSheet($this->pembelian, $this->totalPembelian, $this->bulan, $this->tahun, $this->namaBulan),
            new PerbaikanSheet($this->perbaikan, $this->totalPerbaikan, $this->totalKeseluruhan, $this->bulan, $this->tahun, $this->namaBulan),
        ];
    }
}
