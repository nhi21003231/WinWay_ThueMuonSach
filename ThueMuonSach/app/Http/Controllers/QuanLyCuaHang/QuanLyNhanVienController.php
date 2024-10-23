<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use Illuminate\Http\Request;

class QuanLyNhanVienController extends Controller
{
    public function hienThiQuanLyNhanVien()
    {
        // 23/10 sửa lại taikhoan
        // $nhanVienList = NhanVien::with('taikhoan')->get();
        $nhanVienList = NhanVien::all();
        return view('CuaHang.pages.QuanLyCuaHang.QuanLyNhanVien.index', compact('nhanVienList'));
    }
    public function deleteOneNhanVien($id)
    {
        // $nhanVien = NhanVien::find($id); // Tìm nhân viên theo ID

        // // Kiểm tra nếu nhân viên không tồn tại
        // if (!$nhanVien) {
        //     return redirect()->back()->with('error', 'Nhân viên không tồn tại.');
        // }

        // $nhanVien->delete(); // Xóa nhân viên

        // return redirect()->back()->with('success', 'Nhân viên đã được xóa thành công.');

        $nhanVien = NhanVien::findOrFail($id);
        $nhanVien->delete();

        return redirect()->back()->with('success', 'Nhân viên đã được xóa thành công.');
    }
}
