<?php

namespace App\Http\Controllers\NhanVien;

use App\Models\KhachHang;
use App\Models\HoaDonThue;
use App\Http\Controllers\Controller;
use App\Models\AnPham;
use Illuminate\Http\Request;

class DonDacTruocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function hienThiDonDacTruoc(Request $request)
    {
    //    $hoadon = $request->TimKiem;
    //    $a = $hoadon['TimKiem'];
        if($request->TimKiem != '')
        {
            $khachhang = KhachHang::where('name','like','%'.$request->TimKiem.'%')->get();
            $anpham = AnPham::where('name','like','%'.$request->TimKiem.'%')->get();
            $hoadon = $hoadon = HoaDonThue::where('LoaiDon','Đơn đặt trước')
                                            ->whereIn('id_khachhang',$khachhang->pluck('id'))
                                            ->orWhereIn('id_anpham',$anpham->pluck('id'))->paginate(8);
        }
        else
        {
            $hoadon = HoaDonThue::where('LoaiDon','Đơn đặt trước')->paginate(8);
        }
        // $khachhang = KhachHang::where('name','like','Isai Luettgen')->get();
        // $hoadon = HoaDonThue::whereIn('id_khachhang',$khachhang->pluck('id'))->where('LoaiDon','Đơn đặt trước')->paginate(8);
        // dd($hoadon);

        return view('CuaHang.pages.NhanVien.DonDacTruoc.index',compact('hoadon'));
    }

    // Lấy thông tin chi tiết
    public function chiTietDonDatTruoc(HoaDonThue $hoaDonThue){

        return view('CuaHang.pages.NhanVien.DonDacTruoc.chi-tiet-don-dat-truoc',compact('hoaDonThue'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HoaDonThue $hoaDonThue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HoaDonThue $hoaDonThue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HoaDonThue $hoaDonThue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HoaDonThue $hoaDonThue)
    {
        //
    }
}
