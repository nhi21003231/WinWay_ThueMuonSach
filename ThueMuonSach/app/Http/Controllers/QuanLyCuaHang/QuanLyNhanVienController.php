<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuanLyNhanVienController extends Controller
{
    public function hienThiQuanLyNhanVien()
    {
        return view('CuaHang.pages.QuanLyCuaHang.QuanLyNhanVien.index');
    }
}
