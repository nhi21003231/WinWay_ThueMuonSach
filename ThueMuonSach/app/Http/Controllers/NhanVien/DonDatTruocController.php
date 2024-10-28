<?php

namespace App\Http\Controllers\NhanVien;
use Illuminate\Http\Request;
use App\Http\Requests\ValidationFormRequest;

use App\Models\KhachHang;
use App\Models\HoaDonThueAnPham;
use App\Http\Controllers\Controller;
use App\Models\ChiTietAnPham;
use App\Models\ChiTietHoaDonThue;
use App\Models\DsAnPham;

class DonDatTruocController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function hienThiDonDatTruoc(Request $request)
    {
        // $hoadon = HoaDonThueAnPham::find(1);
        // $khachhang = $hoadon->khachhang->hoten;
        // dd($khachhang);
    //    $hoadon = $request->TimKiem;
    //    $a = $hoadon['TimKiem'];
        if($request->TimKiem != '')
        {

            $khachhang = KhachHang::where('hoten','like','%'.$request->TimKiem.'%')->get();

            $chiTietAnPham = ChiTietAnPham::where('tenanpham','like','%'.$request->TimKiem.'%')->get();

            // $anpham = DsAnPham::where('mactanpham',$chiTietAnPham->mactanpham)->get();
            
            foreach ($chiTietAnPham as $item) {

                $ctHD = ChiTietHoaDonThue::where('maanpham',$item->anPham->maanpham)->get();

                // foreach($ctHD as $item){
                    $hoadon = $hoadon = HoaDonThueAnPham::where('loaidon','Đặt trước')
            
                                            ->whereIn('mahoadon',$ctHD->pluck('mahoadon'))

                                            ->whereIn('makhachhang',$khachhang->pluck('makhachhang'))

                                            ->paginate(8);
                dd($ctHD->pluck('mahoadon'));
                // }
            }

            

                                            // ->orWhereIn('maanpham',$anpham->pluck('maanpham'))->paginate(8);
        }
        else
        {

            $hoadon = HoaDonThueAnPham::where('loaidon','Đặt trước')->paginate(8);

        }
        // $khachhang = KhachHang::where('name','like','Isai Luettgen')->get();
        // $hoadon = HoaDonThueAnPham::whereIn('id_khachhang',$khachhang->pluck('id'))->where('LoaiDon','Đơn đặt trước')->paginate(8);
        // dd($hoadon);

        return view('CuaHang.pages.NhanVien.DonDatTruoc.index',compact('hoadon'));
    }

    // Lấy thông tin chi tiết
    public function chiTietDonDatTruoc(HoaDonThueAnPham $hoaDonThue){

        return view('CuaHang.pages.NhanVien.DonDatTruoc.chi-tiet-don-dat-truoc',compact('hoaDonThue'));

    }

    // Cập nhật đơn đặt trước

    public function capNhatDonDatTruoc(ValidationFormRequest $request, $id){

        $request->validated();

        $hoadon = HoaDonThueAnPham::find($id);

        $hoadon->loaidon = $request->loaidon;

        $hoadon->save();

        $hoadon->khachhang->hoten = $request->tenkhachhang;

        $hoadon->khachhang->save();

        // dd('update success');

        return redirect('nhan-vien/don-dat-truoc')->with('success','Cập nhật thành công');
    }


}
