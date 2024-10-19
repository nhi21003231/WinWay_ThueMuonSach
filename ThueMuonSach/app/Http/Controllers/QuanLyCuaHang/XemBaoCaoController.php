<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class XemBaoCaoController extends Controller
{
    public function hienThiXemBaoCao()
    {
        return view('CuaHang.pages.QuanLyCuaHang.XemBaoCao.index');
    }
}
