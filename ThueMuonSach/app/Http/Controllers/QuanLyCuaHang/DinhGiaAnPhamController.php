<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DinhGiaAnPhamController extends Controller
{
    public function hienThiDinhGiaAnPham()
    {
        return view('CuaHang.pages.QuanLyCuaHang.DinhGiaAnPham.index');
    }
}
