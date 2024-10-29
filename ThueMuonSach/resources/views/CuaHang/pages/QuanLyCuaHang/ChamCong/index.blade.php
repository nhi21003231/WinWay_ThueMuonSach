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

    <!-- Form Tìm Kiếm -->
    <form action="{{ route('route-cuahang-quanlycuahang-chamcong') }}" method="GET" class="d-flex">
        <input type="text" name="keyword" class="form-control w-50" placeholder="Tìm kiếm nhân viên...">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </form>

    <!-- Table -->
    <div class="mt-4">
        <h2>Danh sách nhân viên</h2> 
        <form action="{{ route('route-cuahang-quanlycuahang-chamcong.updateChamCong') }}" method="POST">
            @csrf <!-- Token CSRF để bảo mật -->
            <div class="scrollable-container">
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
                            @foreach ($chamcongList as $chamcong)
                            <tr>
                                <td>{{ $chamcong->machamcong }}</td>
                                <td>{{ $chamcong->nhanVien->manhanvien }}</td>
                                <td class="truncate">{{ $chamcong->nhanVien->hoten }}</td>
                                <td>
                                    <input type="datetime-local" class="form-control" name="thoigianvao[]" value="{{ \Carbon\Carbon::parse($chamcong->thoigianvao)->format('Y-m-d\TH:i') }}">
                                </td>
                                <td>
                                    <input type="datetime-local" class="form-control" name="thoigianra[]" value="{{ \Carbon\Carbon::parse($chamcong->thoigianra)->format('Y-m-d\TH:i') }}">
                                </td> 
                                <td>
                                    <select class="form-select" name="ghinhan[]">
                                        <option value="1" {{ $chamcong->ghinhan == '1' ? 'selected' : '' }}>Có mặt</option>
                                        <option value="0" {{ $chamcong->ghinhan == '0' ? 'selected' : '' }}>Vắng mặt</option>
                                    </select>
                                </td>
                                <input type="hidden" name="machamcong[]" value="{{ $chamcong->machamcong }}">
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form> 
    </div>
@endsection