<?php

namespace App\Http\Controllers\QuanLyKho;

use App\Http\Controllers\Controller;
use App\Models\ChiTietAnPham;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuanLyAnPhamController extends Controller
{
    public function hienThiQuanLyAnPham()
    {
        // Lấy danh sách ấn phẩm cùng với thông tin chi tiết ấn phẩm và danh mục liên quan
        $dsCTAnPham = ChiTietAnPham::all();

        return view('CuaHang.pages.QuanLyKho.QuanLyAnPham.index', compact('dsCTAnPham'));
    }


    public function hienThiCapNhatThongTin($mactanpham)
    {
        $CTAnPham = ChiTietAnPham::where('mactanpham', $mactanpham)->firstOrFail();
        $dsDanhMuc = DanhMuc::all();
        return view('CuaHang.pages.QuanLyKho.QuanLyAnPham.cap-nhat-thong-tin-an-pham', compact('CTAnPham', 'dsDanhMuc'));
    }

    public function xuLyCapNhatThongTinAnPham(Request $request, $mactanpham)
    {
        // Xác định ấn phẩm cần cập nhật
        $CTAnPham = ChiTietAnPham::where('mactanpham', $mactanpham)->firstOrFail();

        // Kiểm tra hợp lệ của dữ liệu nhập vào
        $request->validate([
            'tenanpham' => 'required|string|max:100',
            'tacgia' => 'nullable|string|max:100',
            'namxuatban' => 'nullable|integer|between:1800,' . date('Y'),
            'madanhmuc' => 'required|exists:danhmuc,madanhmuc',
            'fileanh' => 'nullable|image|max:2048'
        ], [
            'tenanpham.required' => 'Vui lòng nhập tên ấn phẩm.',
            'tenanpham.string' => 'Tên ấn phẩm phải là một chuỗi văn bản.',
            'tenanpham.max' => 'Tên ấn phẩm không được vượt quá 100 ký tự.',

            'tacgia.string' => 'Tên tác giả phải là một chuỗi văn bản.',
            'tacgia.max' => 'Tên tác giả không được vượt quá 100 ký tự.',

            'namxuatban.integer' => 'Năm xuất bản phải là một số.',
            'namxuatban.between' => 'Năm xuất bản phải nằm trong khoảng từ 1800 đến năm hiện tại.',

            'madanhmuc.required' => 'Vui lòng chọn danh mục.',
            'madanhmuc.exists' => 'Danh mục không tồn tại.',

            'fileanh.required' => 'Vui lòng chọn một ảnh.',
            'fileanh.image' => 'File phải là định dạng ảnh.',
            'fileanh.max' => 'Dung lượng ảnh không được vượt quá 2MB.'
        ]);

        try {
            // Cập nhật thông tin ấn phẩm
            $CTAnPham->tenanpham = $request->input('tenanpham');
            $CTAnPham->tacgia = $request->input('tacgia');
            $CTAnPham->namxuatban = $request->input('namxuatban');
            $CTAnPham->madanhmuc = $request->input('madanhmuc');

            // Kiểm tra và cập nhật ảnh mới nếu có
            if ($request->hasFile('fileanh')) {
                $file = $request->file('fileanh');
                $extension = $file->getClientOriginalExtension();
                $newFileName = Str::slug($request->input('tenanpham'), '_') . '_' . time() . '.' . $extension;

                // Lưu ảnh mới và xóa ảnh cũ
                $destinationPath = public_path('img/anh-an-pham');
                $file->move($destinationPath, $newFileName);
                if ($CTAnPham->hinhanh && file_exists($destinationPath . '/' . $CTAnPham->hinhanh)) {
                    // -----------------------------------------------------------------------------------------------------------tạm thời không xóa ảnh cũ
                    // unlink($destinationPath . '/' . $CTAnPham->hinhanh);
                }
                $CTAnPham->hinhanh = $newFileName;
            }

            // Lưu thay đổi
            $CTAnPham->save();

            return redirect()->route('route-cuahang-quanlykho-quanlyanpham')->with('success', 'Cập nhật thông tin ấn phẩm thành công!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi nhập ấn phẩm!');
        }
    }
}
