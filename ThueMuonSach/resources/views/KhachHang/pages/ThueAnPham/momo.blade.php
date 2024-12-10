@extends('KhachHang.layouts.index')

@section('title', 'Thanh toán qua MoMo')
@section('content')

<!-- resources/views/orders/momo_payment.blade.php -->
<style>
    .container h2 {
        text-align: center;
        font-weight: bold;
        margin-bottom: 20px;
        color: white;
    }

    .card-header{
        background: #da1c5c;
    }

    .payment-info {
        margin: 20px 0;
    }

    .payment-info h5 {
        font-weight: bold;
    }
</style>



<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Thông tin Thanh Toán -->
            <div class="card shadow-sm">
                <div class="card-header ">
                    <h2 class=" mb-0 d-flex align-items-center justify-content-center">
                        <i class="fas fa-wallet me-2"></i>Thanh toán qua MoMo
                    </h2>
                </div>
                <div class="card-body">
                    <!-- Chi Tiết Đơn Hàng -->
                    <div class="payment-info mb-4">
                        <h5><i class="fas fa-money-bill-wave me-2 text-success"></i> Thông Tin Thanh Toán</h5>
                        <p>Tài khoản: <strong>0945352322</strong></p>
                        <p>Chủ tài khoản: <strong>Võ Văn Nhí</strong></p>
                        <p><strong>Tổng tiền thanh toán:</strong> <span class="text-danger">{{ number_format($grandTotal, 0, ',', '.') }} VND</span></p>
                        <div class="text-center">
                            <img src="{{ asset('/img/momo.jpg' ) }}" alt="momo" class="momo mt-2 mb-2">
                        </div>
                        <p class="text-center">Vui lòng chuyển khoản số tiền <strong class='text-danger'>{{ number_format($grandTotal, 0, ',', '.') }} VND</strong> vào tài khoản trên và nhớ ghi rõ mã tham chiếu đơn hàng <strong>{{ $paymentReference }}</strong> của bạn để chúng tôi có thể xác nhận thanh toán.</p>
                    </div>

                    <!-- Nút thanh toán qua MoMo -->
                    <div class="text-center">

                        <form action="{{isset($type) ? route('route-khachhang-dattruoc-them'): route('route-khachhang-thueanpham-xulymomo') }}" method="POST">
                            @csrf
                           @if(isset($anPham))
                                <input type="hidden" name="id_ctanpham" value="{{ $anPham->mactanpham }}">
                                <input type="hidden" name="payment_method" value="{{ $payment_method }}">
                            @endif
                            <input type="hidden" name="grandTotal" value="{{ $grandTotal }}">
                            <input type="hidden" name="totalQuantity" value="{{ $totalQuantity }}">
                            
                            <input type="hidden" name="paymentReference" value="{{ $paymentReference }}">
                            <button type="submit" class="btn btn-success btn-submit btn-lg">
                                <i class="fas fa-mobile-alt me-2"></i> Xác nhận thanh toán
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card-footer text-muted text-center">
                    <small>Thanh toán bảo mật và an toàn qua MoMo</small>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection