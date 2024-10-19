<?php

namespace App\Http\Controllers;

use App\Models\HoaDonThue;
use App\Models\KhachHang;
use Illuminate\Http\Request;

class DonDatTruocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $khachhang = KhachHang::where('name','like','Isai Luettgen')->get();
        // $hoadon = HoaDonThue::whereIn('id_khachhang',$khachhang->pluck('id'))->where('LoaiDon','Đơn đặt trước')->paginate(8);
        $hoadon = HoaDonThue::where('LoaiDon','Đơn đặt trước')->paginate(8);
        // dd($hoadon);
        return view('NhanVienThueTra.re-order',compact('hoadon'));
    }
    // Lấy thông tin chi tiết

    public function reOrderDetail(HoaDonThue $hoaDonThue){

        return view('NhanVienThueTra.re-order-detail',compact('hoaDonThue'));
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
