@extends('CuaHang.layouts.index')

@section('content')
<!-- Content --> 
<div id="quanlydanhgiaPage"></div>
    <!-- Form Tìm Kiếm -->
    {{-- <form action="{{ route('route-cuahang-quanlycuahang-quanlydanhgia') }}" method="GET" class="d-flex my-3">
        <input type="text" name="keyword" class="form-control w-50" placeholder="Tìm kiếm đánh giá...">
        <button type="submit" class="btn btn-dark">Tìm kiếm</button>
    </form> --}}

    <form id="searchForm" action="{{ route('route-cuahang-quanlycuahang-quanlydanhgia') }}" method="GET" class="d-flex my-3">
        <input type="text" name="keyword" id="searchInput" class="form-control w-50" placeholder="Tìm kiếm đánh giá...">
    </form>

    <div class="mt-4">
        <div class="d-flex justify-content-between align-content-center mb-2">
            <h3>Danh sách đánh giá</h3>
            <div class="dropdown ms-3">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    Chọn cột hiển thị
                </button>
                <div class="dropdown-menu p-3" style="min-width: 200px;">
                    <!-- Checkbox chọn cột -->
                    <label><input type="checkbox" class="column-toggle" data-column="madanhgia" checked> Mã ĐG</label><br>
                    {{-- <label><input type="checkbox" class="column-toggle" data-column="maanpham" checked> Mã AP</label><br> --}}
                    {{-- <label><input type="checkbox" class="column-toggle" data-column="makhachhang" checked> Mã KH</label><br> --}}
                    <label><input type="checkbox" class="column-toggle" data-column="tenanpham" checked> Tên AP</label><br>
                    <label><input type="checkbox" class="column-toggle" data-column="tenkhachhang" checked> Tên KH</label><br>
                    <label><input type="checkbox" class="column-toggle" data-column="binhluan" checked> Bình luận</label><br>
                    <label><input type="checkbox" class="column-toggle" data-column="sosao" checked> Số sao</label><br>
                    <label><input type="checkbox" class="column-toggle" data-column="ngaydanhgia" checked> Ngày đánh giá</label><br>
                    <label><input type="checkbox" class="column-toggle" data-column="trangthai" checked> Trạng thái</label><br>
                    <label><input type="checkbox" class="column-toggle" data-column="hanhdong" checked> Hành động</label><br>
                    
                    <!-- Nút Bỏ chọn -->
                    <button type="button" class="btn btn-link mt-2" id="resetColumns">Bỏ chọn</button>
                </div>
            </div>
        </div>
        <form action="{{ route('route-cuahang-quanlycuahang-quanlydanhgia.suaDanhGia') }}" method="POST">
            @csrf
            <div class="scrollable-container"> <!-- Container cuộn -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th id="col-madanhgia">Mã ĐG</th>
                                {{-- <th id="col-maanpham">Mã AP</th> --}}
                                {{-- <th id="col-makhachhang">Mã KH</th> --}}
                                <th id="col-tenanpham">Tên AP</th>
                                <th id="col-tenkhachhang">Tên KH</th>
                                <th id="col-binhluan">Bình luận</th>
                                <th id="col-sosao">Số sao</th>
                                <th id="col-ngaydanhgia">Ngày đánh giá</th>
                                <th id="col-trangthai">Trạng thái</th>
                                <th id="col-hanhdong">Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="searchResults">
                            @if ($message)
                                <tr>
                                    <td colspan="10" class="text-center">{{ $message }}</td>
                                </tr>
                            @else
                                @foreach ($danhgiaList as $danhgia)
                                <tr>
                                    <td class="col-madanhgia">{{ $danhgia->madanhgia }}</td>
                                    {{-- <td class="col-maanpham">{{ $danhgia->maanpham }}</td> --}}
                                    {{-- <td class="col-makhachhang">{{ $danhgia->makhachhang }}</td> --}}
                                    <td class="col-tenanpham">{{ $danhgia->dsanpham->chitietanpham ? $danhgia->dsanpham->chitietanpham->tenanpham : 'Không có dữ liệu' }}</td>
                                    <td class="col-tenkhachhang">{{ $danhgia->khachhang->hoten }}</td>
                                    <td class="col-binhluan truncate">
                                        <input type="hidden" name="id[]" value="{{ $danhgia->madanhgia }}"> <!-- Trường ẩn cho ID -->
                                        <input type="text" class="form-control" name="binhluan[]" value="{{ $danhgia->binhluan }}" required>
                                    </td>
                                    <td class="col-sosao truncate">
                                        <input type="text" class="form-control" name="sosao[]" value="{{ $danhgia->sosao }}" required>
                                    </td>
                                    <td class="col-ngaydanhgia truncate">
                                        <input type="datetime-local" class="form-control" name="ngaydanhgia[]" value="{{ \Carbon\Carbon::parse($danhgia->ngaydanhgia)->format('Y-m-d\TH:i') }}" required>
                                    </td> 

                                    <td>
                                        <select class="col-trangthai form-select" name="trangthai[]">
                                            <option value="1" {{ $danhgia->trangthai == '1' ? 'selected' : '' }}>Hiện</option>
                                            <option value="0" {{ $danhgia->trangthai == '0' ? 'selected' : '' }}>Ẩn</option>
                                        </select>
                                    </td>
                                    
                                    <td class="col-hanhdong">
                                        <button 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deleteModal" 
                                            style="outline: none; border: none;" 
                                            type="button" 
                                            data-id="{{ $danhgia->madanhgia }}" 
                                            data-name="{{ $danhgia->madanhgia }}" 
                                            class="btnDelete">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
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


<!-- Modal Xóa -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Xóa khuyến mãi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="deleteMessage"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <form id="deleteForm" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

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

        document.querySelectorAll('.btnDelete').forEach(function(button) {
            button.addEventListener('click', function() {
                const id = button.getAttribute('data-id');
                const name = button.getAttribute('data-name');
                const deleteForm = document.getElementById('deleteForm');
                const deleteMessage = document.getElementById('deleteMessage');
                deleteMessage.textContent = `Bạn có chắc chắn muốn xóa đánh giá: "${name}" không?`;
                deleteForm.setAttribute('action', `{{ route('route-cuahang-quanlycuahang-quanlydanhgia.xoaDanhGia', '') }}/${id}`);
            });
        });
    });

    function autoResearch(){
        $('#searchInput').on('input', function() {
            let keyword = $(this).val();

            // Gửi yêu cầu AJAX lên server để tìm kiếm
            $.ajax({
                url: "{{ route('route-cuahang-quanlycuahang-quanlydanhgia') }}",
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