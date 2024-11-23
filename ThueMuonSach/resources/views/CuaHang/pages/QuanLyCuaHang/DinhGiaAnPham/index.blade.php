@extends('CuaHang.layouts.index')

@section('content')
<!-- Content -->

    <div id="dinhgiaanphamPage">
        <!-- Form Tìm Kiếm -->
        {{-- <form action="{{ route('route-cuahang-quanlycuahang-dinhgiaanpham') }}" method="GET" class="d-flex my-3">
            <input type="text" name="keyword" class="form-control w-50" placeholder="Tìm kiếm ấn phẩm...">
            <button type="submit" class="btn btn-dark">Tìm kiếm</button>
        </form> --}}

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
                        <label><input type="checkbox" class="column-toggle" data-column="giathue" checked> Giá thuê</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="giacoc" checked> Giá cọc</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="namxuatban" checked> Năm xuất bản</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="hinhanh" checked> Hình ảnh</label><br>
                        
                        <!-- Nút Bỏ chọn -->
                        <button type="button" class="btn btn-link mt-2" id="resetColumns">Bỏ chọn</button>
                    </div>
                </div>
            </div>
            <form action="{{ route('route-cuahang-quanlycuahang-dinhgiaanpham.suaDinhGiaAnPham') }}" method="POST">
                @csrf
                <div class="scrollable-container"> <!-- Container cuộn -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th id="col-maanpham">Mã AP</th>
                                    <th id="col-tenanpham">Tên ấn phẩm</th>
                                    <th id="col-giathue">Giá thuê</th>
                                    <th id="col-giacoc">Giá cọc</th>
                                    <th id="col-namxuatban">Năm xuất bản</th>
                                    <th id="col-hinhanh">Hình ảnh</th>
                                    {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody id="searchResults">
                                @if ($message)
                                    <tr>
                                        <td colspan="8" class="text-center">{{ $message }}</td>
                                    </tr>
                                @else
                                    @foreach ($dsanphamList as $anpham)
                                    <tr>
                                        <input type="hidden" name="id[]" value="{{ $anpham->maanpham }}"> <!-- Trường ẩn cho ID -->
                                        <td class="col-maanpham">{{ $anpham->maanpham }}</td>
                                        <td class="col-tenanpham">{{ $anpham->chiTietAnPham->tenanpham }}</td>
                                        <td class="col-giathue">
                                            <input type="text" class="form-control" name="giathue[]" value="{{ $anpham->chitietanpham->giathue }}" required>
                                        </td>
                                        <td class="col-giacoc">
                                            <input type="text" class="form-control" name="giacoc[]" value="{{ $anpham->chitietanpham->giacoc }}" required>
                                        </td>
                                        <td class="col-namxuatban">{{ $anpham->chitietanpham->namxuatban }}</td>
                                        <td class="col-hinhanh text-center">
                                            <img class="img-anpham" style="width: 180px" src="{{ asset('img/anh-an-pham/' . $anpham->chitietanpham->hinhanh) }} " alt="">
                                        </td>                                
                                        {{-- <td>
                                            <button 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#delete{{ $anpham->maanpham }}" 
                                                style="outline: none; border: none;" 
                                                type="button" 
                                                data-id="{{ $anpham->maanpham }}"
                                                class="btnDelete">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button> 
                                        </td> --}}
                                        <!-- Modal Xóa -->
                                        {{-- <div class="modal fade" id="delete{{ $danhgia->madanhgia }}" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Xóa đánh giá</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Bạn muốn xóa đánh giá này?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                        <form action="{{ route('route-cuahang-quanlycuahang-quanlynhanvien.xoaNhanVien', $danhgia->madanhgia) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="bg-danger btn btn-primary">Xóa</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </tr>  
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div> 
                <button type="submit" class="btn btn-danger mt-3">Cập nhật</button>
            </form>
        </div> 
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            autoResearch();
            getDefualtColumns();
            preventDefaultSelection();
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



