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
        if ($request->ajax()) {

            $query = HoaDonThueAnPham::where('loaidon', 'Đặt trước');

            if ($request->search == 'moinhat') {

                $hoaDons = $query->orderBy('ngaythue', 'desc')->paginate(8);

            } else if ($request->search === 'cunhat') {

                $hoaDons = $query->orderBy('ngaythue', 'asc')->paginate(8);

            } else {

                $hoaDons = $query->paginate(8);
            }

            return view('CuaHang.pages.NhanVien.DonDatTruoc.ajax-don-dat-truoc', compact('hoaDons'));
        }

        // Xử lý tìm kiếm
        if ($request->TimKiem != '') {

            $hoaDons = HoaDonThueAnPham::whereHas('chiTietHoaDons.dsAnPham.chiTietAnPham', function ($query) use ($request) {

                $query->where('tenanpham', 'like', '%' . $request->TimKiem . '%');

            })->orWhereHas('khachHang', function ($query) use ($request) {

                $query->where('hoten', 'like', '%' . $request->TimKiem . '%');

            })->paginate(7);
            
        } else {

            $hoaDons = HoaDonThueAnPham::where('loaidon', 'Đặt trước')->paginate(7);
        }

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
