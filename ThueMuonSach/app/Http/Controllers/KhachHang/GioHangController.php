<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GioHangController extends Controller
{
    public function hienThiGioHang()
    {
        return view('KhachHang.pages.GioHang.index');
    }
}
