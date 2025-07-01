<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PembayaranController extends Controller
{
    public function simpan(Request $request)
    {
        $data = $request->validate([
            'metode' => 'required',
            'items' => 'required|array',
            'total' => 'required|numeric'
        ]);

        // Simpan ke laporan_penjualan
        $id_user = session('id_user');

        $id_laporan = DB::table('laporan_penjualan')->insertGetId([
            'metode_pembayaran' => strtoupper($data['metode']),
            'total_harga' => $data['total'],
            'tanggal' => Carbon::now(),
            'id_user' => $id_user

        ]);

        // Simpan ke pembayaran (detail item)
        foreach ($data['items'] as $item) {
            DB::table('pembayaran')->insert([
                'id_menu' => $item['id'],
                'jumlah' => $item['quantity'],
                'total' => $item['price'] * $item['quantity'],
                'id_laporan' => $id_laporan
            ]);
        }

        return response()->json(['success' => true]);
    }
}
