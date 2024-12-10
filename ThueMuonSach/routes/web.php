<?php

use App\Http\Controllers\KhachHang\ChiTietAnPhamController;
use App\Http\Controllers\KhachHang\DanhSachAnPhamController;
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
use App\Http\Controllers\KhachHang\TimKiemController;
use App\Http\Controllers\KhachHang\HoaDonController;
use App\Http\Controllers\KhachHang\ThongTinController;
use App\Http\Controllers\KhachHang\CacBaiBaoController;
use App\Http\Controllers\KhachHang\DanhGiaController;
use App\Http\Controllers\KhachHang\GiaHanController;
use App\Http\Controllers\KhachHang\HoaDonThueAnPhamController;
use App\Http\Controllers\QuanLyCuaHang\QuanLyDanhGiaController;
use App\Http\Controllers\QuanLyKho\QuanLyTonKhoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\XacThucController;



// 1 > Route đăng ký, đăng nhập (chung cho khách hàng và bên cửa hàng)
Route::middleware('check_guest')->group(function () {
    // ---- 1.1 > Route đăng nhập
    Route::get('/dang-nhap', [XacThucController::class, 'hienThiDangNhap'])->name('route-dangnhap');
    Route::post('/dang-nhap', [XacThucController::class, 'dangNhap']);


    Route::get('/dang-nhap/quan-tri', [XacThucController::class, 'hienThiDangNhapQuanTri'])->name('route-dangnhap-quantri');
    Route::post('/dang-nhap/quan-tri', [XacThucController::class, 'dangNhapQuanTri']);

    // ---- 1.2 > Route đăng ký
    Route::get('/dang-ky', [XacThucController::class, 'hienThiDangKy'])->name('route-dangky');
    Route::post('/dang-ky', [XacThucController::class, 'xuLyDangKy'])->name('route-dangky-xuly');
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
    // Route để hiển thị form thêm bài báo
    Route::get('/dang-bai-bao/thembaibao', [DangBaiBaoController::class, 'thembaibao'])->name('dangbaibao.thembaibao');
    // Route để xử lý lưu bài báo
    Route::post('/dang-bai-bao', [DangBaiBaoController::class, 'xuLyNhapBaiBao'])->name('dangbaibao.store');
    Route::get('/dangbaibao/suabaibao', [DangBaiBaoController::class, 'suabaibao'])->name('dangbaibao.suabaibao');
    Route::post('/dangbaibao/update', [DangBaiBaoController::class, 'update'])->name('dangbaibao.update');
    Route::delete('/dangbaibao/{tieude}', [DangBaiBaoController::class, 'destroy'])->name('dangbaibao.xoa');
    // -------- Route đăng ký thành viên
    Route::get('/dang-ky-thanh-vien', [DangKyThanhVienController::class, 'hienThiDangKyThanhVien']) ->name('route-cuahang-nhanvien-dangkythanhvien');
    Route::get('/dang-ky-thanh-vien/export',[DangKyThanhVienController::class,'exportExcel']);
    Route::post('/dang-ky-thanh-vien/{makhachhang}', [DangKyThanhVienController::class, 'capnhatThanhVien'])->name('route-cuahang-nhanvien-capnhatthanhvien');

    // -------- Route đơn đặc trước
    Route::get('/don-dat-truoc', [DonDatTruocController::class, 'hienThiDonDatTruoc'])
        ->name('route-cuahang-nhanvien-dondattruoc');

    // Update  Status Re-order
    Route::put('/update/status',[DonDatTruocController::class,'updateStatus']);

    Route::get('/don-dat-truoc/{hoaDonThue}/chi-tiet', [DonDatTruocController::class, 'chiTietDonDatTruoc'])
        ->name('route-cuahang-nhanvien-dondattruoc-chitiet');

    Route::put('/don-dat-truoc/{id}', [DonDatTruocController::class, 'capNhatDonDatTruoc']);
    // -------- Route quản lý ấn phẩm
    Route::get('/quan-ly-an-pham', [NhanVienQuanLyAnPhamController::class, 'hienThiQuanLyAnPham'])
        ->name('route-cuahang-nhanvien-quanlyanpham');
    Route::get('/quan-ly-an-pham/{mahoadon}', [NhanVienQuanLyAnPhamController::class, 'show'])->name('quanlyanpham.chitiethoadon');
    Route::post('/quan-ly-an-pham/{mahoadon}', [NhanVienQuanLyAnPhamController::class, 'traSach'])->name('traSach');

    // -------- Route quản lý khách hàng
    Route::get('/quan-ly-khach-hang', [QuanLyKhachHangController::class, 'hienThiQuanLyKhachHang'])
        ->name('route-cuahang-nhanvien-quanlykhachhang');

    Route::get('/customer-info', [QuanLyKhachHangController::class, 'layThongTinKH']);

    Route::put('/quan-ly-khach-hang/cap-nhat', [QuanLyKhachHangController::class, 'capNhatThongTinKH']);

    Route::delete('/quan-ly-khach-hang/{id}', [QuanLyKhachHangController::class, 'xoaKhachHang'])
        ->name('route-cuahang-nhanvien-quanlykhachhang-xoakhachhang');

    Route::get('/quan-ly-khach-hang/export', [QuanLyKhachHangController::class, 'exportExcel']);
    // -------- Route thống kê doanh thu
    Route::get('/thong-ke-doanh-thu', [ThongKeDoanhThuController::class, 'hienThiThongKeDoanhThu'])
        ->name('route-cuahang-nhanvien-thongkedoanhthu');
    Route::get('/thong-ke-doanh-thu/chi-tiet-doanh-thu', [ThongKeDoanhThuController::class, 'chiTietDoanhThu'])->name('chi-tiet-doanh-thu');
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
    Route::get('/xem-bao-cao', [XemBaoCaoController::class, 'hienThiXemBaoCao'])
        ->name('route-cuahang-quanlycuahang-xembaocao');

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
    Route::post('/tao-khuyen-mai', [TaoKhuyenMaiController::class, 'suaCTKhuyenMai'])
        ->name('route-cuahang-quanlycuahang-taokhuyenmai.suaCTKhuyenMai');
    Route::post('/tao-khuyen-mai/them', [TaoKhuyenMaiController::class, 'themCTKhuyenMai'])
        ->name('route-cuahang-quanlycuahang-taokhuyenmai.themCTKhuyenMai');
    Route::post('/tao-khuyen-mai/{id}', [TaoKhuyenMaiController::class, 'xoaCTKhuyenMai'])
        ->name('route-cuahang-quanlycuahang-taokhuyenmai.xoaCTKhuyenMai');


    // -------- Route quản lý đánh giá
    Route::get('/quan-ly-danh-gia', [QuanLyDanhGiaController::class, 'hienThiDanhGia'])
        ->name('route-cuahang-quanlycuahang-quanlydanhgia');
    Route::post('/quan-ly-danh-gia', [QuanLyDanhGiaController::class, 'suaDanhGia'])
        ->name('route-cuahang-quanlycuahang-quanlydanhgia.suaDanhGia');
    Route::post('/quan-ly-danh-gia/{id}', [QuanLyDanhGiaController::class, 'xoaDanhGia'])
        ->name('route-cuahang-quanlycuahang-quanlydanhgia.xoaDanhGia');
    // nhí làm
    Route::post('/danhgia/updateStatus', [DanhGiaController::class, 'updateStatus'])->name('route-cuahang-quanlycuahang-quanlydanhgia.updateStatus');
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

        Route::get('/cap-nhat-thong-tin-an-pham/{mactanpham}', [QuanLyKhoQuanLyAnPhamController::class, 'hienThiCapNhatThongTin'])
            ->name('route-cuahang-quanlykho-quanlyanpham-capnhatthongtinanpham');
        Route::post('/cap-nhat-thong-tin-an-pham/{mactanpham}', [QuanLyKhoQuanLyAnPhamController::class, 'xuLyCapNhatThongTinAnPham']);
    });

    // -------- Route quản lý tồn kho
    Route::prefix('/quan-ly-ton-kho')->group(function () {
        Route::get('/', [QuanLyTonKhoController::class, 'hienThiQuanLyAnPham'])
            ->name('route-cuahang-quanlykho-quanlytonkho');

        // Route nhập ấn phẩm mới
        Route::get('/nhap-an-pham-moi', [QuanLyTonKhoController::class, 'hienThiNhapAnPhamMoi'])
            ->name('route-cuahang-quanlykho-quanlytonkho-nhapanphammoi');
        Route::post('/nhap-an-pham-moi', [QuanLyTonKhoController::class, 'xuLyNhapAnPhamMoi']);

        // Route nhập ấn phẩm đã có
        Route::get('/nhap-an-pham-da-co', [QuanLyTonKhoController::class, 'hienThiNhapAnPhamDaCo'])
            ->name('route-cuahang-quanlykho-quanlytonkho-nhapanphamdaco');
        Route::post('/nhap-an-pham-da-co', [QuanLyTonKhoController::class, 'xuLyNhapAnPhamDaCo']);

        // ------------ Route thanh lý ấn phẩm
        Route::get('/thanh-ly-an-pham', [QuanLyTonKhoController::class, 'hienThiThanhLyAnPham'])
            ->name('route-cuahang-quanlykho-quanlytonkho-thanhlyanpham');
        Route::post('/thanh-ly-an-pham', [QuanLyTonKhoController::class, 'xuLyThanhLyAnPham']);

        // ------------ Route cập nhật tình trạng
        Route::get('/cap-nhat-tinh-trang', [QuanLyTonKhoController::class, 'hienThiCapNhatTinhTrang'])
            ->name('route-cuahang-quanlykho-quanlytonkho-capnhattinhtrang');
        Route::post('/cap-nhat-tinh-trang', [QuanLyTonKhoController::class, 'xuLyCapNhatTinhTrang']);
    });

    // -------- Route quản lý danh mục
    Route::prefix('/quan-ly-danh-muc')->group(function () {
        Route::get('/', [QuanLyDanhMucController::class, 'hienThiQuanLyDanhMuc'])
            ->name('route-cuahang-quanlykho-quanlydanhmuc');

        Route::get('/them-danh-muc', [QuanLyDanhMucController::class, 'hienThiThemDanhMuc'])
            ->name('route-cuahang-quanlykho-quanlydanhmuc-themdanhmuc');
        Route::post('/them-danh-muc', [QuanLyDanhMucController::class, 'xuLyThemDanhMuc']);

        Route::get('/cap-nhat-danh-muc/{madanhmuc}', [QuanLyDanhMucController::class, 'hienThiCapNhatDanhMuc'])
            ->name('route-cuahang-quanlykho-quanlydanhmuc-capnhatdanhmuc');
        Route::post('/cap-nhat-danh-muc/{madanhmuc}', [QuanLyDanhMucController::class, 'xuLyCapNhatDanhMuc']);
    });

    // -------- Route tạo báo cáo
    Route::get('/tao-bao-cao', [TaoBaoCaoController::class, 'hienThiTaoBaoCao'])
        ->name('route-cuahang-quanlykho-taobaocao');

    Route::post('/tao-bao-cao', [TaoBaoCaoController::class, 'taoBC']);
});



