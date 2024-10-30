<?php

use App\Http\Controllers\KhachHang\ChiTietAnPhamController;
use App\Http\Controllers\KhachHang\GioHangController;
use App\Http\Controllers\KhachHang\ThueAnPhamController;
use App\Http\Controllers\KhachHang\TrangChuController;
use App\Http\Controllers\NhanVien\DangBaiBaoController;
use App\Http\Controllers\NhanVien\DangKyThanhVienController;
use App\Http\Controllers\NhanVien\DonDatTruocController;
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
use App\Http\Controllers\KhachHang\LienHeController;
use App\Http\Controllers\KhachHang\ChinhSachController;
use App\Http\Controllers\QuanLyCuaHang\QuanLyDanhGiaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\XacThucController;


// 1 > Route đăng ký, đăng nhập (chung cho khách hàng và bên cửa hàng)
Route::middleware('check_guest')->group(function () {
    // ---- 1.1 > Route đăng nhập
    Route::get('/dang-nhap', [XacThucController::class, 'hienThiDangNhap'])->name('route-dangnhap');
    Route::post('/dang-nhap', [XacThucController::class, 'dangNhap']);

    // ---- 1.2 > Route đăng ký
    Route::get('/dang-ky', [XacThucController::class, 'hienThiDangKy'])->name('route-dangky');
});

// ---- 1.3 > Route đăng xuất
Route::middleware('check_auth')->group(function () {
    Route::get('/dang-xuat', [XacThucController::class, 'dangXuat'])->name('route-dangxuat');
});






// 2 > Route bên cửa hàng (cần đăng nhập quản lý kho, nhân viên,...)
// ---- 2.1 > Route nhân viên
Route::prefix('/nhan-vien')->middleware('xac_thuc:nhanvien,admin')->group(function () {
    Route::get('/', function () {
        return redirect(route('route-cuahang-nhanvien-quanlyanpham'));
    })->name('route-cuahang-nhanvien');

    // -------- Route quản lý ấn phẩm
    Route::get('/dang-bai-bao', [DangBaiBaoController::class, 'hienThiDangBaiBao'])
        ->name('route-cuahang-nhanvien-dangbaibao');

    // -------- Route đăng ký thành viên
    Route::get('/dang-ky-thanh-vien', [DangKyThanhVienController::class, 'hienThiDangKyThanhVien'])
        ->name('route-cuahang-nhanvien-dangkythanhvien');

    // -------- Route đơn đặc trước
    Route::get('/don-dat-truoc', [DonDatTruocController::class, 'hienThiDonDatTruoc'])
        ->name('route-cuahang-nhanvien-dondattruoc');

    Route::get('/don-dat-truoc/{hoaDonThue}/chi-tiet', [DonDatTruocController::class, 'chiTietDonDatTruoc'])
        ->name('route-cuahang-nhanvien-dondattruoc-chitiet');

    Route::put('/don-dat-truoc/{id}', [DonDatTruocController::class, 'capNhatDonDatTruoc']);
    // -------- Route quản lý ấn phẩm
    Route::get('/quan-ly-an-pham', [NhanVienQuanLyAnPhamController::class, 'hienThiQuanLyAnPham'])
        ->name('route-cuahang-nhanvien-quanlyanpham');

    // -------- Route quản lý khách hàng
    Route::get('/quan-ly-khach-hang', [QuanLyKhachHangController::class, 'hienThiQuanLyKhachHang'])
        ->name('route-cuahang-nhanvien-quanlykhachhang');

    Route::get('quan-ly-khach-hang/cap-nhat', [QuanLyKhachHangController::class, 'hienThiChiTietKhachHang'])
        ->name('route-cuahang=nhanvien-quanlykhachhang-chitiet');

    // -------- Route thống kê doanh thu
    Route::get('/thong-ke-doanh-thu', [ThongKeDoanhThuController::class, 'hienThiThongKeDoanhThu'])
        ->name('route-cuahang-nhanvien-thongkedoanhthu');
});




