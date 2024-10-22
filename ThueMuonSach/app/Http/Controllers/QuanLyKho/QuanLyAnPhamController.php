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

    public function hienThiNhapAnPhamMoi()
    {
        return view('CuaHang.pages.QuanLyKho.QuanLyAnPham.nhap-an-pham-moi');
    }

    public function hienThiNhapAnPhamDaCo()
    {
        return view('CuaHang.pages.QuanLyKho.QuanLyAnPham.nhap-an-pham-da-co');
    }
}
