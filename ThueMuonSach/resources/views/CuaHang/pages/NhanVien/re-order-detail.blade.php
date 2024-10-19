@extends('CuaHang.layouts.index')
@section('content')
  <div class="right">
    <div class="pt-3 text-center text-primary">
      <h3>Thông Tin Đơn Hàng</h3>
    </div>
    <div class="p-2 d-flex justify-content-around">
      <div class="text-start">
        <p class="text-uppercase fs-6 fw-bold">Thông tin khách hàng</p>
        <div class="pt-3">
          <label for="name" class="form-label fw-bold">Tên khách hàng:</label>
          <input type="text" class="form-control" value="{{ $hoaDonThue->khachhang->name }}">
          <label for="loaiDon" class="form-label fw-bold pt-4">Loại Đơn</label>
          <select name="loaidon" id="loaidon" class="form-select">
            <option value="">Chọn loại đơn....</option>
            <option value="Đơn đặt trước" @selected($hoaDonThue->LoaiDon == 'Đơn đặt trước')>Đơn đặt trước</option>
            <option value="Đơn Thuê" @selected($hoaDonThue->LoaiDon == 'Đơn thuê')>Đơn Thuê</option>
          </select>
        </div>
      </div>
      <div class="text-start">
        <p class="text-uppercase fs-6 fw-bold">Thông tin sản phẩm</p>
        <div class="pt-3">
          <label for="name" class="form-label fw-bold">Tên sản phẩm:</label>
          <input type="text" class="form-control" value="{{ $hoaDonThue->anpham->name }}" readonly>
          <label for="ngaythue" class="form-label fw-bold pt-4">Ngày Thuê:</label>
          <input type="date" class="form-control" value="{{ $hoaDonThue->NgayThue }}" readonly>
        </div>
      </div>
    </div>
  </div>
@endsection