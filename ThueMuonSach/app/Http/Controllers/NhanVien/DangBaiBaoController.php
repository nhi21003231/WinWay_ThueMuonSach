<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DangBaiBaoController extends Controller
{
    public function hienThiDangBaiBao()
    {
        return view('CuaHang.pages.NhanVien.DangBaiBao.index');
    }
}
