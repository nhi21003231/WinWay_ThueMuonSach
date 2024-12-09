@extends('KhachHang.layouts.index')

@section('content')



<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card Thanh Toán -->
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0 d-flex align-items-center justify-content-center">
                        <i class="fas fa-university me-2"></i> Thanh Toán Qua Ngân Hàng
                    </h2>
                </div>
                <div class="card-body">
                    <!-- Thông Tin Thanh Toán -->
                    <div class="mb-4">
                        <h5><i class="fas fa-money-bill-wave me-2 text-success"></i> Thông Tin Thanh Toán</h5>
                        <p><strong>Tổng tiền thanh toán:</strong> <span class="text-danger">{{ number_format($grandTotal, 0, ',', '.') }} VND</span></p>
                    </div>

                    <!-- Thông Tin Ngân Hàng -->
                    <div class="mb-4">
                        <h5><i class="fas fa-info-circle me-2 text-info"></i> Thông Tin Ngân Hàng</h5>
                        
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th scope="row"><i class="fas fa-building me-2"></i>Tên Ngân Hàng</th>
                                    <td>Ngân hàng Thương mại cổ phần Kỹ Thương Việt Nam (Techcombank)</td>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="fas fa-credit-card me-2"></i>Số Tài Khoản</th>
                                    <td>19037480148012</td>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="fas fa-user me-2"></i>Chủ Tài Khoản</th>
                                    <td>Lý Thạch Phúc Lộc</td>
                                </tr>
                                <tr>
                                    <th scope="row"><i class="fas fa-map-marker-alt me-2"></i>Chi Nhánh</th>
                                    <td>Chi nhánh Sài Gòn</td>
                                </tr>
                            </tbody>
                        </table>
                        {{-- ma Qr --}}
                        <div class="text-center">
                            <img src="{{ asset('/img/bank.jpg' ) }}" alt="bank" class="momo mt-2 mb-2">
                        </div>
                        <p class="text-center">Vui lòng chuyển khoản số tiền <strong class="text-danger">{{ number_format($grandTotal, 0, ',', '.') }} VND</strong> vào tài khoản trên và nhớ ghi rõ mã tham chiếu đơn hàng <br><strong>{{ $paymentReference }}</strong> của bạn để chúng tôi có thể xác nhận thanh toán.</p>
                    </div>
                    <!-- Nút Thanh Toán -->
                    <div class="text-center">
                       
                            <form action="{{ route('route-khachhang-thueanpham-xulynganhang') }}" method="POST">
                            @csrf
                            <input type="hidden" name="grandTotal" value="{{ $grandTotal }}">
                            <input type="hidden" name="totalQuantity" value="{{ $totalQuantity }}">
                            <input type="hidden" name="paymentReference" value="{{ $paymentReference }}">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-credit-card me-2"></i> Thanh Toán Ngay
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

@endsection