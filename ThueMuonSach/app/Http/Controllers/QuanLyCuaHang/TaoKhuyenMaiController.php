<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaoKhuyenMaiController extends Controller
{
    public function hienThiTaoKhuyenMai()
    {
        return view('CuaHang.pages.QuanLyCuaHang.TaoKhuyenMai.index');
    }
}
