<?php

namespace App\Http\Controllers\QuanLyKho;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class TaoBaoCaoController extends Controller
{
    public function hienThiTaoBaoCao()
    {

        $danhmucs = DanhMuc::all();

        return view('CuaHang.pages.QuanLyKho.TaoBaoCao.index',compact('danhmucs'));
    }

    public function taoBC(Request $request){

        $request->validate([
            ''
        ]);
    }
}
