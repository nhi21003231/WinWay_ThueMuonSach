<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrangChuController extends Controller
{
    public function hienThiTrangChu()
    {
        return view('KhachHang.pages.TrangChu.index');
    }
}
