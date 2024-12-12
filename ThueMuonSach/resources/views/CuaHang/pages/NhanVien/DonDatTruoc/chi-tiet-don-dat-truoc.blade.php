@extends('CuaHang.layouts.index')
@section('content')
<div class="row">
  <div class="py-2 text-center col mb-2 fw-bold text-uppercase bg-warning text-white">
    <h3 class="m-0">Thông Tin Đơn Hàng</h3>
  </div>
  <form id="form-dondattruoc" action="{{ URL::to('nhan-vien/don-dat-truoc/'.$hoaDonThue->mahoadon) }}" method="POST">
    @method('PUT')
    @csrf
    {{-- Truyền id chitietanpham --}}
    <input type="hidden" name="id_ctanpham" value="{{ $hoaDonThue->chitietanpham->mactanpham }}" autocomplete="off">
    <div class="p-2 row">
      {{-- Thông tin khách hàng --}}
      <div class="text-start col-5">
        <p class="text-uppercase fs-6 fw-bold">Thông tin khách hàng</p>
        <div class="pt-3">
          <div class="aaaa">
            {{-- Tên khách hàng --}}
            <label for="name" class="form-label fw-bold ps-2">Tên khách hàng:</label>
            <input type="text" class="form-control" value="{{ old('tenkhachhang',$hoaDonThue->khachHang->hoten) }}"
              name="tenkhachhang" readonly>
            @error('tenkhachhang')
            <span class="text-danger ms-2 m-0 ps-1" style="font-size: 13px">{{ $message }}</span>
            @enderror
          </div>
          {{-- Số điện thoại --}}
          <div class="pt-4">
            <label for="sdt" class="form-label fw-bold ps-2">Số điện thoại</label>
            <input type="text" class="form-control" value="{{ old('sodienthoai',$hoaDonThue->khachHang->dienthoai) }}"
              name="sodienthoai" readonly>
            @error('sodienthoai')
            <span class="text-danger ms-2 m-0 ps-1" style="font-size: 13px">{{ $message }}</span>
            @enderror
          </div>
          {{-- Địa chỉ khách hàng --}}
          <div class="pt-4">
            <label for="diachi" class="form-label fw-bold ps-2">Địa chỉ</label>
            <input type="text" class="form-control overflow-hidden"
              value="{{ old('diachi',$hoaDonThue->khachHang->diachi) }}" name="diachi" readonly>
            @error('diachi')
            <span class="text-danger ms-2 m-0 ps-1" style="font-size: 13px">{{ $message }}</span>
            @enderror
          </div>
          <div class="pt-4">
            <label for="trangthai" class="form-label fw-bold ps-2">Trạng thái</label>
            <select name="trangthai" id="trangthai" class="form-select" disabled>
              <option value="" {{ old('trangthai',$hoaDonThue->trangthai == '' ? 'selected':'') }}>Chọn trạng thái...
              </option>
              <option value="" {{ old('trangthai',$hoaDonThue->trangthai == 'Đang xử lý'?'selected':'') }}>Đang xử lí</option>
              <option value="{{ $hoaDonThue->trangthai }}" {{ old('trangthai',$hoaDonThue->trangthai == 'Đang chờ sách'?'selected':'') }}>Đang chờ sách</option>
              <option value="{{ $hoaDonThue->trangthai }}" {{ old('trangthai',$hoaDonThue->trangthai == 'Đã có sách'?'selected':'') }}>Đã có sách</option>
            </select>
            @error('trangthai')
            <span class="text-danger ms-2 m-0 ps-1" style="font-size: 13px">{{ $message }}</span>
            @enderror
          </div>
          {{-- Loại đơn --}}
         @if($hoaDonThue->trangthai === 'Đã có sách')
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
            <span class="text-danger ms-2 m-0 ps-1" style="font-size: 13px">{{ $message }}</span>
            @enderror
          </div>
         @endif
        </div>
      </div>
      {{-- Thông tin ấn phẩm --}}
      <div class="text-start col-7">
        <div class="row">
          <div class="col-12 mb-3">
            <p class="text-uppercase fs-6 fw-bold">Thông tin sản phẩm</p>
          </div>
          <div class="mt-4 col-6">
            {{-- tên ấn phẩm --}}
            <div class="bbbbb">
              <h5 class=" p-2 fw-bold">Tên sách: <span class="fw-normal">{{ $hoaDonThue->chitietanpham->tenanpham }}</span></h5>
            </div>
            <div class="bbbbb mt-2">
              <h5 class=" p-2 fw-bold">Tác giả: <span class="fw-normal">{{ $hoaDonThue->chitietanpham->tacgia }}</span></h5>
            </div>
            <div class="bbbbb mt-2">
              <h5 class=" p-2 fw-bold">Giá thuê: <span class="fw-normal">{{ number_format($hoaDonThue->chitietanpham->giathue, 0, '.', ',') }} VNĐ</span></h5>
            </div>
            <div class="bbbbb mt-2">
              <h5 class=" p-2  fw-bold">Giá cọc: <span class="fw-normal">{{ number_format($hoaDonThue->chitietanpham->giacoc, 0, '.', ',') }} VNĐ</span></h5>
            </div>
          </div>
          <div class="text-center mt-2 col-6">
            <img src="{{ asset('img/anh-an-pham/'.$hoaDonThue->chitietanpham->hinhanh) }}" alt="hình ảnh sản phẩm" height="248px">
          </div>
          {{-- Ngày thuê --}}
          <div class="pt-4 col-6">
            <label for="ngaythue" class="form-label fw-bold ps-2">Ngày Đặt:</label>
            <input type="date" class="form-control" value="{{ $hoaDonThue->ngaythue }}" name="ngaythue" readonly>
          </div>
          {{-- Ngày dự kiến nhận --}}
          <div class="pt-4 col-6">
            <label for="ngaydukien" class="form-label fw-bold ps-2">Ngày dự kiến nhận:</label>
            <input type="date" class="form-control"
              value="{{ old('ngaydukien',\Carbon\Carbon::parse($hoaDonThue->ngaythue)->addDays(7)->format('Y-m-d')) }}"
              name="ngaydukien" readonly>
            @error('ngaydukien')
            <span class="text-danger ms-2 m-0 ps-1" style="font-size: 13px">{{ $message }}</span>
            @enderror
          </div>
        </div>
      </div>
    </div>
    <div class="col text-end">
      <button type="submit" class="btn btn-secondary" name="btn-cancel"><a href="{{ URL::to('nhan-vien/don-dat-truoc') }}" class="nav-link">Trở về</a></button>
      <button type="submit" class="btn btn-success pe-none opacity-50 " aria-disabled="true" id="btn-Luu"
        name="btn-Luu">Lưu</button>
    </div>
  </form>
</div>
@endsection