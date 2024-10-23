{{-- phát 21/10 --}}

@extends('CuaHang.layouts.index')

@section('content')

<!-- Content -->
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center border-bottom py-3">
        <h1>Quản lý cửa hàng - Chấm công</h1>
        <div class="d-flex align-items-center">
            <i class="fas fa-user me-2"></i> Admin
            <div class="ms-4">Thứ 6, 20/09/2024</div>
        </div>
    </div>

    <!-- Table -->
    <div class="mt-4">
        <h2>Danh sách nhân viên</h2> 
        <form action="{{ route('route-cuahang-quanlycuahang-chamcong.updateChamCong') }}" method="POST">
            @csrf <!-- Token CSRF để bảo mật -->

            <div class="table-responsive ">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Mã CC</th>
                            <th>Mã NV</th>
                            <th>Họ tên</th>
                            <th>Thời gian vào</th>
                            <th>Thời gian ra</th>
                            <th>Ghi nhận</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($chamCongList as $ChamCong)
                        <tr>
                            <td>{{ $ChamCong->maChamCong }}</td>
                            <td>{{ $ChamCong->nhanVien->maNhanVien }}</td>
                            <td>{{ $ChamCong->nhanVien->hoTen }}</td>
                            <td>
                                <input type="datetime-local" class="form-control" name="thoiGianVao[]" value="{{ \Carbon\Carbon::parse($ChamCong->thoiGianVao)->format('Y-m-d\TH:i') }}">
                            </td>
                            <td>
                                <input type="datetime-local" class="form-control" name="thoiGianRa[]" value="{{ \Carbon\Carbon::parse($ChamCong->thoiGianRa)->format('Y-m-d\TH:i') }}">
                            </td> 
                            <td>
                                <select class="form-select" name="ghiNhan[]">
                                    <option value="Có mặt" {{ $ChamCong->ghiNhan == 'Có mặt' ? 'selected' : '' }}>Có mặt</option>
                                    <option value="Vắng mặt" {{ $ChamCong->ghiNhan == 'Vắng mặt' ? 'selected' : '' }}>Vắng mặt</option>
                                </select>
                            </td>
                            <input type="hidden" name="maChamCong[]" value="{{ $ChamCong->maChamCong }}">
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật trạng thái</button>
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </nav>
        </form>
    </div>
@endsection