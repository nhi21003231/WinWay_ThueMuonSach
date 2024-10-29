@extends('CuaHang.layouts.index')
@section('content')
<div class="row">
  <div class="pt-3 text-center text-primary col mb-2 fw-bold">
    <h3>Thông Tin Đơn Hàng</h3>
  </div>
  <form id="form-dondattruoc" action="{{ URL::to('nhan-vien/don-dat-truoc/'.$hoaDonThue->mahoadon) }}" method="POST">
    @method('PUT')
    @csrf
    <div class="p-2 row">
      {{-- Thông tin khách hàng --}}
      <div class="text-start col-4">
        <p class="text-uppercase fs-6 fw-bold">Thông tin khách hàng</p>
        <div class="pt-3">
          <div class="aaaa">
            {{-- Tên khách hàng --}}
            <label for="name" class="form-label fw-bold ps-2">Tên khách hàng:</label>
            <input type="text" class="form-control" value="{{ old('tenkhachhang',$hoaDonThue->khachHang->hoten) }}"
              name="tenkhachhang" readonly>
            @error('tenkhachhang')
            <span class="text-danger fs-6 m-0 ps-1">{{ $message }}</span>
            @enderror
          </div>
          {{-- Số điện thoại --}}
          <div class="pt-4">
            <label for="sdt" class="form-label fw-bold ps-2">Số điện thoại</label>
            <input type="text" class="form-control" value="{{ $hoaDonThue->khachHang->dienthoai }}" name="sodienthoai"
              readonly>
            @error('sodienthoai')
            <span class="text-danger fs-6 m-0 ps-1">{{ $message }}</span>
            @enderror
          </div>
          {{-- Địa chỉ khách hàng --}}
          <div class="pt-4">
            <label for="diachi" class="form-label fw-bold ps-2">Địa chỉ</label>
            <input type="text" class="form-control overflow-hidden" value="{{ old('diachi',$hoaDonThue->khachHang->diachi) }}"
              name="diachi">
            @error('diachi')
            <span class="text-danger fs-6 m-0 ps-1">{{ $message }}</span>
            @enderror
          </div>
          {{-- Loại đơn --}}
          <div class="pt-4">
            <label for="loaiDon" class="form-label fw-bold ps-2">Loại Đơn</label>
            <select name="loaidon" id="loaidon" class="form-select">
              <option value="" {{ old('loaidon',$hoaDonThue->loaidon == '' ? 'selected':'') }}>Chọn loại đơn...
              </option>
              <option value="Đặt trước" {{ old('loaidon',$hoaDonThue->loaidon == 'Đặt trước'?'selected':'') }}>Đơn
                đặt trước</option>
              <option value="Đơn Thuê" {{ old('loaidon',$hoaDonThue->loaidon == 'Đặt thuê'?'selected':'') }}>Đơn
                Thuê</option>
            </select>
            @error('loaidon')
            <span class="text-danger fs-6 m-0 ps-1">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>
      {{-- Thông tin ấn phẩm --}}
      <div class="text-start col-8 row">
        <div class="col-12 row mb-3">
          <p class="text-uppercase fs-6 fw-bold">Thông tin sản phẩm</p>
          {{-- Hiển thị thông tin ấn phẩm --}}
          @php
          $stt = 1
          @endphp
          @foreach ($hoaDonThue->chiTietHoaDons as $chitiet)
          <div class="pt-3 col-4">
            {{-- tên ấn phẩm --}}
            <div class="bbbbb">
              <label for="name" class="form-label fw-bold ps-2">Ấn phẩm {{ $stt++ }}</label>
              <input type="text" class="form-control overflow-hidden"
                value="{{ $chitiet->dsAnPham->chiTietAnPhams->tenanpham }}" readonly>
            </div>
            <div class="text-center mt-2 overflow-hidden">
              <img src="{{ asset('storage/images/images.jpg') }}" alt="" width="120px" height="160px">
            </div>
          </div>
          @endforeach
        </div>
        {{-- Ngày thuê --}}
        <div class="pt-4 col-6">
          <label for="ngaythue" class="form-label fw-bold ps-2">Ngày Thuê:</label>
          <input type="date" class="form-control" value="{{ $hoaDonThue->ngaythue }}" name="ngaythue" readonly>
        </div>
        {{-- Ngày dự kiến nhận --}}
        <div class="pt-4 col-6">
          <label for="ngaydukien" class="form-label fw-bold ps-2">Ngày dự kiến nhận:</label>
          <input type="date" class="form-control"
            value="{{ old('ngaydukien',\Carbon\Carbon::parse($hoaDonThue->ngaythue)->addDays(7)->format('Y-m-d')) }}"
            name="ngaydukien">
          @error('ngaydukien')
          <span class="text-danger fs-6 m-0 ps-1">{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>
    <div class="col text-end"><button type="submit" class="btn btn-success pe-none opacity-50 " aria-disabled="true"
        id="btn-Luu" name="btn-Luu">Lưu</button></div>
  </form>
</div>
@endsection