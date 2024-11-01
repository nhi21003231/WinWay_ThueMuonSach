{{-- phát 21/10 --}}

@extends('CuaHang.layouts.index')

@section('content')

<!-- Content -->

    <div id="chamcongPage">
        <!-- Form Tìm Kiếm -->
        <form action="{{ route('route-cuahang-quanlycuahang-chamcong') }}" method="GET" class="d-flex">
            <input type="text" name="keyword" class="form-control w-50" placeholder="Tìm kiếm nhân viên...">
            <button type="submit" class="btn btn-dark">Tìm kiếm</button>
        </form>

        <!-- Table -->
        <div class="mt-4">
            <div class="d-flex justify-content-between align-content-center mb-2">
                <h3>Danh sách chấm công</h3>
                <div class="dropdown ms-3">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        Chọn cột hiển thị
                    </button>
                    <div class="dropdown-menu p-3" style="min-width: 200px;">
                        <!-- Checkbox chọn cột -->
                        <label><input type="checkbox" class="column-toggle" data-column="machamcong" checked> Mã CC</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="manhanvien" checked> Mã NV</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="hoten" checked> Họ tên</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="checkin" checked> Check-In</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="checkout" checked> Check-Out</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="ghinhan" checked> Ghi nhận</label><br>
                        
                        <!-- Nút Bỏ chọn -->
                        <button type="button" class="btn btn-link mt-2" id="resetColumns">Bỏ chọn</button>
                    </div>
                </div>
            </div>
            <form action="{{ route('route-cuahang-quanlycuahang-chamcong.updateChamCong') }}" method="POST">
                @csrf <!-- Token CSRF để bảo mật -->
                <div class="scrollable-container">
                    <div class="table-responsive ">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th id="col-machamcong">Mã CC</th>
                                    <th id="col-manhanvien">Mã NV</th>
                                    <th id="col-hoten">Họ tên</th>
                                    <th id="col-checkin">Thời gian vào</th>
                                    <th id="col-checkout">Thời gian ra</th>
                                    <th id="col-ghinhan">Ghi nhận</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($chamcongList as $chamcong)
                                <tr>
                                    <td class="col-machamcong">{{ $chamcong->machamcong }}</td>
                                    <td class="col-manhanvien">{{ $chamcong->nhanVien->manhanvien }}</td>
                                    <td class="col-hoten truncate">{{ $chamcong->nhanVien->hoten }}</td>
                                    <td class="col-checkin">
                                        <input type="datetime-local" class="form-control" name="thoigianvao[]" value="{{ \Carbon\Carbon::parse($chamcong->thoigianvao)->format('Y-m-d\TH:i') }}">
                                    </td>
                                    <td class="col-checkout">
                                        <input type="datetime-local" class="form-control" name="thoigianra[]" value="{{ \Carbon\Carbon::parse($chamcong->thoigianra)->format('Y-m-d\TH:i') }}">
                                    </td> 
                                    <td>
                                        <select class="col-ghinhan form-select" name="ghinhan[]">
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
                <button type="submit" class="btn btn-danger mt-3">Cập nhật</button>
            </form> 
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        getDefualtColumns();
        preventDefaultSelection();
    });
</script>