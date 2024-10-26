<?php

namespace App\Http\Controllers\NhanVien;

use App\Models\KhachHang;
use App\Models\HoaDonThue;
use App\Http\Controllers\Controller;
use App\Models\AnPham;
use Illuminate\Http\Request;

class DonDatTruocController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function hienThiDonDatTruoc(Request $request)
    {
        // $hoadon = HoaDonThue::find(1);
        // $khachhang = $hoadon->khachhang;
        // dd($khachhang);
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

        return view('CuaHang.pages.NhanVien.DonDatTruoc.index',compact('hoadon'));
    }

    // Lấy thông tin chi tiết
    public function chiTietDonDatTruoc(HoaDonThue $hoaDonThue){

        return view('CuaHang.pages.NhanVien.DonDatTruoc.chi-tiet-don-dat-truoc',compact('hoaDonThue'));

    }

    // Cập nhật đơn đặt trước

    public function capNhatDonDatTruoc(Request $request, $id){

        $request->validate([

            'tenkhachhang'=>'required',

            'loaidon' =>'required'

        ]);

        $hoadon = HoaDonThue::find($id);
    
        if(!$hoadon){

            return redirect()->back()->withErrors(['error','Hóa đơn không tồn tại']);

        }

        $hoadon->LoaiDon = $request->loaidon;

        $hoadon->save();

        $hoadon->khachhang->name = $request->tenkhachhang;

        $hoadon->khachhang->save();

        // dd('update success');

        return redirect('nhan-vien/don-dat-truoc')->with('success','Cập nhật thành công');
    }


}
