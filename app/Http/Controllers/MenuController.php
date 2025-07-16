<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Menu;

class MenuController extends Controller
{
    public function getMenu()
    {
        $menu = Menu::all([
            'id_menu as id',
            'nama_menu as name',
            'harga_menu as price',
        ]);
        return response()->json($menu);
    }

    public function showMenuList()
    {
        $menus = Menu::all(); // Ambil semua data menu
        return view('admin.menu.daftarMenu', compact('menus'));
    }

    public function create()
    {
        $kategori = Kategori::all(); // jika punya relasi kategori
        return view('admin.menu.tambahMenu', compact('kategori'));
    }

    // Proses simpan
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'nama_menu' => 'required|string|max:255',
            'harga_menu' => 'required|numeric|min:1',
        ]);

        Menu::create([
            'id_kategori' => $request->id_kategori,
            'nama_menu' => $request->nama_menu,
            'harga_menu' => $request->harga_menu,
        ]);

        return redirect('/admin/menu')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect('/admin/menu')->with('success', 'Menu berhasil dihapus!');
    }

    public function edit($id)
{
    $menu = Menu::findOrFail($id);
    $kategori = Kategori::all();
    return view('admin.menu.editMenu', compact('menu', 'kategori'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'id_kategori' => 'required|exists:kategori,id_kategori',
        'nama_menu' => 'required|string|max:255',
        'harga_menu' => 'required|numeric|min:1',
    ]);

    $menu = Menu::findOrFail($id);
    $menu->update([
        'id_kategori' => $request->id_kategori,
        'nama_menu' => $request->nama_menu,
        'harga_menu' => $request->harga_menu,
    ]);

    return redirect('/admin/menu')->with('success', 'Menu berhasil diubah!');
}
}
