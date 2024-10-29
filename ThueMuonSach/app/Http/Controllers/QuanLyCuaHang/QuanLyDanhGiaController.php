<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use App\Models\DanhGia;
use Illuminate\Http\Request;

class QuanLyDanhGiaController extends Controller
{
    public function hienThiDanhGia()
    {
        $danhgiaList = DanhGia::all();
        return view('CuaHang.pages.QuanLyCuaHang.QuanLyDanhGia.index', compact('danhgiaList'));
    }

    public function suaDanhGia(Request $request)
    {
        // Lặp qua các đánh giá được gửi từ form
        foreach ($request->input('id') as $index => $madanhgia) {
            // Lấy thông tin đánh giá theo ID
            $danhgia = DanhGia::find($madanhgia);

            // Nếu đánh giá tồn tại, thực hiện cập nhật
            if ($danhgia) {
                $danhgia->binhluan = $request->input('binhluan')[$index];
                $danhgia->trangthai = $request->input('trangthai')[$index];
                $danhgia->sosao = $request->input('sosao')[$index];
                $danhgia->ngaydanhgia = $request->input('ngaydanhgia')[$index];
                $danhgia->save(); // Lưu thay đổi vào cơ sở dữ liệu
            }
        }

        // Sau khi cập nhật, chuyển hướng về trang quản lý đánh giá và hiển thị thông báo
        return redirect()->back()->with('success', 'Cập nhật đánh giá thành công.');
    }
}
