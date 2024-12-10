<?php

namespace App\Http\Controllers\QuanLyCuaHang;

use App\Http\Controllers\Controller;
use App\Models\NhanVien;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
                            ->orWhere('vaitro', 'LIKE', '%' . $keyword . '%');
                    });
            });
        }

        $nhanvienList = $query->get();
        $message = $nhanvienList->isEmpty() ? 'Không có dữ liệu' : null;
        return view('CuaHang.pages.QuanLyCuaHang.QuanLyNhanVien.index', compact('nhanvienList', 'message'));
    }

    public function themNhanVien(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'hoTen' => 'required|string|max:50',
            'email' => [
                'required',
                'email', // Kiểm tra email mặc định của Laravel
                'unique:nhanvien,email',
                'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
            ],
            'soDienThoai' => [
                'required',
                'string',
                'unique:nhanvien,sodienthoai',
                'regex:/^(0|\+84)(3[2-9]|5[6|8|9]|7[0|6-9]|8[1-5]|9[0-9])[0-9]{7}$/',
            ],
            'tenTaiKhoan' => 'required|string|min:3|max:25|unique:taikhoan,tentaikhoan',
            'matKhau' => 'required|min:6|string',
            'chucVu' => 'required|string',
        ]);

        if ($validator->fails()) {
            // Quay lại với lỗi xác thực (hiển thị lỗi trong session)
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        // Tạo tài khoản cho nhân viên
        $taikhoan = new TaiKhoan();
        $taikhoan->tentaikhoan = $request->tenTaiKhoan;
        $taikhoan->matkhau = bcrypt($request->matKhau); // Mã hóa mật khẩu
        $taikhoan->vaitro = $request->chucVu;
        $taikhoan->save();

        // Tạo nhân viên
        $nhanvien = new NhanVien();
        $nhanvien->hoten = $request->hoTen;
        $nhanvien->email = $request->email;
        $nhanvien->sodienthoai = $request->soDienThoai;
        $nhanvien->mataikhoan = $taikhoan->mataikhoan;
        $nhanvien->save();

        // Quay lại với thông báo thành công
        return redirect()->back()->with('success', 'Thêm nhân viên thành công!');
    }

    public function xoaNhanVien($id)
    {
        $nhanVien = NhanVien::findOrFail($id);

        // Lấy thông tin tài khoản đang đăng nhập
        $currentUser = auth()->user(); // Giả sử bạn đang dùng Laravel Authentication

        // Kiểm tra nếu tài khoản cần xóa là tài khoản đang đăng nhập
        if ($currentUser && $currentUser->id == $nhanVien->mataikhoan) {
            return redirect()->back()->with('error', 'Bạn không thể xóa tài khoản đang đăng nhập.');
        }

        // Kiểm tra vai trò để không cho phép xóa admin hoặc quản lý cửa hàng
        $taikhoan = TaiKhoan::find($nhanVien->mataikhoan);
        if ($taikhoan && in_array($taikhoan->vaitro, ['admin', 'quanlycuahang'])) {
            return redirect()->back()->with('error', 'Không thể xóa tài khoản admin hoặc quản lý cửa hàng.');
        }

        // Xóa tài khoản tương ứng
        if ($taikhoan) {
            $taikhoan->delete();
        }

        // Xóa nhân viên
        $nhanVien->delete();

        return redirect()->back()->with('success', 'Nhân viên đã được xóa thành công.');
    }


    public function suaNhanVien(Request $request)
    {
        foreach ($request->id as $index => $id) {
            $nhanvien = NhanVien::find($id);

            if ($nhanvien) {
                // Xây dựng mảng dữ liệu và quy tắc chỉ cho trường thay đổi
                $dataToValidate = [];
                $rules = [];

                // Kiểm tra nếu họ tên thay đổi
                if ($nhanvien->hoten !== $request->hoten[$index]) {
                    $dataToValidate['hoTen'] = $request->hoten[$index];
                    $rules['hoTen'] = 'required|string|max:50';
                }

                // Kiểm tra nếu email thay đổi
                if ($nhanvien->email !== $request->email[$index]) {
                    $dataToValidate['email'] = $request->email[$index];
                    $rules['email'] = [
                        'required',
                        'email',
                        Rule::unique('nhanvien', 'email')->ignore($nhanvien->id),
                        'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
                    ];
                }

                // Kiểm tra nếu số điện thoại thay đổi
                if ($nhanvien->sodienthoai !== $request->sodienthoai[$index]) {
                    $dataToValidate['soDienThoai'] = $request->sodienthoai[$index];
                    $rules['soDienThoai'] = [
                        'required',
                        'string',
                        Rule::unique('nhanvien', 'soDienThoai')->ignore($nhanvien->id),
                        'regex:/^(0|\+84)(3[2-9]|5[6|8|9]|7[0|6-9]|8[1-5]|9[0-9])[0-9]{7}$/',
                    ];
                }

                // Kiểm tra nếu mật khẩu được nhập mới
                if (!empty($request->matkhau[$index])) {
                    $dataToValidate['matKhau'] = $request->matkhau[$index];
                    $rules['matKhau'] = 'nullable|min:6|string';
                }

                // Kiểm tra nếu chức vụ thay đổi
                if (isset($request->ghinhan[$index]) && $nhanvien->taikhoan->vaitro !== $request->ghinhan[$index]) {
                    $dataToValidate['chucVu'] = $request->ghinhan[$index];
                    $rules['chucVu'] = 'nullable|string';
                }

                // Thực hiện validate nếu có trường cần kiểm tra
                if (!empty($rules)) {
                    $validator = Validator::make($dataToValidate, $rules);

                    if ($validator->fails()) {
                        return redirect()->back()->with('error', $validator->errors()->first());
                    }
                }

                // Cập nhật thông tin nhân viên
                $nhanvien->hoten = $request->hoten[$index];
                $nhanvien->email = $request->email[$index];
                $nhanvien->sodienthoai = $request->sodienthoai[$index];

                // Cập nhật chức vụ nếu thay đổi
                if (isset($request->ghinhan[$index])) {
                    $nhanvien->taikhoan->vaitro = $request->ghinhan[$index];
                }

                // Cập nhật mật khẩu nếu nhập mật khẩu mới
                if (!empty($request->matkhau[$index])) {
                    $nhanvien->taikhoan->matkhau = Hash::make($request->matkhau[$index]);
                }

                // Lưu các thay đổi
                $nhanvien->taikhoan->save();
                $nhanvien->save();
            }
        }

        return redirect()->back()->with('success', 'Cập nhật nhân viên thành công.');
    }
}
