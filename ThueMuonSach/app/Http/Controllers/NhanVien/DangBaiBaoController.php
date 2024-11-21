<?php

// namespace App\Http\Controllers\NhanVien;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class DangBaiBaoController extends Controller
// {
//     public function hienThiDangBaiBao()
//     {
//         return view('CuaHang.pages.NhanVien.DangBaiBao.index');
//     }
// }

namespace App\Http\Controllers\NhanVien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BaiBao;



class DangBaiBaoController extends Controller
{
    public function hienThiDangBaiBao()
    {
        $dsCTBaiBao = BaiBao ::with('nhanVien')->get();
        return view('CuaHang.pages.NhanVien.DangBaiBao.index', compact('dsCTBaiBao'));
    }
    public function xuLyNhapBaiBao(Request $request)
{
    // Kiểm tra hợp lệ dữ liệu
    $request->validate([
        'tieude' => 'required|string|max:255',
        'noidung' => 'required|string',
        'manhanvien' => 'required|exists:NhanVien,manhanvien',
        'hinhanh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra hình ảnh
    ]);

    try {
        // Tạo mới bài báo
        $baibao = new BaiBao();
        $baibao->tieude = $request->input('tieude');
        $baibao->noidung = $request->input('noidung');
        $baibao->manhanvien = $request->input('manhanvien');
        $baibao->ngaydang = now();

        // Xử lý upload hình ảnh
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img/anh-bai-bao/'), $filename); // Di chuyển file vào thư mục
            $baibao->hinhanh = $filename; // Lưu tên file vào CSDL
        }

        // Lưu thông tin bài báo
        $baibao->save();

        return redirect()->route('route-cuahang-nhanvien-dangbaibao')->with('success', 'Đăng bài báo mới thành công!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Đã xảy ra lỗi khi đăng bài báo: ' . $e->getMessage());
    }
}
    public function thembaibao()
    {
        // Trả về view để hiển thị form thêm bài báo
        return view('CuaHang.pages.NhanVien.DangBaiBao.thembaibao');    }
        
    public function suabaibao(Request $request)
{
    // Giả sử bạn nhận tiêu đề từ request
    $tieude = $request->input('tieude');
    
    // Tìm bài báo theo tiêu đề
    $baiBao = BaiBao::where('tieude', $tieude)->firstOrFail();
    
    return view('CuaHang.pages.NhanVien.DangBaiBao.suabaibao', compact('baiBao'));
}

public function update(Request $request)
{
    // Kiểm tra hợp lệ dữ liệu
    $request->validate([
        'tieude' => 'required|string|max:255',
        'noidung' => 'required|string',
        'manhanvien' => 'required|exists:NhanVien,manhanvien',
        'hinhanh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Thêm validation cho hình ảnh
    ], [
        'manhanvien.exists' => 'Mã nhân viên không tồn tại. Vui lòng kiểm tra lại.', // Thông báo tùy chỉnh cho lỗi mã nhân viên
        'hinhanh.image' => 'Vui lòng chọn một hình ảnh hợp lệ.', // Thông báo cho hình ảnh không hợp lệ
    ]);

    // Tìm bài báo theo tiêu đề
    $suabaibao = BaiBao::where('tieude', $request->input('tieude'))->firstOrFail();

    try {
        $suabaibao->noidung = $request->input('noidung');
        $suabaibao->manhanvien = $request->input('manhanvien');
        $suabaibao->ngaydang = now();

        // Kiểm tra nếu có hình ảnh mới
        if ($request->hasFile('hinhanh')) {
            // Xóa hình ảnh cũ nếu có
            if ($suabaibao->hinhanh) {
                $oldImagePath = public_path('img/anh-bai-bao/' . $suabaibao->hinhanh);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath); // Xóa file cũ
                }
            }

            // Lưu hình ảnh mới
            $image = $request->file('hinhanh');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/anh-bai-bao'), $imageName);

            $suabaibao->hinhanh = $imageName; // Cập nhật tên hình ảnh mới
        }

        $suabaibao->save();

        return redirect()->route('route-cuahang-nhanvien-dangbaibao')->with('success', 'Cập nhật bài báo thành công!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Đã xảy ra lỗi khi cập nhật bài báo!');
    }
}

public function destroy($tieude)
{
    // Tìm bài báo theo tiêu đề
    $xoabaibao = BaiBao::where('tieude', $tieude)->first();

    if ($xoabaibao) {
        // Xóa bài báo
        $xoabaibao->delete();

        // Chuyển hướng về trang danh sách với thông báo thành công
        return redirect()->route('route-cuahang-nhanvien-dangbaibao')->with('success', 'Đã xóa bài báo thành công.');
    }

    // Nếu không tìm thấy bài báo
    return redirect()->route('route-cuahang-nhanvien-dangbaibao')->with('error', 'Không tìm thấy bài báo.');
}
}