// ---- 2.2 > Route của quản lý cửa hàng
Route::prefix('/quan-ly-cua-hang')->middleware('xac_thuc:quanlycuahang,admin')->group(function () {
    Route::get('/', function () {
        return redirect(route('route-cuahang-quanlycuahang-quanlynhanvien'));
    })->name('route-cuahang-quanlycuahang');

    // -------- Route quản lý nhân viên
    Route::get('/quan-ly-nhan-vien', [QuanLyNhanVienController::class, 'hienThiQuanLyNhanVien'])
        ->name('route-cuahang-quanlycuahang-quanlynhanvien');
    Route::post('/quan-ly-nhan-vien/them', [QuanLyNhanVienController::class, 'themNhanVien'])
        ->name('route-cuahang-quanlycuahang-quanlynhanvien.themNhanVien');
    Route::post('/quan-ly-nhan-vien/{id}', [QuanLyNhanVienController::class, 'xoaNhanVien'])
        ->name('route-cuahang-quanlycuahang-quanlynhanvien.xoaNhanVien');
    Route::post('/quan-ly-nhan-vien', [QuanLyNhanVienController::class, 'suaNhanVien'])
        ->name('route-cuahang-quanlycuahang-quanlynhanvien.suaNhanVien');

    // -------- Route xem báo cáo
    Route::get('/xem-bai-bao', [XemBaoCaoController::class, 'hienThiXemBaoCao'])
        ->name('route-cuahang-quanlycuahang-xembaibao');

    // -------- Route chấm công
    Route::get('/cham-cong', [ChamCongController::class, 'hienThiChamCong'])
        ->name('route-cuahang-quanlycuahang-chamcong');
    Route::post('/cham-cong/update', [ChamCongController::class, 'updateChamCong'])
        ->name('route-cuahang-quanlycuahang-chamcong.updateChamCong');

    // -------- Route định giá ấn phẩm
    Route::get('/dinh-gia-an-pham', [DinhGiaAnPhamController::class, 'hienThiDinhGiaAnPham'])
        ->name('route-cuahang-quanlycuahang-dinhgiaanpham');
    Route::post('/quan-ly-an-pham', [DinhGiaAnPhamController::class, 'suaDinhGiaAnPham'])
        ->name('route-cuahang-quanlycuahang-dinhgiaanpham.suaDinhGiaAnPham');

    // -------- Route tạo khuyến mãi
    Route::get('/tao-khuyen-mai', [TaoKhuyenMaiController::class, 'hienThiTaoKhuyenMai'])
        ->name('route-cuahang-quanlycuahang-taokhuyenmai');
    Route::post('/tao-khuyen-mai/them', [TaoKhuyenMaiController::class, 'themCTKhuyenMai'])
        ->name('route-cuahang-quanlycuahang-taokhuyenmai.themCTKhuyenMai');

    // -------- Route quản lý đánh giá
    Route::get('/quan-ly-danh-gia', [QuanLyDanhGiaController::class, 'hienThiDanhGia'])
        ->name('route-cuahang-quanlycuahang-quanlydanhgia');
    Route::post('/quan-ly-danh-gia', [QuanLyDanhGiaController::class, 'suaDanhGia'])
        ->name('route-cuahang-quanlycuahang-quanlydanhgia.suaDanhGia');
});




