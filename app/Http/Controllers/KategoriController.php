<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Cache\RedisTagSet;

class KategoriController extends Controller
{
    public function showKategori()
    {
        $kategori = Kategori::all();
        return view('admin.kategori.kategori', compact('kategori'));
    }

    public function kategoriTambah()
    {
        return view('admin.kategori.kategoriTambah');
    }

    public function kategoriUbah($id)
    {
        $kategori = kategori::findOrFail($id);

        return view('admin.kategori.kategoriUbah', compact('kategori'));
    }

    public function tambah(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        kategori::create([
            'nama_kategori' => $request->nama_kategori
        ]);

        return redirect('/admin/kategori')->with('succes', 'Kategori berhasil ditambahkan');
    }

    public function ubah(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
        ]);

        $kategori = kategori::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori
        ]);
        return redirect('/admin/kategori')->with('succes', 'kategori berhasil diubah');
    }

    public function hapus($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect('/admin/kategori')->with('succes', 'Kategori Berhasil di Hapus');
    }
}
