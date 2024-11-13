<?php

namespace App\Http\Controllers\QuanLyKho;

use App\Exports\ReportExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\ChiTietAnPham;
use App\Models\ChiTietHoaDonThue;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TaoBaoCaoController extends Controller
{
    public function hienThiTaoBaoCao()
    {

        $danhmucs = DanhMuc::all();

        return view('CuaHang.pages.QuanLyKho.TaoBaoCao.index', compact('danhmucs'));
    }

    public function taoBC(ReportRequest $request)
    {

        $request->validated();

        // ------------Báo cáo số lượng

        if (in_array($request->loaibc,['BCSL','BCHH','BCTSSD'])) {

            $query = ChiTietAnPham::orderBy('mactanpham','desc');

            if (isset($request->danhmuc)) {

                $query->where('madanhmuc', $request->danhmuc);
            }

            if (isset($request->startdate)) {

                $query->where('created_at', '>=', $request->startdate);
            }

            // dd($query->get());
            if(isset($request->enddate)){

                $query->where('created_at','<=',$request->enddate);

            }

            $anphams = $query->get();
    
        }

        $loaibcs = $request->loaibc;

        if($request->has('export_excel') && $request->export_excel == 1){

            return Excel::download(new ReportExport($anphams,$loaibcs), 'Report_' .$loaibcs. '.xlsx');
        }

        return view('CuaHang.pages.QuanLyKho.TaoBaoCao.table-report', compact('anphams','loaibcs'));
    }
}
