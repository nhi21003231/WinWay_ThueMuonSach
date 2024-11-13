<?php

namespace App\Http\Controllers\NhanVien;

use App\Exports\CustomerExport;
use App\Http\Controllers\Controller;
use App\Models\HoaDonThueAnPham;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use App\Http\Requests\ValidationFormUpdateKH;
use Maatwebsite\Excel\Facades\Excel;
class QuanLyKhachHangController extends Controller
{
    public function hienThiQuanLyKhachHang(Request $request)
    {

        if ($request->TimKiem != '') {

            $khachHangs = KhachHang::where('hoten', 'like', '%' . $request->TimKiem . '%')

                ->orwhere('email', 'like', '%' . $request->TimKiem . '%')

                ->orwhere('dienthoai', 'like', '%' . $request->TimKiem . '%')

                ->paginate(7);
        } else {

            $khachHangs = KhachHang::orderBy('hoten', 'asc')->paginate(7);
        }

        return view('CuaHang.pages.NhanVien.QuanLyKhachHang.index', compact('khachHangs'));
    }

    public function hienThiChiTietKhachHang()
    {

        return view('CuaHang.pages.NhanVien.QuanLyKhachHang.capnhatthongtin');
    }

    // Lấy thông tin khách hàng

    public function layThongTinKH(Request $request)
    {

        $khachHang = KhachHang::where('makhachhang', $request->eventID)->get();

        // dd($request->all());

        return view('CuaHang.pages.NhanVien.QuanLyKhachHang.modal-ajax', compact('khachHang'));
    }

    // Cập nhật thông tin khách hàng
    public function capNhatThongTinKH(ValidationFormUpdateKH $request)
    {

        $request->validated();

            $khachHang = KhachHang::FindOrFail($request->customerID);

            $khachHang->hoten = $request->tenkh;

            $khachHang->dienthoai = $request->sdtkh;

            $khachHang->email = $request->email;

            $khachHang->diachi = $request->diachi;

            $khachHang->save();

            return response()->json(['success' => true, 'message' => 'Cập nhật thành công']);

    }

    public function xoaKhachHang($id)
    {

        $khachHang = KhachHang::where('makhachhang', $id)->first();

        $hoaDon = HoaDonThueAnPham::where('makhachhang', $khachHang->makhachhang)

            ->where('trangthai', 'Đang thuê')->get();

        if ($hoaDon->isNotEmpty()) {

            return redirect()->back()->with('error', 'Khách hàng vẫn còn đơn thuê không được xóa');
        }

        $khachHang->delete();

        return redirect('nhan-vien/quan-ly-khach-hang')->with('success', 'Xóa khách hàng thành công');
    }

    // -------------Xuất file Excel
    public function exportExcel(){

        return Excel::download(new CustomerExport, 'customers-excel.xlsx');
        
    }
}
