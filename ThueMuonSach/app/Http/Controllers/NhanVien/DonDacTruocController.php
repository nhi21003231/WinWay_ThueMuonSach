<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DonDacTruocController extends Controller
{
    public function hienThiDonDacTruoc()
    {
        return view('CuaHang.pages.NhanVien.DonDacTruoc.index');
    }
}