// 3 > Route bên khách hàng

// ---- 3.1 > Route không cần đăng nhập
Route::middleware('check_guest_or_customer')->group(function () {
    // -------- Route trang chủ
    Route::get('/', [TrangChuController::class, 'hienThiTrangChu'])->name('route-khachhang-trangchu');
    // -------- Route chi tiết ấn phẩm
    Route::get('/chi-tiet-an-pham/{mactanpham}', [ChiTietAnPhamController::class, 'hienThiChiTietAnPham'])->name('route-khachhang-chitietanpham');

    // -------- Route liên hệ
    // Route::get('/lien-he', [TrangChuController::class, 'hienThiTrangChu'])->name('route-khachhang-lienhe');
    Route::get('/lien-he', [LienHeController::class, 'LienHe'])->name('route-khachhang-lienhe');

    // -------- Route tìm kiếm ấn phẩm
    // Route::get('/tim-kiem-an-pham', [TrangChuController::class, 'hienThiTrangChu'])->name('route-khachhang-timkiemanpham');
    Route::get('/search', [TimKiemController::class, 'search'])->name('route-khachhang-timkiem');
    // -------- Route chính sách
    Route::get('/chinh-sach', [ChinhSachController::class, 'hienThiChinhSach'])->name('route-khachhang-chinhsach');
    // -------- Route cac bai bao
    Route::get('/cac-bai-bao', [CacBaiBaoController::class, 'hienThiCacBaiBao'])->name('route-khachhang-cacbaibao');
    // -------- Route chi tiết bài báo
    Route::get('/cac-bai-bao/{mabaibao}', [CacBaiBaoController::class, 'hienThiChiTietBaiBao'])->name('route-khachhang-chitietbaibao');

    // -------- Route Danh sách ấn phẩm
    Route::get('/danh-sach-an-pham', [DanhSachAnPhamController::class, 'hienThiDanhSachAnPham'])->name('route-khachhang-danhsachanpham');
    // -------- Route danh sách ấn phẩm theo danh mục
    Route::get('/danh-muc/{danhMuc}', [DanhSachAnPhamController::class, 'hienThiDanhMuc'])->name('route-khachhang-danhmuc');
    // -------- Route đặt trước ấn phẩm
    // Route::post('/dat-truoc-an-pham/{maanpham}', [DanhSachAnPhamController::class, 'datTruocAnPham'])->name('route-khachhang-dattruocanpham');
});



