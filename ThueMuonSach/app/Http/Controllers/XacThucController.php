<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use App\Models\KhachHang;

class XacThucController extends Controller
{
    public function hienThiDangNhap()
    {
        return view('XacThuc.dangnhap');
    }

    public function hienThiDangNhapQuanTri()
    {
        return view('XacThuc.dangnhap-quantri');
    }

    public function hienThiDangKy()
    {
        return view('XacThuc.dangky');
    }

    public function dangNhap(Request $request)
    {
        // Xác thực thông tin đăng nhập
        $request->validate([
            'tentaikhoan' => 'required|string',
            'matkhau' => 'required|string',
        ]);
    
        // Tìm tài khoản theo tên tài khoản
        $taiKhoan = TaiKhoan::where('tentaikhoan', $request->tentaikhoan)->first();
    
        // Kiểm tra tài khoản và xác thực mật khẩu
        if ($taiKhoan && Hash::check($request->matkhau, $taiKhoan->matkhau)) {
            // Kiểm tra vai trò
            if ($taiKhoan->vaitro === 'khachhang') {
                Auth::login($taiKhoan);
                // dd(Auth::user()->khachhang);
                return redirect()->route('route-khachhang-trangchu')->with('success', 'Đăng nhập thành công!');
            } else {
                return redirect()->back()->with('error', 'Bạn không có quyền truy cập.');
            }
        }
    
        // Nếu không tìm thấy tài khoản hoặc mật khẩu không đúng
        return redirect()->back()->with('error', 'Đăng nhập thất bại! Kiểm tra tài khoản hoặc mật khẩu.');
    }
    public function dangNhapQuanTri(Request $request)
    {
        // Xác thực tài khoản quản trị
        $request->validate([
            'tentaikhoan' => 'required|string',
            'matkhau' => 'required|string',
        ]);

        $taiKhoan = TaiKhoan::where('tentaikhoan', $request->tentaikhoan)->first();

        if ($taiKhoan && Hash::check($request->matkhau, $taiKhoan->matkhau) && in_array($taiKhoan->vaitro, ['admin', 'quanlycuahang', 'quanlykho', 'nhanvien'])) {
            Auth::login($taiKhoan);

            // Điều hướng theo vai trò
            switch ($taiKhoan->vaitro) {
                case 'nhanvien':
                    return redirect()->route('route-cuahang-nhanvien-quanlyanpham')->with('success', 'Đăng nhập thành công!');
                case 'quanlycuahang':
                    return redirect()->route('route-cuahang-quanlycuahang-quanlynhanvien')->with('success', 'Đăng nhập thành công!');
                case 'quanlykho':
                    return redirect()->route('route-cuahang-quanlykho-quanlyanpham')->with('success', 'Đăng nhập thành công!');
                case 'admin':
                    return redirect()->route('route-cuahang-nhanvien-quanlyanpham')->with('success', 'Đăng nhập thành công!');
            }
        }

        return redirect()->back()->with('error', 'Đăng nhập thất bại! Kiểm tra tài khoản hoặc mật khẩu.');
    }

    // Xử lý đăng xuất
    public function dangXuat()
    {
        Auth::logout();

        // Điều hướng về trang chủ
        return redirect()->route('route-khachhang-trangchu')->with('success', 'Đăng xuất thành công!');
    }

    public function xuLyDangKy(Request $request)
{
   
    $request->validate([
        'tentaikhoan' => 'required|string|max:255|unique:taikhoan',
        'hoten' => 'required|string|max:255',
        'dienthoai' => 'required|string|digits_between:10,11',
        'email' => 'required|email|unique:khachhang',
        'matkhau' => 'required|string|min:3|confirmed', // Kiểm tra mật khẩu và xác nhận
    ], [
        'tentaikhoan.required' => 'Vui lòng nhập tên đăng nhập',
        'tentaikhoan.unique' => 'Tên đăng nhập đã tồn tại',
        'hoten.required' => 'Vui lòng nhập họ tên',
        'dienthoai.required' => 'Vui lòng nhập số điện thoại',
        'dienthoai.digits_between' => 'Số điện thoại không đúng định dạng',
        'email.required' => 'Vui lòng nhập email',
        'email.email' => 'Email không đúng định dạng',
        'email.unique' => 'Email đã tồn tại',
        'matkhau.required' => 'Vui lòng nhập mật khẩu',
        'matkhau.min' => 'Mật khẩu phải có ít nhất 3 ký tự',
        'matkhau.confirmed' => 'Xác nhận mật khẩu không khớp',
    ]);

   
    $taiKhoan = new TaiKhoan();
    $taiKhoan->tentaikhoan = $request->tentaikhoan;
    $taiKhoan->matkhau = $request->matkhau; // Mã hóa mật khẩu
    $taiKhoan->save(); // Lưu tài khoản

  
    $mataikhoan = $taiKhoan->mataikhoan;

   
    $khachHang = new KhachHang();
    $khachHang->hoten = $request->hoten;
    $khachHang->dienthoai = $request->dienthoai;
    $khachHang->email = $request->email;
    $khachHang->mataikhoan = $mataikhoan; // Gán ID tài khoản
    $khachHang->save(); // Lưu khách hàng

    // Kiểm tra xem khách hàng đã được lưu thành công chưa
   

    
    return redirect()->route('route-dangnhap')->with('success', 'Đăng ký thành công! Vui lòng đăng nhập.');
}
}
