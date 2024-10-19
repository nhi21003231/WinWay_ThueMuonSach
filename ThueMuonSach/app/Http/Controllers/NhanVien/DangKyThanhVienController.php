<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DangKyThanhVienController extends Controller
{
    public function hienThiDangKyThanhVien()
    {
        return view('CuaHang.pages.NhanVien.DangKyThanhVien.index');
    }
}
