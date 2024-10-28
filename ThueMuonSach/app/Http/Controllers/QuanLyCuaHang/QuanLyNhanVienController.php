<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuanLyNhanVienController extends Controller
{
    public function hienThiQuanLyNhanVien(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ yêu cầu
        $keyword = $request->input('keyword');

        // Tạo query cơ bản để tìm kiếm
        $query = NhanVien::query();

        // Nếu có từ khóa tìm kiếm, thêm điều kiện tìm kiếm vào query
        if ($keyword) {
            $query->where(function ($query) use ($keyword) {
                $query->where('manhanvien', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('hoten', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('email', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('sodienthoai', 'LIKE', '%' . $keyword . '%')
                    ->orWhereHas('taikhoan', function ($q) use ($keyword) {
                        $q->where('tentaikhoan', 'LIKE', '%' . $keyword . '%')
                            ->orWhere('vaitro', 'LIKE', '%' . $keyword . '%'); // Tìm kiếm theo vaitro
                    });
            });
        }

        // Thực hiện truy vấn và lấy kết quả
        $nhanvienList = $query->get();

        // Trả về view với danh sách nhân viên
        return view('CuaHang.pages.QuanLyCuaHang.QuanLyNhanVien.index', compact('nhanvienList'));
    }


    public function themNhanVien(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'hoTen' => 'required|string|max:255',
            'email' => 'required|email|unique:nhanvien,email',
            'soDienThoai' => 'required|string|max:15',
            'tenTaiKhoan' => 'required|string|max:255|unique:taikhoan,tentaikhoan',
            'matKhau' => 'required|string',
            'chucVu' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Tạo tài khoản cho nhân viên
        $taikhoan = new TaiKhoan(); // Thay đổi tên lớp cho phù hợp
        $taikhoan->tentaikhoan = $request->tenTaiKhoan;
        // $taikhoan->matkhau = bcrypt($request->matKhau); // Mã hóa mật khẩu
        $taikhoan->matkhau = $request->matKhau;
        $taikhoan->vaitro = $request->chucVu; // Chức vụ
        $taikhoan->save();

        // Tạo nhân viên
        $nhanvien = new NhanVien(); // Thay đổi tên lớp cho phù hợp
        $nhanvien->hoten = $request->hoTen;
        $nhanvien->email = $request->email;
        $nhanvien->sodienthoai = $request->soDienThoai;
        $nhanvien->mataikhoan = $taikhoan->mataikhoan; // Liên kết với tài khoản
        $nhanvien->save();

        return redirect()->back()->with('success', 'Thêm nhân viên thành công!');
    }

    public function xoaNhanVien($id)
    {
        $nhanVien = NhanVien::findOrFail($id);

        // Xóa tài khoản tương ứng
        $taikhoan = TaiKhoan::find($nhanVien->mataikhoan);
        if ($taikhoan) {
            $taikhoan->delete();
        }

        // Xóa nhân viên
        $nhanVien->delete();

        return redirect()->back()->with('success', 'Nhân viên đã được xóa thành công.');
    }

    // public function suaNhanVien(Request $request)
    // {
    //     // Validate dữ liệu
    //     $request->validate([
    //         'id' => 'required|array',
    //         'hoten.*' => 'required|string|max:255',
    //         'ghinhan.*' => 'required|string',
    //         'matkhau.*' => 'required|string|min:6', // Điều chỉnh theo yêu cầu
    //         'email.*' => 'required|email',
    //         'sodienthoai.*' => 'required|string|max:15', // Điều chỉnh theo yêu cầu
    //     ]);

    //     // Lặp qua từng nhân viên và cập nhật thông tin
    //     foreach ($request->id as $index => $id) {
    //         $nhanvien = NhanVien::find($id);
    //         if ($nhanvien) {
    //             $nhanvien->hoten = $request->hoten[$index];
    //             $nhanvien->email = $request->email[$index];
    //             $nhanvien->sodienthoai = $request->sodienthoai[$index];

    //             // Cập nhật thông tin tài khoản (nếu cần)
    //             $taikhoan = $nhanvien->taikhoan; // Lấy tài khoản liên quan
    //             if ($taikhoan) {
    //                 $taikhoan->vaitro = $request->ghinhan[$index];
    //                 $taikhoan->matkhau = bcrypt($request->matkhau[$index]); // Băm mật khẩu
    //                 $taikhoan->save(); // Lưu tài khoản
    //             }

    //             $nhanvien->save(); // Lưu nhân viên
    //         }
    //     }

    //     return redirect()->back()->with('success', 'Cập nhật nhân viên thành công.');
    // }
    public function suaNhanVien(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'id' => 'required|array',
            'hoten.*' => 'required|string|max:255',
            'ghinhan.*' => 'required|string',
            'matkhau.*' => 'required|string|min:6', // Điều chỉnh theo yêu cầu
            'email.*' => 'required|email',
            'sodienthoai.*' => 'required|string|max:15', // Điều chỉnh theo yêu cầu
        ]);

        // Khởi tạo biến để lưu số lượng cập nhật thành công
        $updatedCount = 0;

        // Lặp qua từng nhân viên và cập nhật thông tin
        foreach ($request->id as $index => $id) {
            $nhanvien = NhanVien::find($id);
            if ($nhanvien) {
                // Cập nhật thông tin nhân viên
                $nhanvien->hoten = $request->hoten[$index];
                $nhanvien->email = $request->email[$index];
                $nhanvien->sodienthoai = $request->sodienthoai[$index];
                $nhanvien->save(); // Lưu nhân viên
                $updatedCount++;

                // Cập nhật thông tin tài khoản (nếu cần)
                $taikhoan = $nhanvien->taikhoan; // Lấy tài khoản liên quan
                if ($taikhoan) {
                    $taikhoan->vaitro = $request->ghinhan[$index];
                    $taikhoan->matkhau = bcrypt($request->matkhau[$index]); // Băm mật khẩu
                    $taikhoan->save(); // Lưu tài khoản
                }
            }
        }

        // Kiểm tra xem có nhân viên nào được cập nhật không
        if ($updatedCount > 0) {
            return redirect()->back()->with('success', 'Cập nhật ' . $updatedCount . ' nhân viên thành công.');
        } else {
            return redirect()->back()->with('error', 'Không có nhân viên nào được cập nhật.');
        }
    }
}
