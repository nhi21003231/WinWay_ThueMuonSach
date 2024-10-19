<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuanLyDanhGiaController extends Controller
{
    public function hienThiQuanLyDanhGia()
    {
        return view('CuaHang.pages.QuanLyCuaHang.QuanLyDanhGia.index');
    }
}
