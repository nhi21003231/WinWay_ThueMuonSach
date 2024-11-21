@extends('CuaHang.layouts.index')

@section('content')
<div class="row">
  <div class="col-4">
    <form action="{{ URL::to('nhan-vien/quan-ly-khach-hang') }}" class="input-group" method="get">
      <input type="text" class="form-control input-tk" name="TimKiem" placeholder="Nhập tên khách hàng...">
      <button type="submit" class=" btn btn-primary btn-tk" disabled>Tìm kiếm</button>
    </form>
  </div>
</div>
<div class="row mt-3 bg-primary opacity-75 bg-gradient align-items-center" style="height: 60px">
  <div class="col-8">
    <p class="text-white m-0 fs-5 fw-bold p-1">Danh sách khách hàng</p>
  </div>
  <div class="col-4 row p-0 justify-content-end">
    <div class="border border-1 bg-white col-5 rounded d-flex align-items-center justify-content-center ps-1 btn">
      <i class="fa-solid fa-file"></i>
      <a href="{{ URL::to('nhan-vien/quan-ly-khach-hang/export') }}" class="text-black ms-1">Export to Excel</a>
    </div>
    {{-- <div class="col-5 rounded d-flex align-items-center justify-content-center btn bg-success px-0">
      <a href="" class="text-white fw-bold">Thêm Khách Hàng</a>
    </div> --}}
  </div>
</div>
<div class="table-responsive mt-3">
  @if (!empty($khachHangs) && $khachHangs->count() > 0)
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
          <button type="button" class="btn btn-warning btn-update" data-bs-toggle="modal"
            data-event-id="{{ $khachHang->makhachhang }}" data-bs-target="#modal-khachhang"><i
              class="fa-regular fa-pen-to-square text-primary"></i></button>
          <form name="form-deleteCustomer" id="form-deleteCustomer" class="m-0 mt-2" action="{{ URL::to('nhan-vien/quan-ly-khach-hang/'.$khachHang->makhachhang) }}"
            method="post">
            @csrf
            @method('DELETE')
            <button type="button" class="btn btn-warning btn-xoakh"><i
                class="fa-regular fa-trash-can text-danger"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
      @else
      <div class="alert alert-info text-center fw-bold" role="alert">
        Không có khách hàng được tìm thấy.
      </div>
      @endif
    </tbody>
  </table>
  {{ $khachHangs->onEachSide(-1)->links() }}
</div>
<!-- Modal -->
<form id="form-capnhatCustomer" method="post">
  @csrf
  <input type="hidden" name="customerID" id="customerID" value="">
  <div class="modal fade" id="modal-khachhang" tabindex="-1" aria-labelledby="modalkhachhang" aria-hidden="true" aria-modal="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header bg-info opacity-75 bg-gradient text-center">
          <h5 class="modal-title fw-bold text-uppercase" id="modalkhachhang">Thông tin khách hàng</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          {{-- Nội dung modal --}}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button type="submit" class="btn btn-primary btn-modal-update" disabled id="btn-capnhatKH">Cập nhật</button>
        </div>
      </div>
    </div>
  </div>
  </div>
</form>
@endsection