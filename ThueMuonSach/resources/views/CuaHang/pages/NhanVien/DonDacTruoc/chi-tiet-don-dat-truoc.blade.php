@extends('CuaHang.layouts.index')
@section('content')
  <div class="row">
    <div class="pt-3 text-center text-primary col mb-2 fw-bold">
      <h3>Thông Tin Đơn Hàng</h3>
    </div>
    <form id="form-dondattruoc" action="{{ URL::to('nhan-vien/don-dat-truoc/'.$hoaDonThue->id) }}" method="POST">
      @method('PUT')
      @csrf
      <div class="p-2 row">
        <div class="text-start col-4">
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
        <div class="text-start col-4">
          <p class="text-uppercase fs-6 fw-bold">Thông tin sản phẩm</p>
          <div class="pt-3">
            <label for="name" class="form-label fw-bold">Tên sản phẩm:</label>
            <input type="text" class="form-control" value="{{ $hoaDonThue->anpham->name }}" readonly>
            <label for="ngaythue" class="form-label fw-bold pt-4">Ngày Thuê:</label>
            <input type="date" class="form-control" value="{{ $hoaDonThue->NgayThue }}" readonly>
            <label for="ngaydukien" class="form-label fw-bold pt-4">Ngày dự kiến nhận:</label>
            <input type="date" class="form-control" value="18/08/2021">
          </div>
        </div>
        <div class="col-4 text-center ">
          <img src="{{ asset('storage/images/images.jpg') }}" alt="">
        </div>
      </div>
      <div class="col text-end"><button type="submit" class="btn btn-success pe-none opacity-50 " aria-disabled="true" id="btn-Luu" name="btn-Luu">Lưu</button></div>
    </form>
  </div>
@endsection