<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThongKeDoanhThuController extends Controller
{
    public function hienThiThongKeDoanhThu()
    {
        return view('CuaHang.pages.NhanVien.ThongKeDoanhThu.index');
    }
}
