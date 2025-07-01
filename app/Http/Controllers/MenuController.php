<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
