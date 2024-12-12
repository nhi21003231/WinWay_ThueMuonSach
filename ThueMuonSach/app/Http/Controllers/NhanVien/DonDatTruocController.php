<?php

namespace App\Http\Controllers\NhanVien;

use Illuminate\Http\Request;
use App\Http\Requests\ValidationFormRequest;


use App\Models\HoaDonThueAnPham;
use App\Http\Controllers\Controller;
use App\Models\ChiTietHoaDonThue;
use App\Models\DsAnPham;
use Illuminate\Support\Facades\Auth;

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

            $hoaDons = $query->orderBy('ngaythanhtoan', 'desc')->paginate(7);
        }

        if ($request->sort == 'cunhat') {

            $hoaDons = $query->orderBy('ngaythanhtoan', 'asc')->paginate(7);
        }

        // Xử lý tìm kiếm
        if ($request->has('TimKiem') && $request->TimKiem != '') {

            $query->where(function ($query) use ($request) {

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
    public function updateStatus(Request $request)
    {

        $hoaDon = HoaDonThueAnPham::find($request->orderID);

        // dd($hoaDon);
        $manhanvien = Auth::user()->nhanVien->manhanvien;

        $hoaDon->trangthai = 'Đang chờ sách';
        $hoaDon->manhanvien = $manhanvien;

        $hoaDon->save();

        return response()->json(['success' => 'Đơn đặt trước đã được xác nhận!']);
    }

    // Lấy thông tin chi tiết
    public function chiTietDonDatTruoc(HoaDonThueAnPham $hoaDonThue)
    {

        return view('CuaHang.pages.NhanVien.DonDatTruoc.chi-tiet-don-dat-truoc', compact('hoaDonThue'));
    }

    public function moveTypeOrderQuickly(Request $request)
    {

        $hoaDon = HoaDonThueAnPham::where('mahoadon', $request->orderID)->first();

        $anpham = DsAnPham::where('mactanpham', $hoaDon->mactanpham)

                    ->where('dathue', 0)

                    ->where('dathanhly',0)

                    ->where('tinhtrang','<>','Hư hỏng')

                    ->first();

        $ctHoaDon = ChiTietHoaDonThue::create([
            'maanpham' => $anpham->maanpham,
            'mahoadon' => $request->orderID,
        ]);

        $ctHoaDon->save();

        $hoaDon->ngaythue = now();

        $hoaDon->ngaytra = now()->addDays(15);

        $hoaDon->loaidon = 'Đơn thuê';

        $hoaDon->trangthai = 'Đang thuê';

        $hoaDon->mactanpham = Null;

        $hoaDon->save();

        $anpham->dathue = 1;

        $anpham->save();

        return response()->json(['success'=>'Đơn hàng đã được chuyển thành đơn thuê.']);
    }
    // Cập nhật đơn đặt trước

    public function capNhatDonDatTruoc(ValidationFormRequest $request, $id)
    {


        $anpham = DsAnPham::where('mactanpham', $request->id_ctanpham)

                 ->where('dathue', 0)

                ->where('dathanhly',0)
                    
                ->where('tinhtrang','<>','Hư hỏng')

                ->first();

        $ctHoaDon = ChiTietHoaDonThue::create([
            'maanpham' => $anpham->maanpham,
            'mahoadon' => $id,
        ]);

        $ctHoaDon->save();

        $hoaDon = HoaDonThueAnPham::find($id);

        $hoaDon->ngaythue = now();

        $hoaDon->ngaytra = now()->addDays(15);

        $hoaDon->loaidon = $request->loaidon;

        $hoaDon->trangthai = 'Đang thuê';

        $hoaDon->mactanpham = Null;

        $hoaDon->save();

        $anpham->dathue = 1;

        $anpham->save();
        // $hoadon->khachHang->hoten = $request->tenkhachhang;

        // $hoadon->khachHang->diachi = $request->diachi;

        // $hoadon->khachHang->save();

        // dd('update success');

        return redirect('nhan-vien/don-dat-truoc')->with('success', 'Cập nhật thành công');
    }
}
