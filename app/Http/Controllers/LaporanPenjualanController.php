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
        $tanggal = $request->input('tanggal', date('Y-m-d'));
        $tanggalCarbon = Carbon::parse($tanggal);

        $query = DB::table('laporan_penjualan')
            ->join('user', 'laporan_penjualan.id_user', '=', 'user.id_user')
            ->select('laporan_penjualan.*', 'user.nama_user as nama_kasir')
            ->whereDate('tanggal', $tanggalCarbon);

        $labelTanggal = 'Penjualan Tanggal ' . $tanggalCarbon->format('d F Y');

        $laporan = $query->orderBy('tanggal', 'desc')->get();

        return view('laporanPenjualan', compact('laporan', 'labelTanggal'));
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

        return view('/detailLaporanPenjualan', compact('laporan', 'pembayaran'));
    }

    public function export(Request $request)
    {
        $tanggal = $request->input('tanggal', date('Y-m-d'));
        $tanggalCarbon = Carbon::parse($tanggal);

        $query = DB::table('laporan_penjualan')
            ->join('user', 'laporan_penjualan.id_user', '=', 'user.id_user')
            ->select('laporan_penjualan.*', 'user.nama_user as nama_kasir')
            ->whereDate('tanggal', $tanggalCarbon);

        $labelTanggal = 'Penjualan Tanggal ' . $tanggalCarbon->format('d F Y');

        $laporan = $query->orderBy('tanggal', 'desc')->get();

        return Excel::download(new LaporanPenjualanExport($laporan, $labelTanggal), 'laporan-penjualan-' . $tanggal . '.xlsx');
    }

    //admin
    public function adminLaporan(Request $request)
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
            $labelTanggal = $tanggalCarbon->format('d F Y') . ' - Penjualan Harian';
        } elseif ($filter === 'mingguan') {
            $start = $tanggalCarbon->copy()->startOfWeek();
            $end = $tanggalCarbon->copy()->endOfWeek();
            $query->whereBetween('tanggal', [$start, $end]);
            $labelTanggal = 'Penjualan Mingguan: ' . $start->format('d M') . ' - ' . $end->format('d M Y');
        } elseif ($filter === 'bulanan') {
            $query->whereYear('tanggal', $tanggalCarbon->year)
                ->whereMonth('tanggal', $tanggalCarbon->month);
            $labelTanggal = 'Penjualan Bulan: ' . $tanggalCarbon->format('F Y');
        }

        $laporan = $query->orderBy('tanggal', 'desc')->get();

        return view('admin.laporanPenjualan', compact('laporan', 'labelTanggal'));
    }

    public function detailAdmin(Request $request)
    {
        $id = $request->query('id');
        $filter = $request->input('filter');
        $tanggal = $request->input('tanggal');

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

        return view('/admin/detailLaporanPenjualan', compact('laporan', 'pembayaran', 'filter', 'tanggal'));
    }
}
