<?php

namespace App\Http\Controllers\NhanVien;

use Illuminate\Http\Request;
use App\Http\Requests\ValidationFormRequest;


use App\Models\HoaDonThueAnPham;
use App\Http\Controllers\Controller;


class DonDatTruocController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function hienThiDonDatTruoc(Request $request)
    {

        // dd($request->all());

        $query = HoaDonThueAnPham::where('loaidon', 'Đặt trước')->where('trangthai', 'Đang thuê');

        if ($request->sort == 'moinhat') {

            $hoaDons = $query->orderBy('ngaythue', 'desc')->paginate(5);

        }

        if ($request->sort == 'cunhat') {

            $hoaDons = $query->orderBy('ngaythue', 'asc')->paginate(5);

        }

        // Xử lý tìm kiếm
        if ($request->has('TimKiem') && $request->TimKiem != '') {

            $query->whereHas('chiTietHoaDons.dsAnPham.chiTietAnPham', function ($query) use ($request) {

                $query->where('tenanpham', 'like', '%' . $request->TimKiem . '%');

            })->orWhereHas('khachHang', function ($query) use ($request) {

                $query->where('hoten', 'like', '%' . $request->TimKiem . '%');

            })->paginate(5);

        }

        $hoaDons = $query->paginate(5);

        return view('CuaHang.pages.NhanVien.DonDatTruoc.index', compact('hoaDons'));
    }


    // Lấy thông tin chi tiết
    public function chiTietDonDatTruoc(HoaDonThueAnPham $hoaDonThue)
    {

        return view('CuaHang.pages.NhanVien.DonDatTruoc.chi-tiet-don-dat-truoc', compact('hoaDonThue'));
    }

    // Cập nhật đơn đặt trước

    public function capNhatDonDatTruoc(ValidationFormRequest $request, $id)
    {

        $request->validated();

        $hoadon = HoaDonThueAnPham::find($id);

        $hoadon->loaidon = $request->loaidon;

        $hoadon->save();

        $hoadon->khachHang->hoten = $request->tenkhachhang;

        $hoadon->khachHang->diachi = $request->diachi;

        $hoadon->khachHang->save();

        // dd('update success');

        return redirect('nhan-vien/don-dat-truoc')->with('success', 'Cập nhật thành công');
    }
}
