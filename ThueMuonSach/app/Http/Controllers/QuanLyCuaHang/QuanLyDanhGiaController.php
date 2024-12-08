<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use App\Models\DanhGia;
use Illuminate\Http\Request;

class QuanLyDanhGiaController extends Controller
{
    public function hienThiDanhGia(Request $request)
    {
        $keyword = $request->input('keyword');

        $danhgiaList = DanhGia::with(['dsanpham.chitietanpham', 'khachhang'])
            ->when($keyword, function ($query, $keyword) {
                $query->where('madanhgia', 'like', '%' . $keyword . '%')
                    ->orWhere('maanpham', 'like', '%' . $keyword . '%')
                    ->orWhere('makhachhang', 'like', '%' . $keyword . '%')
                    ->orWhere('binhluan', 'like', '%' . $keyword . '%')
                    ->orWhere('sosao', 'like', '%' . $keyword . '%')
                    ->orWhere('ngaydanhgia', 'like', '%' . $keyword . '%')
                    ->orWhereHas('dsanpham.chitietanpham', function ($query) use ($keyword) {
                        $query->where('tenanpham', 'like', '%' . $keyword . '%');
                    })
                    ->orWhereHas('khachhang', function ($query) use ($keyword) {
                        $query->where('hoten', 'like', '%' . $keyword . '%');
                    });
            })
            ->get();

        $message = $danhgiaList->isEmpty() ? 'Không có dữ liệu' : null;
        return view('CuaHang.pages.QuanLyCuaHang.QuanLyDanhGia.index', compact('danhgiaList', 'message'));
    }

    public function suaDanhGia(Request $request)
    {
        // Lặp qua các đánh giá được gửi từ form
        foreach ($request->input('id') as $index => $madanhgia) {
            // Lấy thông tin đánh giá theo ID
            $danhgia = DanhGia::find($madanhgia);

            // Nếu đánh giá tồn tại, thực hiện cập nhật
            if ($danhgia) {
                // Xây dựng mảng dữ liệu và quy tắc cho từng trường
                $dataToValidate = [];
                $rules = [];

                // Kiểm tra và validate trường số sao
                $sosao = $request->input('sosao')[$index];
                if (!is_numeric($sosao) || $sosao < 1 || $sosao > 5) {
                    return redirect()->back()->with('error', 'Số sao phải là một số từ 1 đến 5.');
                }

                // Nếu validate thành công, tiếp tục cập nhật các trường còn lại
                $danhgia->binhluan = $request->input('binhluan')[$index];
                $danhgia->trangthai = $request->input('trangthai')[$index];
                $danhgia->sosao = $sosao;
                $danhgia->ngaydanhgia = $request->input('ngaydanhgia')[$index];

                // Lưu thay đổi vào cơ sở dữ liệu
                $danhgia->save();
            }
        }

        // Sau khi cập nhật, chuyển hướng về trang quản lý đánh giá và hiển thị thông báo
        return redirect()->back()->with('success', 'Cập nhật đánh giá thành công.');
    }


    public function xoaDanhGia($id)
    {
        // Tìm đánh giá cần xóa
        $danhGia = DanhGia::findOrFail($id);

        // Xóa đánh giá
        $danhGia->delete();

        // Trả về thông báo thành công
        return redirect()->back()->with('success', 'Đánh giá đã được xóa thành công.');
    }
}
