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
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\XacThucController;


// 1 > Route đăng ký, đăng nhập (chung cho khách hàng và bên cửa hàng)
// ---- 1.1 > Route đăng nhập
Route::get('/dang-nhap', [XacThucController::class, 'hienThiDangNhap'])->name('route-dangnhap');
Route::post('/dang-nhap', [XacThucController::class, 'dangNhap'])->name('route-dangnhap');

// ---- 1.2 > Route đăng ký
Route::get('/dang-ky', [XacThucController::class, 'hienThiDangKy'])->name('route-dangky');

// ---- 1.3 > Route đăng xuất
Route::middleware('auth')->group(function () {
    Route::get('/dang-xuat', [XacThucController::class, 'dangXuat'])->name('route-dangxuat');
});






// 2 > Route bên cửa hàng (cần đăng nhập quản lý kho, nhân viên,...)
// ---- 2.1 > Route nhân viên
function NhanVienRoutes($isAdmin = false)
{
    $prefix = $isAdmin ? 'route-admin-nhanvien' : 'route-cuahang-nhanvien';

    Route::get('/', function () use ($prefix) {
        return redirect(route($prefix . '-quanlyanpham'));
    })->name($prefix);

    // -------- Route quản lý ấn phẩm
    Route::get('/dang-bai-bao', [DangBaiBaoController::class, 'hienThiDangBaiBao'])
        ->name($prefix . '-dangbaibao');

    // -------- Route đăng ký thành viên
    Route::get('/dang-ky-thanh-vien', [DangKyThanhVienController::class, 'hienThiDangKyThanhVien'])
        ->name($prefix . '-dangkythanhvien');

    // -------- Route đơn đặc trước
    Route::get('/don-dat-truoc', [DonDatTruocController::class, 'hienThiDonDatTruoc'])
        ->name($prefix . '-dondattruoc');

    Route::get('/don-dat-truoc/{hoaDonThue}/chi-tiet', [DonDatTruocController::class, 'chiTietDonDatTruoc'])
        ->name($prefix . '-dondattruoc-chitiet');

    Route::put('/don-dat-truoc/{id}', [DonDatTruocController::class, 'capNhatDonDatTruoc']);
    // -------- Route quản lý ấn phẩm
    Route::get('/quan-ly-an-pham', [NhanVienQuanLyAnPhamController::class, 'hienThiQuanLyAnPham'])
        ->name($prefix . '-quanlyanpham');

    // -------- Route quản lý khách hàng
    Route::get('/quan-ly-khach-hang', [QuanLyKhachHangController::class, 'hienThiQuanLyKhachHang'])
        ->name($prefix . '-quanlykhachhang');

    Route::get('quan-ly-khach-hang/cap-nhat',[QuanLyKhachHangController::class,'hienThiChiTietKhachHang'])
        ->name($prefix. '-quanlykhachhang-chitiet');

    // -------- Route thống kê doanh thu
    Route::get('/thong-ke-doanh-thu', [ThongKeDoanhThuController::class, 'hienThiThongKeDoanhThu'])
        ->name($prefix . '-thongkedoanhthu');
};




// ---- 2.2 > Route của quản lý cửa hàng
function QuanLyCuaHangRoutes($isAdmin = false)
{
    $prefix = $isAdmin ? 'route-admin-quanlycuahang' : 'route-cuahang-quanlycuahang';


    Route::get('/', function () use ($prefix) {
        return redirect(route($prefix . '-quanlynhanvien'));
    })->name($prefix);

    // -------- Route quản lý nhân viên
    // Phát 23/10
    Route::get('/quan-ly-nhan-vien', [QuanLyNhanVienController::class, 'hienThiQuanLyNhanVien'])
        ->name($prefix . '-quanlynhanvien');
    // Đang sửa
    Route::post('/quan-ly-nhan-vien/them', [QuanLyNhanVienController::class, 'themNhanVien'])
        ->name($prefix . '-quanlynhanvien.themNhanVien');
    Route::delete('/quan-ly-nhan-vien/{id}', [QuanLyNhanVienController::class, 'xoaNhanVien'])
        ->name($prefix . '-quanlynhanvien.xoaNhanVien');
    Route::post('/quan-ly-nhan-vien/sua', [QuanLyNhanVienController::class, 'suaNhanVien'])
        ->name($prefix . '-quanlynhanvien.suaNhanVien');

    // -------- Route xem báo cáo
    Route::get('/xem-bai-bao', [XemBaoCaoController::class, 'hienThiXemBaoCao'])
        ->name($prefix . '-xembaibao');

    // -------- Route chấm công
    // Phát 21/10
    Route::get('/cham-cong', [ChamCongController::class, 'hienThiChamCong'])
        ->name($prefix . '-chamcong');
    Route::post('/cham-cong/update', [ChamCongController::class, 'updateChamCong'])
        ->name($prefix . '-chamcong.updateChamCong');

    // -------- Route định giá ấn phẩm
    Route::get('/dinh-gia-an-pham', [DinhGiaAnPhamController::class, 'hienThiDinhGiaAnPham'])
        ->name($prefix . '-dinhgiaanpham');

    // -------- Route tạo khuyến mãi
    Route::get('/tao-khuyen-mai', [TaoKhuyenMaiController::class, 'hienThiTaoKhuyenMai'])
        ->name($prefix . '-taokhuyenmai');

    // -------- Route quản lý đánh giá
    Route::get('/quan-ly-danh-gia', [QuanLyNhanVienController::class, 'hienThiQuanLyNhanVien'])
        ->name($prefix . '-quanlydanhgia');
};




