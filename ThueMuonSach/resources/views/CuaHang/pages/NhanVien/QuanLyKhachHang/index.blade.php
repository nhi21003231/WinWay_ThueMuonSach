@extends('CuaHang.layouts.index')

@section('content')
<div class="row">
  <div class="col-6">
    <form action="{{ URL::to('nhan-vien/quan-ly-khach-hang') }}" class="input-group" method="get">
      <input type="text" class="form-control" name="TimKiem" placeholder="Nhập tên khách hàng...">
      <button type="submit" class=" btn btn-primary">Tìm kiếm</button>
    </form>
  </div>
</div>
<div class="row mt-3 bg-primary opacity-75 bg-gradient align-items-center" style="height: 50px">
  <div class="col-8">
    <p class="text-white m-0 fs-5 fw-bold p-1">Danh sách khách hàng</p>
  </div>
  <div class="col-4 row p-0 justify-content-around">
    <div class="border border-1 bg-white col-5 rounded d-flex align-items-center justify-content-center ps-1 btn">
      <i class="fa-solid fa-file"></i>
      <a href="" class="text-black ms-1">Export to Excel</a>
    </div>
    <div class="border border-1 bg-white col-5 rounded d-flex align-items-center justify-content-center ps-1 btn">
      <i class="fa-solid fa-file"></i>
      <a href="" class="text-black ms-1">Export to Excel</a>
    </div>
  </div>
</div>
<div class="table-responsive mt-3">
  <table class="table table-hover">
    <thead>
      <tr class="text-center">
        <th scope="col" class="align-middle text-nowrap"></th>
        <th scope="col" class="align-middle text-nowrap">Tên khách hàng</th>
        <th scope="col" class="align-middle text-nowrap">Số điện thoại</th>
        <th scope="col" class="align-middle text-nowrap">Email</th>
        <th scope="col" class="align-middle text-nowrap">Địa Chỉ</th>
        <th scope="col" class="align-middle text-nowrap">Thành viên</th>
        <td scope="col" class="align-middle text-nowrap"></td>
      </tr>
    </thead>
    <tbody>
      @if (!empty($khachHangs))
      @php
      $stt = 1
      @endphp
      @foreach ($khachHangs as $khachHang)
      <tr class="text-center">
        <td scope="row" class="align-middle">{{ $stt++ }}</td>
        <td scope="row" class="align-middle">{{ $khachHang->hoten }}</td>
        <td scope="row" class="align-middle text-nowrap">{{ $khachHang->dienthoai }}</td>
        <td scope="row" class="align-middle">{{ $khachHang->email }}</td>
        <td scope="row" class="align-middle">{{ $khachHang->diachi }}</td>
        <td scope="row" class="align-middle"><input type="checkbox" class="form-check-control" {{
            $khachHang->lathanhvien == 1 ? 'checked':'' }} disabled></td>
        <td scope="row" class="align-middle">
          <button type="submit" class="btn btn-warning"><a
              href="{{ URL::to('nhan-vien/quan-ly-khach-hang/cap-nhat') }}"><i
                class="fa-regular fa-pen-to-square text-black"></i></a></button>
          <form class="m-0 mt-2" action="{{ URL::to('nhan-vien/quan-ly-khach-hang/'.$khachHang->makhachhang) }}"
            method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-warning btn-xoakh"><i
                class="fa-regular fa-trash-can text-danger"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
      @else
      <p class="text-center text-danger mt-3 fs-5 fw-bold">Không có khách hàng để hiển thị</p>
      @endif
    </tbody>
  </table>
  {{ $khachHangs->onEachSide(1)->links() }}
</div>
</div>
@endsection