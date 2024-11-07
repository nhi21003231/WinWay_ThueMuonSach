<?php

namespace App\Http\Controllers\QuanLyKho;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use Illuminate\Http\Request;

class QuanLyDanhMucController extends Controller
{
    public function hienThiQuanLyDanhMuc()
    {
        $dsDanhMuc = DanhMuc::all();
        return view('CuaHang.pages.QuanLyKho.QuanLyDanhMuc.index', compact('dsDanhMuc'));
    }

    public function hienThiThemDanhMuc()
    {
        return view('CuaHang.pages.QuanLyKho.QuanLyDanhMuc.them-danh-muc');
    }

    public function xuLyThemDanhMuc(Request $request)
    {
        // Xác thực dữ liệu
        $request->validate([
            'tendanhmuc' => 'required|string|max:100|unique:danhmuc,tendanhmuc',
            'mota' => 'nullable|string|max:1000',
        ], [
            'tendanhmuc.required' => 'Tên danh mục là bắt buộc.',
            'tendanhmuc.string' => 'Tên danh mục phải là chuỗi ký tự.',
            'tendanhmuc.max' => 'Tên danh mục không được vượt quá 100 ký tự.',
            'tendanhmuc.unique' => 'Tên danh mục đã tồn tại, vui lòng chọn tên khác.',

            'mota.string' => 'Mô tả phải là chuỗi ký tự.',
            'mota.max' => 'Mô tả không được vượt quá 1000 ký tự.',
        ]);


        try {
            // Tạo danh mục mới
            DanhMuc::create([
                'tendanhmuc' => $request->input('tendanhmuc'),
                'mota' => $request->input('mota'),
            ]);

            // Điều hướng với thông báo thành công
            return redirect()->route('route-cuahang-quanlykho-quanlydanhmuc')
                ->with('success', 'Thêm danh mục thành công!');
        } catch (\Exception $e) {
            // Xử lý lỗi và trả về với thông báo lỗi
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi thêm danh mục!');
        }
    }

    public function hienThiCapNhatDanhMuc($madanhmuc)
    {
        $danhMuc = DanhMuc::findOrFail($madanhmuc);
        return view('CuaHang.pages.QuanLyKho.QuanLyDanhMuc.cap-nhat-danh-muc', compact('danhMuc'));
    }


    public function xuLyCapNhatDanhMuc(Request $request, $madanhmuc)
    {
        // Xác thực dữ liệu
        $request->validate([
            'tendanhmuc' => 'required|string|max:100|unique:danhmuc,tendanhmuc,' . $madanhmuc . ',madanhmuc',
            'mota' => 'nullable|string|max:1000',
        ], [
            'tendanhmuc.required' => 'Tên danh mục là bắt buộc.',
            'tendanhmuc.string' => 'Tên danh mục phải là chuỗi ký tự.',
            'tendanhmuc.max' => 'Tên danh mục không được vượt quá 100 ký tự.',
            'tendanhmuc.unique' => 'Tên danh mục đã tồn tại, vui lòng chọn tên khác.',
            
            'mota.string' => 'Mô tả phải là chuỗi ký tự.',
            'mota.max' => 'Mô tả không được vượt quá 1000 ký tự.',
        ]);

        try {
            // Lấy danh mục cần cập nhật
            $danhMuc = DanhMuc::findOrFail($madanhmuc);

            // Cập nhật thông tin
            $danhMuc->update([
                'tendanhmuc' => $request->input('tendanhmuc'),
                'mota' => $request->input('mota'),
            ]);

            // Điều hướng với thông báo thành công
            return redirect()->route('route-cuahang-quanlykho-quanlydanhmuc')
                ->with('success', 'Cập nhật danh mục thành công!');
        } catch (\Exception $e) {
            // Xử lý lỗi và trả về với thông báo lỗi
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi cập nhật danh mục!');
        }
    }
}
