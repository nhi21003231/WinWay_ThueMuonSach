<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChamCongController extends Controller
{
    public function hienThiChamCong()
    {
        return view('CuaHang.pages.QuanLyCuaHang.ChamCong.index');
    }
}
