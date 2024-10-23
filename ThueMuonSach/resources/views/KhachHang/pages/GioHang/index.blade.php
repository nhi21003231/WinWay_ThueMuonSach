@extends('KhachHang.layouts.index')

@section('content')
    <h1>Giỏ hàng</h1>

    <style>
        .product-img {
            width: 80px;
            height: auto;
        }
        .remove-product {
            color: red;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2>Giỏ Hàng Của Bạn (3 Sản Phẩm)</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <!-- Sản phẩm 1 -->
            <tr>
                <td>
                    <div class="d-flex">
                        <img src="{{ asset('img/SacXanhConMai.jpg') }}" alt="Sắc Xanh Còn Mãi" class="product-img me-3">
                        <div>
                            <strong>Sắc Xanh Còn Mãi - Góc Tối Học Đường Và Cuộc Đấu Tranh Cô Đơn Của Một Trái Tim Thuần Khiết</strong>
                        </div>
                    </div>
                </td>
                <td>
                    <span class="text-muted text-decoration-line-through">90.000đ</span> <strong>80.100đ</strong>
                </td>
                <td>
                    <input type="number" value="1" min="1" class="form-control" style="width: 60px;" readonly>
                </td>
                <td><strong>80.100đ</strong></td>
                <td>
                    <span class="remove-product">Bỏ qua sản phẩm</span>
                </td>
            </tr>

            <!-- Sản phẩm 2 -->
            <tr>
                <td>
                    <div class="d-flex">
                        <img src="{{ asset('img/chuyen-hoa-thanh-phuc.jpg') }}" alt="Chuyện Họa Thành Phúc" class="product-img me-3">
                        <div>
                            <strong>Chuyện Họa Thành Phúc</strong>
                        </div>
                    </div>
                </td>
                <td>
                    <span class="text-muted text-decoration-line-through">65.000đ</span> <strong>52.650đ</strong>
                </td>
                <td>
                    <input type="number" value="1" min="1" class="form-control" style="width: 60px;" readonly>
                </td>
                <td><strong>52.650đ</strong></td>
                <td>
                    <span class="remove-product">Bỏ qua sản phẩm</span>
                </td>
            </tr>

            <!-- Sản phẩm 3 -->
            <tr>
                <td>
                    <div class="d-flex">
                        <img src="{{ asset('img/ky-luat-lam-nen-con-nguoi.jpg') }}" alt="Combo Kỷ Luật Làm Nên Con Người" class="product-img me-3">
                        <div>
                            <strong>Combo Kỷ Luật Làm Nên Con Người + Không Còn Đường Lùi Mới Có Thành Công (Bộ 2 Cuốn)</strong>
                        </div>
                    </div>
                </td>
                <td>
                    <span class="text-muted text-decoration-line-through">92.000đ</span> <strong>41.400đ</strong>
                </td>
                <td>
                    <input type="number" value="1" min="1" class="form-control" style="width: 60px;" readonly>
                </td>
                <td><strong>41.400đ</strong></td>
                <td>
                    <span class="remove-product">Bỏ qua sản phẩm</span>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="d-flex justify-content-between align-items-center">
        <p class="fw-bold">Tạm Tính: 174.150đ</p>
        <div>
            <button class="btn btn-success">Tiếp tục mua hàng</button>
            <button class="btn btn-primary">Tiến hành thanh toán</button>
        </div>
    </div>
</div>


</body>
@endsection

