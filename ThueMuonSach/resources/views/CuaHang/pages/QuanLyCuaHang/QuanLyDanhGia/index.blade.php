@extends('CuaHang.layouts.index')

@section('content')
<!-- Content -->
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center border-bottom py-3">
        <h1>Quản lý cửa hàng - Quản lý đánh giá</h1>
        <div class="d-flex align-items-center">
            <i class="fas fa-user me-2"></i> Admin
            <div class="ms-4">Thứ 6, 20/09/2024</div>
        </div>
    </div>    


    <div class="mt-4">
        <h2>Danh sách đánh giá</h2>
        <form action="{{ route('route-cuahang-quanlycuahang-quanlydanhgia.suaDanhGia') }}" method="POST">
            @csrf
            <div class="scrollable-container"> <!-- Container cuộn -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Mã ĐG</th>
                                <th>Mã AP</th>
                                <th>Mã KH</th>
                                {{-- <th>Tên AP</th> --}}
                                <th>Tên KH</th>
                                <th>Bình luận</th>
                                <th>Số sao</th>
                                <th>Ngày đánh giá</th>
                                <th>Trạng thái</th>
                                {{-- <th>Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($danhgiaList as $danhgia)
                            <tr>
                                <td>{{ $danhgia->madanhgia }}</td>
                                <td>{{ $danhgia->maanpham }}</td>
                                <td>{{ $danhgia->makhachhang }}</td>
                                {{-- <td>{{ $danhgia->ds_anpham ? $danhgia->ds_anpham->vitri : 'Không có dữ liệu' }}</td> --}}
                                {{-- <td>{{ $danhgia->ds_anpham->chitietanpham ? $danhgia->ds_anpham->chitietanpham->tenanpham : 'Không có dữ liệu' }}</td> --}}
                                <td>{{ $danhgia->khachhang->hoten }}</td>
                                <td class="truncate">
                                    <input type="hidden" name="id[]" value="{{ $danhgia->madanhgia }}"> <!-- Trường ẩn cho ID -->
                                    <input type="text" class="form-control" name="binhluan[]" value="{{ $danhgia->binhluan }}" required>
                                </td>
                                <td class="truncate">
                                    <input type="text" class="form-control" name="sosao[]" value="{{ $danhgia->sosao }}" required>
                                </td>
                                <td class="truncate">
                                    <input type="datetime-local" class="form-control" name="ngaydanhgia[]" value="{{ \Carbon\Carbon::parse($danhgia->ngaydanhgia)->format('Y-m-d\TH:i') }}" required>
                                </td> 

                                <td>
                                    <select class="form-select" name="trangthai[]">
                                        <option value="1" {{ $danhgia->trangthai == '1' ? 'selected' : '' }}>Hiển đánh giá</option>
                                        <option value="0" {{ $danhgia->trangthai == '0' ? 'selected' : '' }}>Ẩn đánh giá</option>
                                    </select>
                                </td>
                                
                                {{-- <td>
                                    <button 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#delete{{ $danhgia->madanhgia }}" 
                                        style="outline: none; border: none;" 
                                        type="button" 
                                        data-id="{{ $danhgia->madanhgia }}"
                                        class="btnDelete">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button> 
                                </td> --}}
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