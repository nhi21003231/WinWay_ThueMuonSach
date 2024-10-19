<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuanLyKhachHangController extends Controller
{
    public function hienThiQuanLyKhachHang()
    {
        return view('CuaHang.pages.NhanVien.QuanLyKhachHang.index');
    }
}
