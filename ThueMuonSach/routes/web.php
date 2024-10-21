<?php

use App\Http\Controllers\KhachHang\ChiTietAnPhamController;
use App\Http\Controllers\KhachHang\GioHangController;
use App\Http\Controllers\KhachHang\ThueAnPhamController;
use App\Http\Controllers\KhachHang\TrangChuController;
use App\Http\Controllers\NhanVien\DangBaiBaoController;
use App\Http\Controllers\NhanVien\DangKyThanhVienController;
use App\Http\Controllers\NhanVien\DonDacTruocController;
use App\Http\Controllers\NhanVien\QuanLyAnPhamController as NhanVienQuanLyAnPhamController;
use App\Http\Controllers\NhanVien\QuanLyKhachHangController;
use App\Http\Controllers\NhanVien\ThongKeDoanhThuController;
use App\Http\Controllers\QuanLyCuaHang\ChamCongController;
use App\Http\Controllers\QuanLyCuaHang\DinhGiaAnPhamController;
use App\Http\Controllers\QuanLyCuaHang\QuanLyNhanVienController;
use App\Http\Controllers\QuanLyCuaHang\TaoKhuyenMaiController;
use App\Http\Controllers\QuanLyCuaHang\XemBaoCaoController;
use App\Http\Controllers\QuanLyKho\QuanLyAnPhamController as QuanLyKhoQuanLyAnPhamController;
use App\Http\Controllers\QuanLyKho\QuanLyDanhMucController;
use App\Http\Controllers\QuanLyKho\TaoBaoCaoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\XacThucController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// 1 > Route đăng ký, đăng nhập (chung cho khách hàng và bên cửa hàng)
// ---- 1.1 > Route đăng nhập
Route::get('/dang-nhap', [XacThucController::class, 'hienThiDangNhap'])->name('route-dangnhap');
Route::post('/dang-nhap', [XacThucController::class, 'dangNhap'])->name('route-dangnhap');

// ---- 1.2 > Route đăng ký
Route::get('/dang-ky', [XacThucController::class, 'hienThiDangKy'])->name('route-dangky');

// ---- 1.3 > Route đăng xuất
Route::get('/dang-xuat', [XacThucController::class, 'dangXuat'])->name('route-dangxuat');


// 2 > Route bên cửa hàng (cần đăng nhập quản lý kho, nhân viên,...)
// ---- 2.1 > Route nhân viên
Route::prefix('/nhan-vien')->group(function () {

    Route::get('/', function () {
        return redirect(route('route-cuahang-nhanvien-quanlyanpham'));
    })->name('route-cuahang-nhanvien');

    // -------- Route quản lý ấn phẩm
    Route::get('/dang-bai-bao', [DangBaiBaoController::class, 'hienThiDangBaiBao'])->name('route-cuahang-nhanvien-dangbaibao');

    // -------- Route đăng ký thành viên
    Route::get('/dang-ky-thanh-vien', [DangKyThanhVienController::class, 'hienThiDangKyThanhVien'])->name('route-cuahang-nhanvien-dangkythanhvien');

    // -------- Route đơn đặc trước
    Route::get('/don-dac-truoc', [DonDacTruocController::class, 'hienThiDonDacTruoc'])->name('route-cuahang-nhanvien-dondactruoc');
    Route::get('/don-dac-truoc/{hoaDonThue}/chi-tiet', [DonDacTruocController::class, 'chiTietDonDatTruoc'])->name('route-cuahang-nhanvien-dondactruoc-chitiet');
    // -------- Route quản lý ấn phẩm
    Route::get('/quan-ly-an-pham', [NhanVienQuanLyAnPhamController::class, 'hienThiQuanLyAnPham'])->name('route-cuahang-nhanvien-quanlyanpham');

    // -------- Route quản lý khách hàng
    Route::get('/quan-ly-khach-hang', [QuanLyKhachHangController::class, 'hienThiQuanLyKhachHang'])->name('route-cuahang-nhanvien-quanlykhachhang');

    // -------- Route thống kê doanh thu
    Route::get('/thong-ke-doanh-thu', [ThongKeDoanhThuController::class, 'hienThiThongKeDoanhThu'])->name('route-cuahang-nhanvien-thongkedoanhthu');
});


