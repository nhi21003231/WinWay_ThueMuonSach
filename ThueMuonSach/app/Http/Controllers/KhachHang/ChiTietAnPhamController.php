<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChiTietAnPhamController extends Controller
{
    public function hienThiChiTietAnPham()
    {
        return view('KhachHang.pages.ChiTietAnPham.index');
    }
}
