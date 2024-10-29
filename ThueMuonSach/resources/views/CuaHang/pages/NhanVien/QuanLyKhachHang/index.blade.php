@extends('CuaHang.layouts.index')

@section('content')
  <div class="row">
    <div class="col-6">
      <form action="" class="input-group" method="get">
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
  <div class="table-responsive mt-3 text-center">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">Tên khách hàng</th>
          <th scope="col">Số điện thoại</th>
          <th scope="col">Email</th>
          <th scope="col">Địa Chỉ</th>
          <th scope="col">Thành viên</th>
          <td scope="col"></td>
        </tr>
      </thead>
      <tbody>
        <tr class="">
          <td scope="row">1</td>
          <td scope="row">Nguyễn Quang Huy</td>
          <td scope="row">nvquanghuy123@gmail.com</td>
          <td scope="row">0977654660</td>
          <td scope="row">Quận 12, tp.HCM</td>
          <td scope="row"><input type="checkbox" class="form-check-control" checked disabled></td>
          <td>
            <button type="button" class="btn btn-warning"><a href="{{ URL::to('nhan-vien/quan-ly-khach-hang/cap-nhat') }}"><i class="fa-regular fa-pen-to-square text-black"></i></a></button>
            <button type="button" class="btn btn-warning"><a href=""><i class="fa-regular fa-trash-can text-danger"></i></button></a>
          </td>
        </tr>
        <tr class="">
          <td scope="row">1</td>
          <td scope="row">Nguyễn Quang Huy</td>
          <td scope="row">nvquanghuy123@gmail.com</td>
          <td scope="row">0977654660</td>
          <td scope="row">Quận 12, tp.HCM</td>
          <td scope="row"><input type="checkbox" class="form-check-control" checked disabled></td>
          <td>
            <button type="button" class="btn btn-warning"><a href="">Edit</a></button>
            <button type="button" class="btn btn-warning"><a href="">Delete</a></button>
          </td>
        </tr>
        <tr class="">
          <td scope="row">1</td>
          <td scope="row">Nguyễn Quang Huy</td>
          <td scope="row">nvquanghuy123@gmail.com</td>
          <td scope="row">0977654660</td>
          <td scope="row">Quận 12, tp.HCM</td>
          <td scope="row"><input type="checkbox" class="form-check-control" disabled></td>
          <td>
            <button type="button" class="btn btn-warning"><a href="">Edit</a></button>
            <button type="button" class="btn btn-warning"><a href="">Delete</a></button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

</div>
@endsection