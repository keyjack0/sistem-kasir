<?php

namespace App\Http\Controllers;

use App\Exports\LaporanPenjualanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanPenjualanController extends Controller
{
    public function index(Request $request)
    {

        $filter = $request->input('filter', 'harian');
        $tanggal = $request->input('tanggal', date('Y-m-d'));
        $tanggalCarbon = Carbon::parse($tanggal);

        $query = DB::table('laporan_penjualan')
            ->join('user', 'laporan_penjualan.id_user', '=', 'user.id_user')
            ->select('laporan_penjualan.*', 'user.nama_user as nama_kasir');

        $labelTanggal = ''; // <-- untuk dikirim ke view

        if ($filter === 'harian') {
            $query->whereDate('tanggal', $tanggalCarbon);
            $labelTanggal = 'Penjualan Tanggal ' . $tanggalCarbon->format('d F Y');
        } elseif ($filter === 'mingguan') {
            $start = $tanggalCarbon->copy()->startOfWeek();
            $end = $tanggalCarbon->copy()->endOfWeek();
            $query->whereBetween('tanggal', [$start, $end]);
            $labelTanggal = 'Penjualan Minggu ' . $start->format('d M') . ' - ' . $end->format('d M Y');
        } elseif ($filter === 'bulanan') {
            $query->whereYear('tanggal', $tanggalCarbon->year)
                ->whereMonth('tanggal', $tanggalCarbon->month);
            $labelTanggal = 'Penjualan Bulan ' . $tanggalCarbon->format('F Y');
        }

        $laporan = $query->orderBy('tanggal', 'desc')->get();
        // $laporan = DB::table('laporan_penjualan')->get();

        return view('laporanPenjualan', compact('laporan', 'labelTanggal'));
        // return view('laporanPenjualan', compact('laporan'));
    }


    public function detail(Request $request)
    {
        $id = $request->query('id');

        // Ambil data header laporan
        $laporan = DB::table('laporan_penjualan')
            ->where('id_laporan', $id)
            ->first();

        if (!$laporan) {
            abort(404, 'Data laporan tidak ditemukan');
        }

        // Ambil data detail pembayaran
        $pembayaran = DB::table('pembayaran')
            ->join('menu', 'pembayaran.id_menu', '=', 'menu.id_menu')
            ->where('id_laporan', $id)
            ->select('menu.nama_menu', 'menu.harga_menu', 'pembayaran.jumlah', 'pembayaran.total')
            ->get();

        return view('detailLaporanPenjualan', compact('laporan', 'pembayaran'));
    }

    public function export(Request $request)
    {
        $filter = $request->input('filter', 'harian');
        $tanggal = $request->input('tanggal', date('Y-m-d'));
        $tanggalCarbon = Carbon::parse($tanggal);

        $query = DB::table('laporan_penjualan')
            ->join('user', 'laporan_penjualan.id_user', '=', 'user.id_user')
            ->select('laporan_penjualan.*', 'user.nama_user as nama_kasir');

        $labelTanggal = '';

        if ($filter === 'harian') {
            $query->whereDate('tanggal', $tanggalCarbon);
            $labelTanggal = 'Penjualan Tanggal ' . $tanggalCarbon->format('d F Y');
        } elseif ($filter === 'mingguan') {
            $start = $tanggalCarbon->copy()->startOfWeek();
            $end = $tanggalCarbon->copy()->endOfWeek();
            $query->whereBetween('tanggal', [$start, $end]);
            $labelTanggal = 'Penjualan Minggu ' . $start->format('d M') . ' - ' . $end->format('d M Y');
        } elseif ($filter === 'bulanan') {
            $query->whereYear('tanggal', $tanggalCarbon->year)
                ->whereMonth('tanggal', $tanggalCarbon->month);
            $labelTanggal = 'Penjualan Bulan ' . $tanggalCarbon->format('F Y');
        }

        $laporan = $query->orderBy('tanggal', 'desc')->get();

        return Excel::download(new LaporanPenjualanExport($laporan, $labelTanggal), 'laporan-penjualan.xlsx');
    }
}