// ---- 2.3 > Route quản lý kho
function QuanLyKhoRoutes($isAdmin = false)
{
    $prefix = $isAdmin ? 'route-admin-quanlykho' : 'route-cuahang-quanlykho';

    Route::get('/', function () use ($prefix) {
        return redirect(route($prefix . '-quanlyanpham'));
    })->name($prefix);

    // -------- Route quản lý ấn phẩm
    Route::prefix('/quan-ly-an-pham')->group(function () use ($prefix) {
        Route::get('/', [QuanLyKhoQuanLyAnPhamController::class, 'hienThiQuanLyAnPham'])
            ->name($prefix . '-quanlyanpham');

        Route::get('/nhap-an-pham-moi', [QuanLyKhoQuanLyAnPhamController::class, 'hienThiNhapAnPhamMoi'])
            ->name($prefix . '-quanlyanpham-nhapanphammoi');

        Route::get('/nhap-an-pham-da-co', [QuanLyKhoQuanLyAnPhamController::class, 'hienThiNhapAnPhamDaCo'])
            ->name($prefix . '-quanlyanpham-nhapanphamdaco');

        Route::get('/thanh-ly-an-pham', [QuanLyKhoQuanLyAnPhamController::class, 'hienThiThanhLyAnPham'])
            ->name($prefix . '-quanlyanpham-thanhlyanpham');

        Route::get('/cap-nhat-tinh-trang', [QuanLyKhoQuanLyAnPhamController::class, 'hienThiCapNhatTinhTrang'])
            ->name($prefix . '-quanlyanpham-capnhattinhtrang');
    });

    // -------- Route quản lý danh mục
    Route::prefix('/quan-ly-danh-muc')->group(function () use ($prefix) {
        Route::get('/', [QuanLyDanhMucController::class, 'hienThiQuanLyDanhMuc'])
            ->name($prefix . '-quanlydanhmuc');

        Route::get('/them-danh-muc', [QuanLyDanhMucController::class, 'hienThiThemDanhMuc'])
            ->name($prefix . '-quanlydanhmuc-themdanhmuc');
    });

    // -------- Route tạo báo cáo
    Route::get('/tao-bao-cao', [TaoBaoCaoController::class, 'hienThiTaoBaoCao'])
        ->name($prefix . '-taobaocao');
}



// ---- Route cho bên cửa hàng
Route::prefix('/nhan-vien')->middleware(['auth', 'kiem_tra_vai_tro:nhanvien'])->group(function () {
    NhanVienRoutes();
});
Route::prefix('/quan-ly-cua-hang')->middleware(['auth', 'kiem_tra_vai_tro:quanlycuahang'])->group(function () {
    QuanLyCuaHangRoutes();
});
Route::prefix('/quan-ly-kho')->middleware(['auth', 'kiem_tra_vai_tro:quanlykho'])->group(function () {
    QuanLyKhoRoutes();
});


// ---- Route cho admin
Route::prefix('/admin')->middleware(['auth', 'kiem_tra_vai_tro:admin'])->group(function () {
    Route::get('/', function () {
        return redirect(route('route-admin-nhanvien'));
    })->name('route-admin');
    Route::prefix('/nhan-vien')->group(function () {
        NhanVienRoutes(true);
    });
    Route::prefix('/quan-ly-cua-hang')->group(function () {
        QuanLyCuaHangRoutes(true);
    });
    Route::prefix('/quan-ly-kho')->group(function () {
        QuanLyKhoRoutes(true);
    });
});



// 3 > Route bên khách hàng

// ---- 3.1 > Route không cần đăng nhập
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



// ---- 3.2 > Route cần đăng nhập
// -------- Route thuê ấn phẩm
Route::middleware(['auth', 'kiem_tra_vai_tro:khachhang'])->group(function () {
    Route::get('/thue-an-pham', [ThueAnPhamController::class, 'hienThiThueAnPham'])->name('route-khachhang-thueanpham');

    // -------- Route giỏ hàng
    Route::get('/gio-hang', [GioHangController::class, 'hienThiGioHang'])->name('route-khachhang-giohang');

    // -------- Route quản lý mua hàng
    Route::get('/quan-ly-mua-hang', [TrangChuController::class, 'hienThiTrangChu'])->name('route-khachhang-quanlymuahang');

    // -------- Route lịch sử mua hàng
    Route::get('/lich-su-mua-hang', [TrangChuController::class, 'hienThiTrangChu'])->name('route-khachhang-lichsumuahang');
});
