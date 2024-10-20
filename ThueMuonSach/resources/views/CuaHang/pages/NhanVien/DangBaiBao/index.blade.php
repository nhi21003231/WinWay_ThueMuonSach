@extends('CuaHang.layouts.index')

@section('content')
<h1>Nhân viên - Đăng bài báo</h1>
<!-- resources/views/create_frame.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Khung Thông Tin Khách Hàng</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Tạo Khung Thông Tin Khách Hàng</h1>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>TênKH</th>
                <th>NgàyTrả</th>
                <th>NgàyThuê</th>
                <th>Xem Thông Tin</th>
            </tr>
        </thead>
        <tbody>
            <!-- Đây là phần khung, không có dữ liệu -->
            @for ($i = 1; $i <= 5; $i++) <!-- Giả sử có 5 hàng -->
                <tr>
                    <td>{{ $i }}</td>
                    <td>Khách Hàng {{ $i }}</td>
                    <td>Ngày Trả {{ $i }}</td>
                    <td>Ngày Thuê {{ $i }}</td>
                    <td>
                        <a href="#">
                            <button>Xem Thông Tin</button>
                        </a>
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
</body>
</html>
@endsection