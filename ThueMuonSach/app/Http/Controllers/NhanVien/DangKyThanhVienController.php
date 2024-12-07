<?php

namespace App\Http\Controllers\NhanVien;

use App\Exports\CustomerExport;
use App\Http\Controllers\Controller;
use App\Models\HoaDonThueAnPham;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use App\Http\Requests\ValidationFormUpdateKH;
use Maatwebsite\Excel\Facades\Excel;


class DangKyThanhVienController extends Controller
{


    public function hienThiDangKyThanhVien(Request $request)
    {

        if ($request->TimKiem != '') {

            $khachHangs = KhachHang::where('hoten', 'like', '%' . $request->TimKiem . '%')

                ->orwhere('email', 'like', '%' . $request->TimKiem . '%')

                ->orwhere('dienthoai', 'like', '%' . $request->TimKiem . '%')

                ->paginate(7);
        } else {

            $khachHangs = KhachHang::orderBy('hoten', 'asc')->paginate(7);
        }

        return view('CuaHang.pages.NhanVien.DangKyThanhVien.index', compact('khachHangs'));
    }
    
    public function exportExcel(){

        return Excel::download(new CustomerExport, 'customers-excel.xlsx');
        
    }
    //cap nhật thành viên
    public function capnhatThanhVien(Request $request, $makhachhang)
    {
        // Tìm khách hàng theo ID
        $khachHang = KhachHang::find($makhachhang);

        if (!$khachHang) {
            return redirect()->back()->with('error', 'Khách hàng không tồn tại.');
        }

        // Cập nhật trạng thái thành viên
        $khachHang->lathanhvien = $request->has('lathanhvien') ? 1 : 0;

        // Lưu thay đổi vào cơ sở dữ liệu
        $khachHang->save();

        return redirect()->back()->with('success', 'Cập nhật trạng thái thành viên thành công.');
    }
    
}
