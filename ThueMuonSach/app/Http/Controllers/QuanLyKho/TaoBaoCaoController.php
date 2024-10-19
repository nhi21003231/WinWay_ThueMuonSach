<?php

namespace App\Http\Controllers\QuanLyKho;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaoBaoCaoController extends Controller
{
    public function hienThiTaoBaoCao()
    {
        return view('CuaHang.pages.QuanLyKho.TaoBaoCao.index');
    }
}
