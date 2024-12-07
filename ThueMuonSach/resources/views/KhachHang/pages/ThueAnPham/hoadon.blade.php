@extends('KhachHang.layouts.index')

@section('content')
<style>
    .card-header h4 {
        display: flex;
        align-items: center;
        justify-content: center;
    }
#momo{
    color: rgb(236, 30, 154)
 }
 #bank{
    color: #0d6efd
 }
    .section-header {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
    }

    .section-header i {
        margin-right: 10px;
        color: #0d6efd; /* Màu xanh của Bootstrap */
    }

    .table thead th {
        background-color: #f8f9fa;
    }

    .total-summary {
        font-size: 1.2rem;
    }

    @media (max-width: 576px) {
        .section-header h5 {
            font-size: 1.2rem;
        }

        .total-summary {
            font-size: 1rem;
        }

        .btn-submit {
            width: 100%;
        }
    }

</style>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <!-- Card Giỏ Hàng -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0 d-flex align-items-center justify-content-center">
                        <i class="fas fa-shopping-cart me-2"></i> Đơn hàng của Bạn
                    </h4>
                </div>
                
                <div class="card-body">
                    <!-- Thông Tin Khách Hàng -->
                    <div class="mb-4">
                        <div class="section-header">
                            <h3>Thông tin khách hàng</h3>
                        </div>
                        <p readonly><strong>Họ và tên:</strong> {{ $khachHang->hoten }}</p>
                        <p><strong>Số điện thoại:</strong> {{ $khachHang->dienthoai }}</p>
                        <p><strong>Địa chỉ:</strong> {{ $khachHang->diachi }}</p>
                    </div>
                    
                    <!-- Chi Tiết Giỏ Hàng -->
                    <div class="mb-4">
                        <div class="section-header">
                            <p><h3>Chi tiết đơn hàng</h3></p>
                            
                        

                        </div>
                        <div>
                            <p><strong>Ngày thuê: </strong>  {{ \Carbon\Carbon::parse($ngayThue)->format('d/m/Y') }}</p>
                            <p><strong>Ngày trả:</strong> {{ \Carbon\Carbon::parse($ngayTra)->format('d/m/Y') }}</p>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Ảnh sản phẩm</th>
                                        <th scope="col">Tên ấn phẩm</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Giá cọc</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $index => $item)
                                        <tr>
                                            <th scope="row">{{ $index + 1 }}</th>
                                            <td>
                                                <img src="{{ asset('img/anh-an-pham/' . $item->anPham->chitietanpham->hinhanh) }}" alt="{{ $item->anPham->chitietanpham->tenanpham }}" class="product-image" style="width: 60px; height: auto;">
                                            </td>
                                            <td >{{ $item->anPham->chitietanpham->tenanpham }}</td>
                                            <!-- Số lượng -->
                                            <td>{{ $item->soluong }}</td>
                                            <td>{{ number_format($item->anPham->chiTietAnPham->giacoc, 0, ',', '.') }} VND</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="me-5">
                                <p><strong>Số lượng: </strong>  {{$totalQuantity}}</p>
                                <p><strong>Tổng tiền giỏ hàng:</strong> {{ number_format($totalPrice, 0, ',', '.') }} VND</p>

                            </div>
                        </div>
                    </div>

                    <!-- Phương Thức Thanh Toán -->
                    <div class="mb-4">
                        <div class="section-header">
                            <h5>Phương thức thanh toán</h5>
                        </div>
                        {{-- <form action="{{ route('payment.process') }}" method="POST"> --}}
                            <form action="{{ route('route-khachhang-thueanpham-xulyhoadon') }}" method="POST">
                            @csrf
                            <div class="form-check mb-2">
                                <input type="radio" id="momo" name="payment_method" value="momo" class="form-check-input" required>
                                <label for="momo" class="form-check-label">
                                    <i id="momo" class="fas fa-wallet me-2"></i> <span id="momo">Thanh toán qua MoMo</span>
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input type="radio" id="bank" name="payment_method" value="bank" class="form-check-input" required>
                                <label for="bank" class="form-check-label">
                                    <i id="bank" class="fas fa-university me-2"></i> <span id="bank">Thanh toán qua Ngân hàng</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-submit btn-lg">
                                    <i class="fas fa-arrow-right me-2"></i> Thanh toán
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-footer text-muted text-center">
                    <small>Chúng tôi cam kết bảo mật thông tin của bạn.</small>
                </div>
            </div>
        </div>
    </div>

@endsection