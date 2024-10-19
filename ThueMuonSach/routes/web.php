<?php
use App\Http\Controllers\DonDatTruocController;
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


// ---------------------------------Route đăng ký, đăng nhập (chung cho khách hàng và bên cửa hàng)
// Route::get('/dangnhap', function () {
//     return view('XacThuc.dangnhap');
// });
// Route::get('/dangky', function () {
//     return view('XacThuc.dangky');
// });

Route::get('/dangnhap', [XacThucController::class, 'hienThiDangNhap'])->name('route-dang-nhap');
Route::post('/dangnhap', [XacThucController::class, 'dangNhap'])->name('route-dang-nhap');

Route::get('/dangky', [XacThucController::class, 'hienThiDangKy'])->name('route-dang-ky');



// ---------------------------------Route bên cửa hàng (cần đăng nhập quản lý kho, nhân viên,...)

// ---------------------------------Nhân Viên

Route::get('/nhan-vien', function () {
    return view('CuaHang.pages.NhanVien.index');
})->name('route-cuahang-nhan-vien');

// -------Re-order-nhan-vien
Route::get('re-order',[DonDatTruocController::class,'index'])->name('re-order');
Route::get('re-order/{hoaDonThue}/detail',[DonDatTruocController::class,'reOrderDetail'])->name('re-order-detail');

// --------------------------------Quản lí cửa hàng
Route::get('/quan-ly-cua-hang', function () {
    return view('CuaHang.pages.QuanLyCuaHang.index');
})->name('route-cuahang-quan-ly-cua-hang');

// --------------------------------Quản lí kho
Route::get('/quan-ly-kho', function () {
    return view('CuaHang.pages.QuanLyKho.index');
})->name('route-cuahang-quan-ly-kho');

// ----------------------------------Route bên khách hàng
// Route không cần đăng nhập
Route::get('/', function () {
    return view('KhachHang.pages.trang-chu');
})->name('route-khachhang-trang-chu');

Route::get('/chi-tiet-an-pham', function () {
    return view('KhachHang.pages.chi-tiet-an-pham');
})->name('route-khachhang-chi-tiet-an-pham');

// Route cần đăng nhập
Route::get('/thue-an-pham', function () {
    return view('KhachHang.pages.thue-an-pham');
})->name('route-khachhang-thue-an-pham');

Route::get('/gio-hang', function () {
    return view('KhachHang.pages.gio-hang');
})->name('route-khachhang-gio-hang');
