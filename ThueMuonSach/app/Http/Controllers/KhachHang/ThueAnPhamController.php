<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThueAnPhamController extends Controller
{
    public function hienThiThueAnPham()
    {
        return view('KhachHang.pages.ThueAnPham.index');
    }
}
