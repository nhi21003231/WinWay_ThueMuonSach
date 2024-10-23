<?php

namespace App\Http\Controllers\QuanLyKho;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuanLyDanhMucController extends Controller
{
    public function hienThiQuanLyDanhMuc()
    {
        return view('CuaHang.pages.QuanLyKho.QuanLyDanhMuc.index');
    }

    public function hienThiThemDanhMuc()
    {
        return view('CuaHang.pages.QuanLyKho.QuanLyDanhMuc.them-danh-muc');
    }
}
