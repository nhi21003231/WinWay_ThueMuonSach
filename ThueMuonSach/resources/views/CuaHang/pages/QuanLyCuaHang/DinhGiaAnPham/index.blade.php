@extends('CuaHang.layouts.index')

@section('content')
<!-- Content -->
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center border-bottom py-3">
        <h1>Quản lý cửa hàng - Định giá ấn phẩm</h1>
        <div class="d-flex align-items-center">
            <i class="fas fa-user me-2"></i> Admin
            <div class="ms-4">Thứ 6, 20/09/2024</div>
        </div>
    </div>    


    <div class="mt-4">
        <h2>Danh sách ấn phẩm</h2>
        <form action="{{ route('route-cuahang-quanlycuahang-quanlydanhgia.suaDanhGia') }}" method="POST">
            @csrf
            <div class="scrollable-container"> <!-- Container cuộn -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Mã AP</th>
                                <th>Tên AP</th>
                                <th>Giá thuê</th>
                                <th>Giá cọc</th>
                                <th>Năm xuất bản</th>
                                <th>Hình ảnh</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dsanphamList as $anpham)
                            <tr>
                                <input type="hidden" name="id[]" value="{{ $anpham->maanpham }}"> <!-- Trường ẩn cho ID -->
                                <td>{{ $anpham->maanpham }}</td>
                                <td>{{ $anpham->tenanpham }}</td>
                                <td>
                                    <input type="text" class="form-control" name="giathue[]" value="{{ $anpham->giathue }}" required>
                                </td>
                                <td>
                                <td>
                                    <input type="text" class="form-control" name="giacoc[]" value="{{ $anpham->giacoc }}" required>
                                </td>
                                <td>{{ $anpham->chitietanpham->namxuatban }}</td>
                                <td>
                                    <img src="{{ $anpham->chitietanpham->hinhanh }}" alt="">
                                </td>                                
                                <td>
                                    <button 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#delete{{ $anpham->maanpham }}" 
                                        style="outline: none; border: none;" 
                                        type="button" 
                                        data-id="{{ $anpham->maanpham }}"
                                        class="btnDelete">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button> 
                                </td>
                                <!-- Modal Xóa -->
                                {{-- <div class="modal fade" id="delete{{ $danhgia->madanhgia }}" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Xóa đánh giá</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn muốn xóa đánh giá này?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                <form action="{{ route('route-cuahang-quanlycuahang-quanlynhanvien.xoaNhanVien', $danhgia->madanhgia) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="bg-danger btn btn-primary">Xóa</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </tr>  
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-success">Lưu</button>
                </div>
            </div> 
        </form>
    </div> 
@endsection