{{-- @extends('CuaHang.layouts.index')

@section('content')
<h1>Nhân viên - Đăng ký thành viên</h1>
@endsection --}}
@extends('CuaHang.layouts.index')

@section('content')
<div class="container my-5">
    <h2>Đăng Ký Thành Viên</h2>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('route-cuahang-nhanvien-dangkythanhvien-capnhat') }}" method="POST">
        @csrf
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tên Khách Hàng</th>
                    <th>Email</th>
                    <th>Thành Viên</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->hoten }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            <input type="checkbox" name="members[]" value="{{ $customer->makhachhang }}" {{ $customer->lathanhvien ? 'checked' : '' }}>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Cập Nhật Thành Viên</button>
    </form>
</div>
@endsection