// ---- 3.2 > Route cần đăng nhập
// -------- Route thuê ấn phẩm
Route::middleware('xac_thuc:khachhang')->group(function () {
    Route::get('/thue-an-pham', [ThueAnPhamController::class, 'hienThiThueAnPham'])->name('route-khachhang-thueanpham');
    Route::post('thue-an-pham/sua-thong-tin-thue', [ThueAnPhamController::class, 'suaThongTinThue'])->name('route-khachhang-thueanpham-suathongtinthue');
    Route::get('thue-an-pham/hoa-don', [HoaDonThueAnPhamController::class, 'hienThiHoaDon'])->name('route-khachhang-thueanpham-hoadon');
    Route::post('thue-an-pham/hoa-don/xu-ly-thanh-toan', [HoaDonThueAnPhamController::class, 'xuLyThanhToan'])->name('route-khachhang-thueanpham-xulyhoadon');
    Route::get('thue-an-pham/hoa-don/ngan-hang', [HoaDonThueAnPhamController::class, 'chuyenKhoan'])->name('route-khachhang-thueanpham-nganhang');
    Route::post('thue-an-pham/hoa-don/ngan-hang/xulynganhang', [HoaDonThueAnPhamController::class, 'xuLyNganHang'])->name('route-khachhang-thueanpham-xulynganhang');
    Route::get('thue-an-pham/hoa-don/momo', [HoaDonThueAnPhamController::class, 'momo'])->name('route-khachhang-thueanpham-momo');
    Route::post('thue-an-pham/hoa-don/momo/xulymomo', [HoaDonThueAnPhamController::class, 'xuLyMoMo'])->name('route-khachhang-thueanpham-xulymomo');
   

    //    // -------- Route đặt trước ấn phẩm
    // //    Route::get('/dat-truoc-an-pham/{mactanpham}', [DanhSachAnPhamController::class, 'datTruocAnPham'])->name('route-khachhang-dattruocanpham');
    // Route::get('/dat-truoc-an-pham/{mactanpham}', [DanhSachAnPhamController::class, 'hienThiFormDatTruoc'])->name('route-khachhang-hienthiformdattruoc');
    // Route::post('/dat-truoc-an-pham/{mactanpham}', [DanhSachAnPhamController::class, 'datTruocAnPham'])->name('route-khachhang-dattruocanpham');
    // Route::post('/dat-truoc-an-pham/{mactanpham}', [DanhSachAnPhamController::class, 'datTruocAnPham'])->name('route-khachhang-dattruoc-suathongtindattruoc');

    // -------- Route đặt trước ấn phẩm
    Route::get('/dat-truoc-an-pham/{mactanpham}', [DanhSachAnPhamController::class, 'hienThiFormDatTruoc'])->name('route-khachhang-hienthiformdattruoc');
    Route::post('/dat-truoc-an-pham/{mactanpham}', [DanhSachAnPhamController::class, 'datTruocAnPham'])->name('route-khachhang-dattruocanpham');
    // Route::post('/dattruoc-suathongtindattruoc/{mactanpham}', [DanhSachAnPhamController::class, 'suaThongTinDatTruoc'])->name('dattruoc-suathongtindattruoc');
    Route::post('/hoadondattruoc/{mactanpham}', [DanhSachAnPhamController::class, 'hienThiHoaDonDatTruoc'])->name('route-khachhang-hoadondattruoc');
    Route::post('/khachhang/thanhToan/{mactanpham}', [DanhSachAnPhamController::class, 'hienThiThanhToan'])->name('route-khachhang-thanhToan');
    Route::post('/khachhang/dattruoc/xulynganhang', [HoaDonThueAnPhamController::class, 'xuLyChuyenKhoan_DatTruoc'])->name('route-khachhang-dattruoc-xulynganhang');
    // -------- Route giỏ hàng
    Route::get('/gio-hang', [GioHangController::class, 'hienThiGioHang'])->name('route-khachhang-giohang');
    Route::post('gio-hang/them-vao-gio-hang/{mactanpham}', [GioHangController::class, 'themVaoGioHang'])->name('route-khachhang-themvaogiohang');
    Route::delete('gio-hang/xoa-khoi-gio-hang/{maanpham}', [GioHangController::class, 'xoaKhoiGioHang'])->name('route-khachhang-xoakhoigiohang');

    // -------- Route quản lý mua hàng
    Route::get('/quan-ly-mua-hang', [TrangChuController::class, 'hienThiTrangChu'])->name('route-khachhang-quanlymuahang');

    // -------- Route lịch sử mua hàng
    // Route::get('/lich-su-thue', [HoaDonController::class, 'lichSuThue'])->name('route-khachhang-lichsuthue');
    Route::get('/lich-su-thue', [HoaDonController::class, 'lichSuThue'])->name('route-khachhang-lichsuthue');
    // -------- Route đánh giá ấn phẩm
    Route::post('/danhgia/store', [DanhGiaController::class, 'store'])->name('danhgia.store');
    Route::get('/danhgia/{mactanpham}', [DanhGiaController::class, 'create'])->name('danhgia.create');
    // -------- Route gia hạn ấn phẩm
    Route::get('/giahan/create/{mactanpham}', [GiaHanController::class, 'create'])->name('giahan.create');
    Route::post('/giahan/store/{mactanpham}', [GiaHanController::class, 'store'])->name('giahan.store');
    // -------- Route thông tin cá nhân
    Route::get('/thong-tin-ca-nhan', [ThongTinController::class, 'show'])->name('route-khachhang-thongtincanhan');
    Route::put('/cap-nhat-thong-tin', [ThongTinController::class, 'capNhatThongTin'])->name('route-khachhang-capnhatthongtin');
});