// ---- 2.3 > Route quản lý kho
Route::prefix('/quan-ly-kho')->middleware('xac_thuc:quanlykho,admin')->group(function () {
    Route::get('/', function () {
        return redirect(route('route-cuahang-quanlykho-quanlyanpham'));
    })->name('route-cuahang-quanlykho');

    // -------- Route quản lý ấn phẩm
    Route::prefix('/quan-ly-an-pham')->group(function () {
        Route::get('/', [QuanLyKhoQuanLyAnPhamController::class, 'hienThiQuanLyAnPham'])
            ->name('route-cuahang-quanlykho-quanlyanpham');

        Route::get('/nhap-an-pham-moi', [QuanLyKhoQuanLyAnPhamController::class, 'hienThiNhapAnPhamMoi'])
            ->name('route-cuahang-quanlykho-quanlyanpham-nhapanphammoi');

        Route::get('/nhap-an-pham-da-co', [QuanLyKhoQuanLyAnPhamController::class, 'hienThiNhapAnPhamDaCo'])
            ->name('route-cuahang-quanlykho-quanlyanpham-nhapanphamdaco');

        // ------------ Route thanh lý ấn phẩm
        Route::get('/thanh-ly-an-pham', [QuanLyKhoQuanLyAnPhamController::class, 'hienThiThanhLyAnPham'])
            ->name('route-cuahang-quanlykho-quanlyanpham-thanhlyanpham');
        Route::post('/thanh-ly-an-pham', [QuanLyKhoQuanLyAnPhamController::class, 'xuLyThanhLyAnPham']);

        // ------------ Route cập nhật tình trạng
        Route::get('/cap-nhat-tinh-trang', [QuanLyKhoQuanLyAnPhamController::class, 'hienThiCapNhatTinhTrang'])
            ->name('route-cuahang-quanlykho-quanlyanpham-capnhattinhtrang');
        Route::post('/cap-nhat-tinh-trang', [QuanLyKhoQuanLyAnPhamController::class, 'xuLyCapNhatTinhTrang']);
    });

    // -------- Route quản lý danh mục
    Route::get('/quan-ly-danh-muc', [QuanLyDanhMucController::class, 'hienThiQuanLyDanhMuc'])
        ->name('route-cuahang-quanlykho-quanlydanhmuc');

    Route::get('/them-danh-muc', [QuanLyDanhMucController::class, 'hienThiThemDanhMuc'])
        ->name('route-cuahang-quanlykho-quanlydanhmuc-themdanhmuc');

    // -------- Route tạo báo cáo
    Route::get('/tao-bao-cao', [TaoBaoCaoController::class, 'hienThiTaoBaoCao'])
        ->name('route-cuahang-quanlykho-taobaocao');
});



// 3 > Route bên khách hàng

// ---- 3.1 > Route không cần đăng nhập
Route::middleware('check_guest_or_customer')->group(function () {
    // -------- Route trang chủ
    Route::get('/', [TrangChuController::class, 'hienThiTrangChu'])->name('route-khachhang-trangchu');

    // -------- Route chi tiết ấn phẩm
    Route::get('/chi-tiet-an-pham', [ChiTietAnPhamController::class, 'hienThiChiTietAnPham'])->name('route-khachhang-chitietanpham');

    // -------- Route liên hệ
    // Route::get('/lien-he', [TrangChuController::class, 'hienThiTrangChu'])->name('route-khachhang-lienhe');
    Route::get('/lien-he', [LienHeController::class, 'LienHe'])->name('route-khachhang-lienhe');

    // -------- Route tìm kiếm ấn phẩm
    Route::get('/tim-kiem-an-pham', [TrangChuController::class, 'hienThiTrangChu'])->name('route-khachhang-timkiemanpham');

    // -------- Route chính sách
    Route::get('/chinh-sach', [ChinhSachController::class, 'hienThiChinhSach'])->name('route-khachhang-chinhsach');
});



// ---- 3.2 > Route cần đăng nhập
// -------- Route thuê ấn phẩm
Route::middleware('xac_thuc:khachhang')->group(function () {
    Route::get('/thue-an-pham', [ThueAnPhamController::class, 'hienThiThueAnPham'])->name('route-khachhang-thueanpham');

    // -------- Route giỏ hàng
    Route::get('/gio-hang', [GioHangController::class, 'hienThiGioHang'])->name('route-khachhang-giohang');

    // -------- Route quản lý mua hàng
    Route::get('/quan-ly-mua-hang', [TrangChuController::class, 'hienThiTrangChu'])->name('route-khachhang-quanlymuahang');

    // -------- Route lịch sử mua hàng
    Route::get('/lich-su-mua-hang', [TrangChuController::class, 'hienThiTrangChu'])->name('route-khachhang-lichsumuahang');
});
