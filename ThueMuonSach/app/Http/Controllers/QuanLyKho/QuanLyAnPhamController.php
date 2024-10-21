<?php

namespace App\Http\Controllers\QuanLyKho;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuanLyAnPhamController extends Controller
{
    public function hienThiQuanLyAnPham()
    {
        return view('CuaHang.pages.QuanLyKho.QuanLyAnPham.index');
    }

    public function hienThiNhapAnPham()
    {
        return view('CuaHang.pages.QuanLyKho.QuanLyAnPham.nhap-an-pham');
    }
}
