@extends('CuaHang.layouts.index')

@section('content')
<div class="title p-2 bg-success w-25 rounded">
  <p class="fw-bold text-white fs-4 m-0 p-2">Tạo báo cáo</p>
</div>
<form action="{{ URL::to('quan-ly-kho/tao-bao-cao') }}" method="post">
  @csrf
  <div class="row justify-content-end">
    <div class="col-4">
      <label for="loaibc" class="form-label ps-2 fw-bold">Chọn loại báo cáo</label>
      <select name="loaibc" id="loaibc" class="form-select">
        <option value="BCSL">Báo cáo số lượng</option>
        <option value="BCTSSD">Báo cáo tần suất sử dụng</option>
        <option value="BCHH">Báo cáo hư hỏng</option>
      </select>
    </div>
  </div>
  <div class="row mt-3">
    <div class="col-3">
      <label for="danhmuc" class="form-label fw-bold ps-3">Danh mục</label>
      <select name="danhmuc" id="danhmuc" class="form-select">
        <option value="">Chọn danh mục...</option>
        @foreach ($danhmucs as $danhmuc)
        <option value="{{ $danhmuc->madanhmuc }}">{{ $danhmuc->tendanhmuc }}</option>
        @endforeach
      </select>
    </div>
    <div class="col-3">
      <label for="startdate" class="form-label fw-bold">Từ ngày</label>
      <input type="date" name="startdate" id="startdate" class="form-control">
      <span class="text-danger ps-2 " id="error-startdate"></span>
    </div>
    <div class="col-3">
      <label for="enddate" class="form-label fw-bold">Đến ngày</label>
      <input type="date" name="enddate" id="enddate" class="form-control">
    </div>
    <div class="col-12 d-flex justify-content-end mt-3">
      <button type="button" class="btn btn-success btn-report">Áp dụng</button>
    </div>
  </div>
  <div class="main-report bs-scroll position-relative">
    {{-- @include('CuaHang.pages.QuanLyKho.TaoBaoCao.table-report') --}}
  </div>
  <div class="mt-4 d-none" id="action-report">
    <input type="hidden" name="export_excel" value="1">
    <button type="submit" class="btn btn-success" id="export-report">Xuất file
      Excel
    </button>
    <button type="button" class="btn btn-secondary" id="cancel-report">Hủy</button>
  </div>
</form>

@endsection