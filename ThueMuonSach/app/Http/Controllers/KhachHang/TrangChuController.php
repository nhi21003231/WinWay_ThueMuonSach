<?php

namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class TrangChuController extends Controller
{
    public function hienThiTrangChu()
    {
        $dsDanhMuc = DanhMuc::all();
        return view('KhachHang.pages.TrangChu.index', compact('dsDanhMuc'));
    }
}
