@extends('KhachHang.layouts.index')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card Hóa Đơn Đặt Trước -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0 d-flex align-items-center justify-content-center">
                        <i class="fas fa-file-invoice me-2"></i> Hóa Đơn Đặt Trước
                    </h4>
                </div>
                <div class="card-body">
                    <!-- Thông Tin Khách Hàng -->
                    <div class="mb-4">
                        <h5><i class="fas fa-user me-2 text-info"></i> Thông Tin Khách Hàng</h5>
                        <p><strong>Khách hàng:</strong> {{ $khachHang->hoten }}</p>
                        <p><strong>Địa chỉ:</strong> {{ $khachHang->diachi }}</p>
                        <p><strong>Số điện thoại:</strong> {{ $khachHang->dienthoai }}</p>
                    </div>

                    <!-- Thông Tin Ấn Phẩm -->
                    <div class="mb-4">
                        <h5><i class="fas fa-book me-2 text-info"></i> Thông Tin Ấn Phẩm</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Hình ảnh</th>
                                    <th>Tên Ấn phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá cọc</th>
                                    <th>Giá thuê</th>
                                    <th>Tình trạng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- Hình ảnh ấn phẩm -->
                                    <td class="d-flex justify-content-center align-items-center">
                                        @if($anPham->chiTietAnPham)
                                            <img src="{{ asset('img/anh-an-pham/' . $anPham->chiTietAnPham->hinhanh) }}" alt="{{ $anPham->chiTietAnPham->tenanpham }}" style="width: 80px; height: auto;">
                                        @else
                                            <span>Không có hình ảnh</span>
                                        @endif
                                    </td>

                                    <!-- Tên ấn phẩm -->
                                    <td>{{ $anPham->chiTietAnPham ? $anPham->chiTietAnPham->tenanpham : 'Không có tên ấn phẩm' }}</td>

                                    <!-- Số lượng -->
                                    <td>1</td>

                                    <!-- Giá cọc -->
                                    <td>{{ number_format($anPham->giacoc, 0, ',', '.') }} VND</td>

                                    <!-- Giá thuê -->
                                    <td>{{ number_format($anPham->giathue, 0, ',', '.') }} VND</td>

                                    <!-- Tình trạng -->
                                    <td>{{ $anPham->tinhtrang }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Nút Đặt Trước và Hủy -->
                    <div class="text-center">
                        <form action="{{ route('route-khachhang-thanhToan', ['mactanpham' => $anPham->mactanpham]) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-check me-2"></i> Đặt Trước
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-footer text-muted text-center">
                    <small>Chúng tôi cam kết bảo mật thông tin của bạn.</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection