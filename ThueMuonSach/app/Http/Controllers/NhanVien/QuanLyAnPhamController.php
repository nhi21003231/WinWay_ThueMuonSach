<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuanLyAnPhamController extends Controller
{
    public function hienThiQuanLyAnPham()
    {
        return view('CuaHang.pages.NhanVien.QuanLyAnPham.index');
    }
}
