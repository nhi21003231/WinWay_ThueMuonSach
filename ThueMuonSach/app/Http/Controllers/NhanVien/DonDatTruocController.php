<?php

namespace App\Http\Controllers\NhanVien;

use Illuminate\Http\Request;
use App\Http\Requests\ValidationFormRequest;


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

        // dd($request->all());

        $query = HoaDonThueAnPham::where('loaidon', 'Đặt trước')->orderBy('trangthai','asc');

        if ($request->sort == 'moinhat') {

            $hoaDons = $query->orderBy('ngaythue', 'desc')->paginate(7);

        }

        if ($request->sort == 'cunhat') {

            $hoaDons = $query->orderBy('ngaythue', 'asc')->paginate(7);

        }

        // Xử lý tìm kiếm
        if ($request->has('TimKiem') && $request->TimKiem != '') {

            $query->where(function($query) use ($request){

                $query->whereHas('chiTietHoaDons.dsAnPham.chiTietAnPham', function ($query) use ($request) {

                    $query->where('tenanpham', 'like', '%' . $request->TimKiem . '%');
    
                })->orWhereHas('khachHang', function ($query) use ($request) {
    
                    $query->where('hoten', 'like', '%' . $request->TimKiem . '%');
    
                });
            });

        }

        $hoaDons = $query->paginate(7);

        return view('CuaHang.pages.NhanVien.DonDatTruoc.index', compact('hoaDons'));
    }

    // Update Status Re-order
    public function updateStatus(Request $request){

        $hoaDon = HoaDonThueAnPham::find($request->orderID);

        // dd($hoaDon);

        $hoaDon->trangthai = 'Đang chờ sách';

        $hoaDon->save();

        return response()->json(['success' => 'Đơn đặt trước đã được xác nhận!']);
    }

    // Lấy thông tin chi tiết
    public function chiTietDonDatTruoc(HoaDonThueAnPham $hoaDonThue)
    {

        return view('CuaHang.pages.NhanVien.DonDatTruoc.chi-tiet-don-dat-truoc', compact('hoaDonThue'));
    }

    // Cập nhật đơn đặt trước

    public function capNhatDonDatTruoc(ValidationFormRequest $request, $id)
    {

        // dd($request->all());
        $request->validated();

        $anpham = DsAnPham::where('mactanpham',$request->id_ctanpham)
                            
                            ->where('dathue',0)->first();   

        
        $ctHoaDon = ChiTietHoaDonThue::create([
            'maanpham' => $anpham->maanpham,
            'mahoadon' => $id,
        ]);

        $ctHoaDon->save();

        $hoadon = HoaDonThueAnPham::find($id);

        $hoadon->ngaytra = now()->addDays(15);

        $hoadon->loaidon = $request->loaidon;

        $hoadon->trangthai = 'Đang thuê';

        $hoadon->mactanpham = Null;

        $hoadon->save();

        $anpham->dathue = 1;

        $anpham->save();
        // $hoadon->khachHang->hoten = $request->tenkhachhang;

        // $hoadon->khachHang->diachi = $request->diachi;

        // $hoadon->khachHang->save();

        // dd('update success');

        return redirect('nhan-vien/don-dat-truoc')->with('success', 'Cập nhật thành công');
    }
}
