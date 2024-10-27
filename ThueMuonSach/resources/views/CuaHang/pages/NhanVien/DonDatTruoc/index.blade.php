@extends('CuaHang.layouts.index')
@section('content')
<div class="right">
  <form class="row mb-3" action="" method="GET">
    <div class="col-6 row ps-4">
      <input type="text" class="form-control col-9 w-auto" placeholder="Tìm kiếm..." value="" name="TimKiem">
      <button type="submit" class="ms-2 btn btn-primary col-3" value="TimKiem">Tìm kiếm</button>
    </div>
    <div class="col-6 d-flex justify-content-end">
      <select name="" id="TimKiem" class="form-select w-50 ">
        <option value="">Sắp xếp theo...</option>
        <option value="Ngày Mới Nhất">Sắp xếp theo mới nhất</option>
        <option value="Ngày Mới Nhất">Sắp xếp theo cũ nhất</option>
      </select>
    </div>

  </form>
  <div class="p-2 text-center">
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <td colspan="5" class="bg-primary text-white text-start opacity-75">
              <p class="m-0 p-1 fs-5">Đơn đặt trước</p>
            </td>
          </tr>
          <tr>
            <th scope="col"></th>
            <th scope="col">Tên Khách Hàng</th>
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">Ngày Đặt</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @php
          $stt = 1;
          @endphp
          @foreach ($hoadon as $items)
          <tr class="">
            <td scope="row">{{ $stt++ }}</td>
            <td>{{ $items->khachhang->name }}</td>
            <td>{{ $items->anpham->name }}</td>
            <td>{{ $items->NgayThue }}</td>
            <td><button type="button" class="btn btn-warning"><a class="nav-link text-white"
                  href="{{ URL::to('nhan-vien/don-dat-truoc/'.$items->id.'/chi-tiet') }}">Xem</a></button></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $hoadon->onEachSide(1)->links() }}
    </div>

  </div>
</div>
@endsection