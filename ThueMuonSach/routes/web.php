<?php

use Illuminate\Support\Facades\Route;

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


// ---------------------------------Router đăng ký, đăng nhập (chung cho khách hàng và bên cửa hàng)
Route::get('/dangnhap', function () {
    return view('XacThuc.dangnhap');
});

Route::get('/dangky', function () {
    return view('XacThuc.dangky');
});


// ---------------------------------Router bên cửa hàng (cần đăng nhập quản lý kho, nhân viên,...)
Route::get('/nhan-vien', function () {
    return view('CuaHang.pages.NhanVien.index');
})->name('router-cuahang-nhan-vien');

Route::get('/quan-ly-cua-hang', function () {
    return view('CuaHang.pages.QuanLyCuaHang.index');
})->name('router-cuahang-quan-ly-cua-hang');

Route::get('/quan-ly-kho', function () {
    return view('CuaHang.pages.QuanLyKho.index');
})->name('router-cuahang-quan-ly-kho');

// ----------------------------------Router bên khách hàng
// Router không cần đăng nhập
Route::get('/', function () {
    return view('KhachHang.pages.trang-chu');
})->name('router-khachhang-trang-chu');

Route::get('/chi-tiet-an-pham', function () {
    return view('KhachHang.pages.chi-tiet-an-pham');
})->name('router-khachhang-chi-tiet-an-pham');

// Router cần đăng nhập
Route::get('/thue-an-pham', function () {
    return view('KhachHang.pages.thue-an-pham');
})->name('router-khachhang-thue-an-pham');

Route::get('/gio-hang', function () {
    return view('KhachHang.pages.gio-hang');
})->name('router-khachhang-gio-hang');
