<?php

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use App\Models\HoaDonThueAnPham;
use App\Models\KhachHang;
use Illuminate\Http\Request;

class QuanLyKhachHangController extends Controller
{
    public function hienThiQuanLyKhachHang(Request $request)
    {

        if($request->TimKiem != ''){

            $khachHangs = KhachHang::where('hoten','like','%'.$request->TimKiem.'%')
                            
                                ->orwhere('email','like','%'.$request->TimKiem.'%')

                                ->orwhere('dienthoai','like','%'.$request->TimKiem.'%')

                                ->paginate(5);

        }else{

            $khachHangs = KhachHang::orderBy('hoten','asc')->paginate(5);

        }

        return view('CuaHang.pages.NhanVien.QuanLyKhachHang.index',compact('khachHangs'));

    }

    public function hienThiChiTietKhachHang()
    {

        return view('CuaHang.pages.NhanVien.QuanLyKhachHang.capnhatthongtin');

    }

    public function xoaKhachHang($id){

        $khachHang = KhachHang::where('makhachhang',$id)->first();

        $hoaDon = HoaDonThueAnPham::where('makhachhang',$khachHang->makhachhang)

                                    ->where('trangthai','Đang thuê')->get();

        if($hoaDon->isNotEmpty()){

            return redirect()->back()->with('error','Khách hàng vẫn còn đơn thuê không được xóa');

        }

        $khachHang->delete();
        
        return redirect('nhan-vien/quan-ly-khach-hang')->with('success','Xóa khách hàng thành công');

    }
}
