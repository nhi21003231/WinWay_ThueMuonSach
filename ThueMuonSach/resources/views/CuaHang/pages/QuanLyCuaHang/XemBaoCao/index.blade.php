@extends('CuaHang.layouts.index')

@section('content')
    <!-- Biểu đồ -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script> <!-- Thêm plugin datalabels -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

    <form action="{{ route('route-cuahang-quanlycuahang-xembaocao') }}" method="GET" class="mb-4">
        <div class="row align-content-center">
            <div class="col-md-3">
                <label for="start_month" class="form-label">Từ tháng</label>
                <select style="border: 2px solid rgb(5, 173, 240)" class="form-select" id="start_month" name="start_month" required>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ (request('start_month') == $i || (!request('start_month') && $i == 1)) ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="col-md-3">
                <label for="end_month" class="form-label">Đến tháng</label>
                <select style="border: 2px solid rgb(5, 173, 240)" class="form-select" id="end_month" name="end_month" required>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" {{ (request('end_month') == $i || (!request('end_month') && $i == 12)) ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="col-md-3">
                <label for="year" class="form-label">Năm</label>
                <select style="border: 2px solid rgb(5, 173, 240)" class="form-select" id="year" name="year" required>
                    @for ($i = 2020; $i <= date('Y'); $i++)
                        <option value="{{ $i }}" {{ (request('year') == $i || (!request('year') && $i == 2024)) ? 'selected' : '' }}>
                            {{ $i }}
                        </option>
                    @endfor
                </select>
            </div>
            <div class="col-md-3 align-self-end">
                <button type="submit" class="btn btn-primary">Xem Biểu Đồ</button>
                <button type="submit" name="export_excel" value="1" class="btn btn-success">Xuất Excel</button>
            </div>
        </div>
    </form>

    <!-- Biểu đồ -->
    <div class="card">
        <div class="card-body">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // Loại biểu đồ bar
            data: {
                labels: {!! json_encode($labels) !!}, // Dữ liệu tháng
                datasets: [{
                    label: 'Doanh Thu',
                    data: {!! json_encode($data) !!}, // Dữ liệu doanh thu
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Màu nền của các cột
                    borderColor: 'rgba(54, 162, 235, 1)', // Màu viền của các cột
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        ticks: {
                            color: 'red', // Màu xanh cho tên các tháng
                            font: {
                                size: 14, // Kích thước chữ cho tên tháng
                                weight: 'bold', // In đậm tên tháng
                            }
                        },
                        title: {
                            display: true, // Hiển thị tiêu đề
                            text: 'Doanh Thu Theo Tháng (Năm {{ request("year", date("Y")) }})', // Tiêu đề của trục X
                            font: {
                                size: 16, // Kích thước chữ của tiêu đề
                                weight: 'bold', // In đậm tiêu đề
                                style: 'italic' // Đổi chữ thành in nghiêng
                            },
                            color: '#2e9f0b', // Màu của tiêu đề
                            padding: {top: 20} // Khoảng cách giữa tiêu đề và các cột
                        }
                    },
                    y: {
                        beginAtZero: true, // Đảm bảo trục Y bắt đầu từ 0
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString(); // Hiển thị đơn vị với dấu phân cách hàng nghìn
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true, // Hiển thị legend (chú thích)
                        position: 'top', // Vị trí của legend
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.raw.toLocaleString() + ' VND'; // Hiển thị doanh thu với đơn vị VND
                            }
                        }
                    },
                    datalabels: {
                        color: '#2a76e7', // Màu sắc của số hiển thị
                        font: {
                            weight: 'bold', // In đậm số
                            size: 12
                        },
                        formatter: function(value) {
                            // Chỉ hiển thị số khi giá trị > 0 và thêm VND
                            if (value > 0) {
                                return value.toLocaleString() + ' VND'; // Định dạng số để hiển thị dấu phân cách hàng nghìn và VND
                            }
                            return ''; // Nếu giá trị là 0, không hiển thị gì
                        },
                        anchor: 'end',
                        align: 'top',
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    </script>

@endsection


<script>
    // Hàm để xuất biểu đồ
    function exportChart() {
        var canvas = document.getElementById('myChart'); // Lấy đối tượng canvas
        html2canvas(canvas).then(function (canvas) {
            var image = canvas.toDataURL('image/png'); // Chuyển đổi canvas thành hình ảnh PNG
            var formData = new FormData();
            formData.append('chart_image', image);

            // Gửi hình ảnh qua Ajax
            fetch('{{ route('route-cuahang-quanlycuahang-xembaocao') }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Thêm CSRF token
                }
            }).then(response => response.json())
            .then(data => {
                // Thực hiện hành động sau khi gửi dữ liệu thành công (nếu cần)
                alert('Biểu đồ đã được xuất!');
            });
        });
    }

    // Thêm sự kiện khi nhấn nút "Xuất Excel"
    document.getElementById('exportExcelBtn').addEventListener('click', exportChart);
</script>