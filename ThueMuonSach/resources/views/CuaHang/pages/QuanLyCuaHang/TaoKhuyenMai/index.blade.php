@extends('CuaHang.layouts.index')

@section('content')
<div class="d-flex justify-content-between align-items-center border-bottom py-3">
    <h1>Quản lý cửa hàng - Tạo khuyến mãi</h1>
    <div class="d-flex align-items-center">
        <i class="fas fa-user me-2"></i> Admin
        <div class="ms-4">Thứ 6, 20/09/2024</div>
    </div>
</div>

{{-- Content --}}
<form class="modal-body" action="{{ route('route-cuahang-quanlycuahang-taokhuyenmai.themCTKhuyenMai') }}" method="POST">
    @csrf
    <div class="form-group mb-3">
        <label for="program-name" class="form-label">Tên chương trình khuyến mãi</label>
        <input type="text" class="form-control" id="program-name" name="tenchuongtrinhkm" required>
    </div>
    <div class="form-group mb-3">
        <label for="description" class="form-label">Mô tả</label>
        <textarea class="form-control" id="description" name="mota" required></textarea>
    </div>
    <div class="d-flex gap-3">
        <div class="form-group mb-3 w-100">
            <label for="start-date" class="form-label">Ngày bắt đầu</label>
            <div class="input-group">
                <input type="datetime-local" class="form-control" id="start-date" name="ngayapdung" required>
            </div>
        </div>
        <div class="form-group mb-3 w-100">
            <label for="end-date" class="form-label">Ngày kết thúc</label>
            <div class="input-group">
                <input type="datetime-local" class="form-control" id="end-date" name="ngayketthuc" required>
            </div>
        </div>
    </div>
    <div class="form-group mb-3">
        <label for="target" class="form-label">Đối tượng áp dụng</label>
        <input type="text" class="form-control" id="target" value="Khách hàng thành viên" disabled>
    </div>
    <div class="submit-btn">
        <button type="submit" class="btn btn-success">Tạo khuyến mãi</button>
    </div>
</form>

{{-- Danh sách --}}
<h2>Danh sách chương trình khuyến mãi</h2>
        <form action="{{ route('route-cuahang-quanlycuahang-taokhuyenmai') }}" method="POST">
            @csrf
            <div class="scrollable-container"> <!-- Container cuộn -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Mã CTKM</th>
                                <th>Tên chương trình</th>
                                <th>Mô tả</th>
                                <th>Ngày áp dụng</th>
                                <th>Ngày kết thúc</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($khuyenmaiList as $khuyenmai)
                            <tr>
                                <td>{{ $khuyenmai->mactkm }}</td>
                                <td class="truncate">
                                    <input type="hidden" name="id[]" value="{{ $khuyenmai->mactkm }}"> <!-- Trường ẩn cho ID -->
                                    <input type="text" class="form-control" name="tenkhuyenmai[]" value="{{ $khuyenmai->tenchuongtrinhkm }}" required>
                                </td>
                                <td class="truncate">
                                    <input type="text" class="form-control" name="mota[]" value="{{ $khuyenmai->mota }}" required>
                                </td>
                                <td>
                                    <input type="datetime-local" class="form-control" name="ngayapdung[]" value="{{ \Carbon\Carbon::parse($khuyenmai->ngayapdung)->format('Y-m-d\TH:i') }}">
                                </td>
                                <td>
                                    <input type="datetime-local" class="form-control" name="ngayketthuc[]" value="{{ \Carbon\Carbon::parse($khuyenmai->ngayketthuc)->format('Y-m-d\TH:i') }}">
                                </td>
                                <td>
                                    <button 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#delete{{ $khuyenmai->mactkm }}" 
                                        style="outline: none; border: none;" 
                                        type="button" 
                                        data-id="{{ $khuyenmai->mactkm }}"
                                        class="btnDelete">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button> 
                                </td>
                                <!-- Modal Xóa -->
                                {{-- <div class="modal fade" id="delete{{ $nhanvien->manhanvien }}" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Xóa nhân viên</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn muốn xóa nhân viên này?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                <form action="{{ route('route-cuahang-quanlycuahang-quanlynhanvien.xoaNhanVien', $nhanvien->manhanvien) }}" method="POST">
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

@endsection
