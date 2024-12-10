@extends('CuaHang.layouts.index')

@section('content')
<!-- Content -->

    <div id="dinhgiaanphamPage">
        <!-- Form Tìm Kiếm -->

        <form id="searchForm" action="{{ route('route-cuahang-quanlycuahang-dinhgiaanpham') }}" method="GET" class="d-flex my-3">
            <input type="text" name="keyword" id="searchInput" class="form-control w-50" placeholder="Tìm kiếm ấn phẩm...">
        </form>

        <div class="mt-4">
            <div class="d-flex justify-content-between align-content-center mb-2">
                <h3>Danh sách ấn phẩm</h3>
                <div class="dropdown ms-3">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        Chọn cột hiển thị
                    </button>
                    <div class="dropdown-menu p-3" style="min-width: 200px;">
                        <!-- Checkbox chọn cột -->
                        <label><input type="checkbox" class="column-toggle" data-column="maanpham" checked> Mã AP</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="tenanpham" checked> Tên ấn phẩm</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="tacgia" checked> Tác giả</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="namxuatban" checked> Năm xuất bản</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="giathue" checked> Giá thuê</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="giacoc" checked> Giá cọc</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="hinhanh" checked> Hình ảnh</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="hanhdong" checked>Hành động</label><br>
                        
                        <!-- Nút Bỏ chọn -->
                        <button type="button" class="btn btn-link mt-2" id="resetColumns">Bỏ chọn</button>
                    </div>
                </div>
            </div>
            <form action="{{ route('route-cuahang-quanlycuahang-dinhgiaanpham.suaDinhGiaAnPham') }}" method="POST">
                @csrf
                <div class="scrollable-container">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th id="col-maanpham">Mã CT Ấn Phẩm</th>
                                    <th id="col-tenanpham">Tên Ấn Phẩm</th>
                                    <th id="col-tacgia">Tác Giả</th>
                                    <th id="col-namxuatban">Năm Xuất Bản</th>
                                    <th id="col-giathue">Giá Thuê</th>
                                    <th id="col-giacoc">Giá Cọc</th>
                                    <th id="col-hinhanh">Hình Ảnh</th>
                                    <th id="col-hanhdong">Hành Động</th>
                                </tr>
                            </thead>
                            <tbody id="searchResults">
                                @if ($message)
                                    <tr>
                                        <td colspan="8" class="text-center">{{ $message }}</td>
                                    </tr>
                                @else
                                    @foreach ($dsctanphamList as $anpham)
                                        <tr>
                                            <td id="col-maanpham">{{ $anpham->mactanpham }}</td>
                                            <td id="col-tenanpham">{{ $anpham->tenanpham }}</td>
                                            <td id="col-tacgia">{{ $anpham->tacgia }}</td>
                                            <td id="col-namxuatban">{{ $anpham->namxuatban }}</td>
                                            <td id="col-giathue">
                                                <form action="{{ route('route-cuahang-quanlycuahang-dinhgiaanpham.suaDinhGiaAnPham') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $anpham->mactanpham }}">
                                                    <input type="number" name="giathue" class="form-control mb-1" placeholder="Giá thuê" value="{{ $anpham->giathue }}" required>
                                            </td>
                                            <td id="col-giacoc">
                                                <input type="number" name="giacoc" class="form-control mb-1" placeholder="Giá cọc" value="{{ $anpham->giacoc }}" required>
                                            </td>
                                            <td id="col-hinhanh">
                                                <img class="img-anpham" style="width: 120px" src="{{ asset('img/anh-an-pham/' . $anpham->hinhanh) }}" alt="{{ $anpham->tenanpham }}">
                                            </td>
                                            <td id="col-hanhdong">
                                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div> 
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            autoResearch();
            getDefualtColumns();
            preventDefaultSelection();

            // Chặn phím Enter trong form tìm kiếm
            document.getElementById('searchInput').addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault(); // Ngăn chặn hành động mặc định
                }
            });
        });
    
        function autoResearch(){
            $('#searchInput').on('input', function() {
                let keyword = $(this).val();
    
                // Gửi yêu cầu AJAX lên server để tìm kiếm
                $.ajax({
                    url: "{{ route('route-cuahang-quanlycuahang-dinhgiaanpham') }}",
                    method: 'GET',
                    data: { keyword: keyword },
                    success: function(response) {
                        // Cập nhật lại nội dung của #searchResults trong bảng
                        $('#searchResults').html($(response).find('#searchResults').html());
                    }
                });
            });
        }
    </script> 
@endsection



