<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanPenjualanExport implements FromView
{
    protected $laporan;
    protected $labelTanggal;

    public function __construct($laporan, $labelTanggal)
    {
        $this->laporan = $laporan;
        $this->labelTanggal = $labelTanggal;
    }

    public function view(): View
    {
        return view('laporanPenjualan.excel', [
            'laporan' => $this->laporan,
            'labelTanggal' => $this->labelTanggal
        ]);
    }
}

