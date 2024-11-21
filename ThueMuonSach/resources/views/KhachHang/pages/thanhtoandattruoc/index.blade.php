@extends('KhachHang.layouts.index')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Card Thanh Toán -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0 d-flex align-items-center justify-content-center">
                            <i class="fas fa-university me-2"></i> Thanh Toán Qua Ngân Hàng
                        </h4>
                    </div>
                    <div class="card-body">
                        <!-- Thông Tin Thanh Toán -->
                        {{-- <div class="mb-4">
                            <h5><i class="fas fa-money-bill-wave me-2 text-success"></i> Thông Tin Thanh Toán</h5>
                            <p><strong>Tổng tiền thanh toán:</strong> <span
                                    class="text-success">{{ number_format($grandTotal, 0, ',', '.') }} VND</span></p>
                        </div> --}}

                        <!-- Thông Tin Ngân Hàng -->
                        <div class="mb-4">
                            <h5><i class="fas fa-info-circle me-2 text-info"></i> Thông Tin Ngân Hàng</h5>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th scope="row"><i class="fas fa-building me-2"></i>Tên Ngân Hàng</th>
                                        <td>Ngân hàng TMCP Ngoại Thương Việt Nam (Vietcombank)</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><i class="fas fa-credit-card me-2"></i>Số Tài Khoản</th>
                                        <td>1234567890</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><i class="fas fa-user me-2"></i>Chủ Tài Khoản</th>
                                        <td>Công ty ABC</td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><i class="fas fa-map-marker-alt me-2"></i>Chi Nhánh</th>
                                        <td>Chi nhánh Hà Nội</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Nút Thanh Toán -->
                        <div class="text-center">
                            {{-- <form action="{{ route('bank.process') }}" method="POST"> --}}
                            <form action="{{ route('route-khachhang-dattruoc-xulynganhang') }}" method="POST">
                                @csrf
                                {{-- <input type="hidden" name="grandTotal" value="{{ $grandTotal }}">
                                <input type="hidden" name="paymentReference" value="{{ $paymentReference }}"> --}}
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
