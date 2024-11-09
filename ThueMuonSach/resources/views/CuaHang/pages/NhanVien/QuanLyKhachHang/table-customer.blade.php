@extends('app')
@section('main')
@php
$stt = 1
@endphp
<table class="table table-bordered">
  <tr>
    <th colspan="7" class="fw-bold fs-2">Danh sách khách hàng</th>
  </tr>
  <tr>
    <th scope="col" class="text-center">ID</th>
    <th scope="col" class="text-center">Mã Khách Hàng</th>
    <th scope="col" class="text-center">Họ và Tên</th>
    <th scope="col" class="text-center">Email</th>
    <th scope="col" class="text-center">Số Điện Thoại</th>
    <th scope="col" class="text-center">Địa Chỉ</th>
    <th scope="col" class="text-center">Là Thành Viên</th>
  </tr>
  @foreach ($customers as $customer)
  <tr>
    <td scope="row">{{ $stt++ }}</td>
    <td scope="row">{{ $customer->makhachhang }}</td>
    <td scope="row">{{ $customer->hoten }}</td>
    <td scope="row">{{ $customer->email }}</td>
    <td scope="row">{{ $customer->dienthoai }}</td>
    <td scope="row">{{ $customer->diachi }}</td>
    <td scope="row">{{ $customer->lathanhvien }}</td>
  </tr>
  @endforeach
</table>
@endsection