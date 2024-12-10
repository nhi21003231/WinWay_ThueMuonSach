@extends('KhachHang.layouts.index')

@section('content')
<div class="container my-4">
    <h2 class="mb-4">Giỏ hàng của bạn</h2>

    <!-- Kiểm tra giỏ hàng có sản phẩm không -->
    @if($cartItems && $cartItems->count() > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Tên sách</th>
                    <th>Số lượng</th>
                    <th>Giá thuê</th>
                    <th>Giá cọc</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr>
                        <!-- Hình ảnh sách -->
                        <td class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('img/anh-an-pham/' . $item->anPham->chiTietAnPham->hinhanh) }}" alt="{{ $item->anPham->chiTietAnPham->tenanpham }}" style="width: 80px; height: auto;">
                        </td>

                        <!-- Tên sách -->
                        <td>{{ $item->anPham->chiTietAnPham->tenanpham }}</td>

                        <td>{{ $item->soluong }}</td>

                        <!-- Giá thuê -->
                        <td>{{ number_format($item->anPham->chiTietAnPham->giathue, 0, ',', '.') }} VND</td>

                        <!-- Giá cọc -->
                        <td>{{ number_format($item->anPham->chiTietAnPham->giacoc, 0, ',', '.') }} VND</td>
                        

                        <!-- Nút xóa sản phẩm khỏi giỏ hàng -->
                        <td>
                            <form action="{{ route('route-khachhang-xoakhoigiohang', ['maanpham' => $item->anPham->maanpham]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>                                                       
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <!-- Tổng tiền thuê và cọc giỏ hàng -->
        <div class="text-end mt-4" >
            <h4>Tổng tiền thuê: {{ number_format($totalPriceThue, 0, ',', '.') }} VND</h4>
            <h4>Tổng tiền cọc: {{ number_format($totalPrice, 0, ',', '.') }} VND</h4>
            <a href="{{ route('route-khachhang-thueanpham') }}" class="btn btn-success">Đăng ký thuê</a>
        </div>

    @else
        <p>Giỏ hàng của bạn hiện đang trống.</p>
        <a href="{{ route('route-khachhang-danhsachanpham') }}" class="btn btn-primary">Tiếp tục thuê sách</a>
        <div class="d-flex justify-content-center">
            <img src="{{ asset('img/no-item-cart.jpg') }}" alt="Empty Cart" class="img-fluid mx-auto" style="width: 400px; height: auto;">
        </div>
    @endif
</div>

@endsection

