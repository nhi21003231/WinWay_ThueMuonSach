
@extends('CuaHang.layouts.index')

@section('content')

<div id="taokhuyenmaiPage">
    {{-- Content --}}

    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalID">
        Thêm khuyến mãi
    </button>

    <form id="searchForm" action="{{ route('route-cuahang-quanlycuahang-taokhuyenmai') }}" method="GET" class="d-flex my-3">
        <input type="text" name="keyword" id="searchInput" class="form-control w-50" placeholder="Tìm kiếm khuyến mãi...">
    </form>

    <!-- Form thêm khuyến mãi -->
    <div class="modal fade" id="modalID">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center">
                    <h3 class="text-uppercase text-danger">Thêm khuyến mãi mới</h3>
                </div>
                <form class="modal-body" action="{{ route('route-cuahang-quanlycuahang-taokhuyenmai.themCTKhuyenMai') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="program-name" class="form-label">Tên chương trình khuyến mãi</label>
                        <input type="text" class="form-control" id="program-name" name="tenchuongtrinhkm" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea class="form-control" id="description" name="mota" required></textarea>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="form-group mb-3 w-100">
                            <label for="start-date" class="form-label">Ngày bắt đầu</label>
                            <div class="input-group">
                                <input type="datetime-local" class="form-control" id="start-date" name="ngayapdung" required>
                            </div>
                        </div>
                        <div class="form-group mb-3 w-100">
                            <label for="end-date" class="form-label">Ngày kết thúc</label>
                            <div class="input-group">
                                <input type="datetime-local" class="form-control" id="end-date" name="ngayketthuc" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="target" class="form-label">Đối tượng áp dụng</label>
                        <input type="text" class="form-control" id="target" value="Tất cả khách hàng" disabled>
                    </div>
                    <div class="text-center submit-btn">
                        <button type="button" class="w-25 btn btn-danger" id="btnCancelAdd" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="w-25 btn btn-primary">Tạo khuyến mãi</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>

    {{-- Danh sách --}}
    <div class="mt-4">
        <div class="d-flex justify-content-between align-content-center mb-2">
            <h3>Chương trình khuyến mãi</h3>
            <div class="dropdown ms-3">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                    Chọn cột hiển thị
                </button>
                <div class="dropdown-menu p-3" style="min-width: 200px;">
                    <!-- Checkbox chọn cột -->
                    <label><input type="checkbox" class="column-toggle" data-column="mactkm" checked> Mã CTKM</label><br>
                    <label><input type="checkbox" class="column-toggle" data-column="tenchuongtrinh" checked> Tên chương trình</label><br>
                    <label><input type="checkbox" class="column-toggle" data-column="mota" checked> Mô tả</label><br>
                    <label><input type="checkbox" class="column-toggle" data-column="ngayapdung" checked> Ngày áp dụng</label><br>
                    <label><input type="checkbox" class="column-toggle" data-column="ngayketthuc" checked> Ngày kết thúc</label><br>
                    <label><input type="checkbox" class="column-toggle" data-column="hanhdong" checked> Hành động</label><br>
                    <!-- Nút Bỏ chọn -->
                    <button type="button" class="btn btn-link mt-2" id="resetColumns">Bỏ chọn</button>
                </div>
            </div>
        </div>
        <form action="{{ route('route-cuahang-quanlycuahang-taokhuyenmai.suaCTKhuyenMai') }}" method="POST">
            @csrf
            <div class="scrollable-container"> <!-- Container cuộn -->
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th id="col-mactkm">Mã CTKM</th>
                                <th id="col-tenchuongtrinh">Tên chương trình</th>
                                <th id="col-mota">Mô tả</th>
                                <th id="col-ngayapdung">Ngày áp dụng</th>
                                <th id="col-ngayketthuc">Ngày kết thúc</th>
                                <th id="col-hanhdong">Hành động</th>
                            </tr>
                        </thead>
                        <tbody id="searchResults">
                            @if ($message)
                                <tr>
                                    <td colspan="8" class="text-center">{{ $message }}</td>
                                </tr>
                            @else
                                @foreach ($khuyenmaiList as $khuyenmai)
                                    <tr>
                                        <td class="col-mactkm">{{ $khuyenmai->mactkm }}</td>
                                        <td class="col-tenchuongtrinh truncate">
                                            <input type="hidden" name="id[]" value="{{ $khuyenmai->mactkm }}">
                                            <input type="text" class="form-control" name="tenkhuyenmai[]" value="{{ $khuyenmai->tenchuongtrinhkm }}" required>
                                        </td>
                                        <td class="col-mota truncate">
                                            <input type="text" class="form-control" name="mota[]" value="{{ $khuyenmai->mota }}" required>
                                        </td>
                                        <td class="col-ngayapdung">
                                            <input type="datetime-local" class="form-control" name="ngayapdung[]" value="{{ \Carbon\Carbon::parse($khuyenmai->ngayapdung)->format('Y-m-d\TH:i') }}">
                                        </td>
                                        <td class="col-ngayketthuc">
                                            <input type="datetime-local" class="form-control" name="ngayketthuc[]" value="{{ \Carbon\Carbon::parse($khuyenmai->ngayketthuc)->format('Y-m-d\TH:i') }}">
                                        </td>
                                        <td class="col-hanhdong">
                                            <button 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#deleteModal" 
                                                style="outline: none; border: none;" 
                                                type="button" 
                                                data-id="{{ $khuyenmai->mactkm }}" 
                                                data-name="{{ $khuyenmai->tenchuongtrinhkm }}" 
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
                deleteMessage.textContent = `Bạn có chắc chắn muốn xóa khuyến mãi: "${name}" không?`;
                deleteForm.setAttribute('action', `{{ route('route-cuahang-quanlycuahang-taokhuyenmai.xoaCTKhuyenMai', '') }}/${id}`);
            });
        });
    });

    function autoResearch() {
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', function() {
            const keyword = searchInput.value;
            fetch("{{ route('route-cuahang-quanlycuahang-taokhuyenmai') }}?keyword=" + keyword)
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newResults = doc.getElementById('searchResults').innerHTML;
                    document.getElementById('searchResults').innerHTML = newResults;
                });
        });
    }
</script>