// ---- 2.2 > Route của quản lý cửa hàng
Route::prefix('/quan-ly-cua-hang')->group(function () {

    Route::get('/', function () {
        return redirect(route('route-cuahang-quanlycuahang-quanlynhanvien'));
    })->name('route-cuahang-quanlycuahang');

    // -------- Route quản lý nhân viên
    Route::get('/quan-ly-nhan-vien', [QuanLyNhanVienController::class, 'hienThiQuanLyNhanVien'])->name('route-cuahang-quanlycuahang-quanlynhanvien');

    // -------- Route xem báo cáo
    Route::get('/xem-bai-bao', [XemBaoCaoController::class, 'hienThiXemBaoCao'])->name('route-cuahang-quanlycuahang-xembaibao');

    // -------- Route chấm công
    Route::get('/cham-cong', [ChamCongController::class, 'hienThiChamCong'])->name('route-cuahang-quanlycuahang-chamcong');

    // -------- Route định giá ấn phẩm
    Route::get('/dinh-gia-an-pham', [DinhGiaAnPhamController::class, 'hienThiDinhGiaAnPham'])->name('route-cuahang-quanlycuahang-dinhgiaanpham');

    // -------- Route tạo khuyến mãi
    Route::get('/tao-khuyen-mai', [TaoKhuyenMaiController::class, 'hienThiTaoKhuyenMai'])->name('route-cuahang-quanlycuahang-taokhuyenmai');

    // -------- Route quản lý đánh giá
    Route::get('/quan-ly-danh-gia', [QuanLyNhanVienController::class, 'hienThiQuanLyNhanVien'])->name('route-cuahang-quanlycuahang-quanlydanhgia');
});


// ---- 2.3 > Route quản lý kho
Route::prefix('/quan-ly-kho')->group(function () {

    Route::get('/', function () {
        return redirect(route('route-cuahang-quanlykho-quanlyanpham'));
    })->name('route-cuahang-quanlykho');

    // -------- Route quản lý ấn phẩm
    Route::get('/quan-ly-an-pham', [QuanLyKhoQuanLyAnPhamController::class, 'hienThiQuanLyAnPham'])->name('route-cuahang-quanlykho-quanlyanpham');

    // -------- Route quản lý danhh mục 
    Route::get('/quan-ly-danh-muc', [QuanLyDanhMucController::class, 'hienThiQuanLyDanhMuc'])->name('route-cuahang-quanlykho-quanlydanhmuc');

    // -------- Route tạo báo cáo
    Route::get('/tao-bao-cao', [TaoBaoCaoController::class, 'hienThiTaoBaoCao'])->name('route-cuahang-quanlykho-taobaocao');
});


// 3 > Route bên khách hàng
// ---- 3.1 > Route không cần đăng nhập
// -------- Route trang chủ
Route::get('/', [TrangChuController::class, 'hienThiTrangChu'])->name('route-khachhang-trangchu');

// -------- Route chi tiết ấn phẩm
Route::get('/chi-tiet-an-pham', [ChiTietAnPhamController::class, 'hienThiChiTietAnPham'])->name('route-khachhang-chitietanpham');


// ---- 3.2 > Route cần đăng nhập
// -------- Route thuê ấn phẩm
Route::get('/thue-an-pham', [ThueAnPhamController::class, 'hienThiThueAnPham'])->name('route-khachhang-thueanpham');

// -------- Route giỏ hàng
Route::get('/gio-hang', [GioHangController::class, 'hienThiGioHang'])->name('route-khachhang-giohang');

