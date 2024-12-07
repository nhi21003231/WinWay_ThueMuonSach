@extends('CuaHang.layouts.index')

@section('content')
<h1>Nhân viên - Đăng ký thành viên</h1>
<div class="row">
    <div class="col-4">
      <form action="{{ URL::to('nhan-vien/dang-ky-thanh-vien') }}" class="input-group" method="get">
        <input type="text" class="form-control input-tk" name="TimKiem" placeholder="Nhập tên khách hàng...">
        <button type="submit" class=" btn btn-primary btn-tk" disabled>Tìm kiếm</button>
      </form>
    </div>
  </div>

  @if(request()->has('TimKiem') && request('TimKiem') != '')
  <div class="col-4 mt-2">
      <a href="{{ URL::to('nhan-vien/dang-ky-thanh-vien') }}" class="btn btn-secondary">Hiển thị tất cả</a>
  </div>
  @endif

  <div class="row mt-3 bg-primary opacity-75 bg-gradient align-items-center" style="height: 60px">
    <div class="col-8">
      <p class="text-white m-0 fs-5 fw-bold p-1">Danh sách khách hàng</p>
    </div>
    <div class="col-4 row p-0 justify-content-around">
     
      
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
          
          <td scope="row" class="align-middle">
            <form action="{{ route('route-cuahang-nhanvien-capnhatthanhvien', ['makhachhang' => $khachHang->makhachhang]) }}" method="post">
                @csrf
                @method('POST')
                <input type="checkbox" name="lathanhvien" class="form-check-input" value="1"
                    {{ $khachHang->lathanhvien == 1 ? 'checked' : '' }} onchange="this.form.submit()">
            </form>
        </td>
          
        </tr>
        @endforeach
        @else
        <div class="alert alert-info text-center fw-bold" role="alert">
          Không có khách hàng được tìm thấy.
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @elseif (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
      </tbody>
    </table>
    {{ $khachHangs->onEachSide(1)->links() }}
  </div>
  <!-- Modal -->
 
@endsection