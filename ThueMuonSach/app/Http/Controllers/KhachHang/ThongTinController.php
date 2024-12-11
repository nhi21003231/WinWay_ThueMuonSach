<?php
// app/Http/Controllers/KhachHang/ThongTinController.php
namespace App\Http\Controllers\KhachHang;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\TaiKhoan;
use App\Models\KhachHang;
use Illuminate\Http\Request;

class ThongTinController extends Controller
{
    public function show()
    {
        $taiKhoan = Auth::user();
        $khachHang = KhachHang::where('mataikhoan', $taiKhoan->mataikhoan)->first();

        if (!$khachHang) {
            return redirect()->route('route-khachhang-trangchu')->with('error', 'Không tìm thấy thông tin khách hàng.');
        }

        return view('KhachHang.pages.ThongTin.index', compact('khachHang'));
    }

    public function capNhatThongTin(Request $request)
    {
        $taiKhoan = Auth::user();
        $khachHang = KhachHang::where('mataikhoan', $taiKhoan->mataikhoan)->first();

        if (!$khachHang) {
            return redirect()->route('route-khachhang-trangchu')->with('error', 'Không tìm thấy thông tin khách hàng.');
        }
        // Xử lý giá trị hợp lệ cho cột 'lathanhvien'
        $validatedData = $request->validate([
            'hoten' => 'required|string|max:255',
            'email' => 'required|string|email|regex:/^[a-zA-Z0-9._%+-]+@gmail+\.com$/',
            'dienthoai' => 'required|regex:/^0[3,7,8,9][0-9]{8}$/',
            'diachi' => 'required|string|max:255',
        ], [
            'hoten.required' => 'Vui lòng nhập họ tên',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.regex' => 'Email phải có định dạng như: abc@gmail.com',
            'dienthoai.required' => 'Vui lòng nhập số điện thoại',
            'dienthoai.regex' => 'Số điện thoại không đúng định dạng',
            'diachi.required' => 'Vui lòng nhập địa chỉ',
        ]);

        // Giữ nguyên giá trị của 'lathanhvien'
        $validatedData['lathanhvien'] = $khachHang->lathanhvien;
        $khachHang->update($validatedData);

        // $khachHang->update($request->all());

        return redirect()->route('route-khachhang-thongtincanhan')->with('success', 'Cập nhật thông tin thành công.');
    }
}
