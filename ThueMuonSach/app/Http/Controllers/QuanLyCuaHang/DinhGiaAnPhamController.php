<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use App\Models\DsAnPham;
use Illuminate\Http\Request;

class DinhGiaAnPhamController extends Controller
{
    public function hienThiDinhGiaAnPham()
    {
        $dsanphamList = DsAnPham::all();
        return view('CuaHang.pages.QuanLyCuaHang.DinhGiaAnPham.index', compact('dsanphamList'));
    }
}
