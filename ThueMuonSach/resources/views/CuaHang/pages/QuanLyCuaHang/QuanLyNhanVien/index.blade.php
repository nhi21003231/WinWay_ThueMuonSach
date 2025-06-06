
@extends('CuaHang.layouts.index')

@section('content')
<!-- Content -->
    
    <div id="quanlynhanvienPage">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalID">
            Thêm nhân viên
        </button>
     
        <!-- Form Tìm Kiếm -->
        {{-- <form action="{{ route('route-cuahang-quanlycuahang-quanlynhanvien') }}" method="GET" class="d-flex my-3">
            <input type="text" name="keyword" class="form-control w-50" placeholder="Tìm kiếm nhân viên...">
            <button type="submit" class="btn btn-dark">Tìm kiếm</button>
        </form>  --}}
    
        <form id="searchForm" action="{{ route('route-cuahang-quanlycuahang-quanlynhanvien') }}" method="GET" class="d-flex my-3">
            <input type="text" name="keyword" id="searchInput" class="form-control w-50" placeholder="Tìm kiếm nhân viên...">
        </form>

        <!-- Form thêm nhân viên -->
        <div class="modal fade" id="modalID">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-center">
                        <h3 class="text-uppercase text-danger">Thêm nhân viên mới</h3>
                    </div>
                    <form class="modal-body" action="{{ route('route-cuahang-quanlycuahang-quanlynhanvien.themNhanVien') }}" method="POST">
                        @csrf
                        <div class="d-flex gap-3 justify-content-around align-content-around">
                            <div class="w-100">
                                <div class="mb-3">
                                    <label for="hoTen" class="form-label">Họ tên <span class="text-danger">(*)</span></label>
                                    <input type="text" class="form-control" id="hoTen" name="hoTen" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="soDienThoai" class="form-label">Điện thoại</label>
                                    <input type="text" class="form-control" id="soDienThoai" name="soDienThoai" required>
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="mb-3">
                                    <label for="tenTaiKhoan" class="form-label">Tài khoản <span class="text-danger">(*)</span></label>
                                    <input type="text" class="form-control" id="tenTaiKhoan" name="tenTaiKhoan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="matKhau" class="form-label">Mật khẩu <span class="text-danger">(*)</span></label>
                                    <input type="password" class="form-control" id="matKhau" name="matKhau" required>
                                </div>
                                <div class="mb-3">
                                    <label for="chucVu" class="form-label">Chức vụ <span class="text-danger">(*)</span></label>
                                    <select class="form-select" id="chucVu" name="chucVu" required>
                                        <option value="">Chọn chức vụ</option>
                                        <option value="quanlycuahang">Quản lý cửa hàng</option>
                                        <option value="quanlykho">Nhân viên kho</option>
                                        <option value="nhanvien">Thuê trả</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="w-25 btn btn-danger" id="btnCancelAdd" data-bs-dismiss="modal">Hủy</button>
                            <button type="submit" class="w-25 btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
        <div class="mt-4">
            <div class="d-flex justify-content-between align-content-center mb-2">
                <h3>Danh sách nhân viên</h3>
                <div class="dropdown ms-3">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        Chọn cột hiển thị
                    </button>
                    <div class="dropdown-menu p-3" style="min-width: 200px;">
                        <!-- Checkbox chọn cột -->
                        <label><input type="checkbox" class="column-toggle" data-column="manhanvien" checked> Mã NV</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="hoten" checked> Họ tên</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="chucvu" checked> Chức vụ</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="tentaikhoan" checked> Tài khoản</label><br>
                        {{-- <label><input type="checkbox" class="column-toggle" data-column="matkhau" checked> Mật khẩu</label><br> --}}
                        <label><input type="checkbox" class="column-toggle" data-column="email" checked> Email</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="sodienthoai" checked> SDT</label><br>
                        <label><input type="checkbox" class="column-toggle" data-column="hanhdong" checked>Hành động</label><br>
                        
                        <!-- Nút Bỏ chọn -->
                        <button type="button" class="btn btn-link mt-2" id="resetColumns">Bỏ chọn</button>
                    </div>
                </div>
            </div>
            <form action="{{ route('route-cuahang-quanlycuahang-quanlynhanvien.suaNhanVien') }}" method="POST">
                @csrf
                <div class="scrollable-container"> <!-- Container cuộn -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th id="col-manhanvien">Mã NV</th>
                                    <th id="col-hoten">Họ tên</th>
                                    <th id="col-chucvu">Chức vụ</th>
                                    <th id="col-tentaikhoan">Tài khoản</th>
                                    {{-- <th id="col-matkhau">Mật khẩu</th> --}}
                                    <th id="col-email">Email</th>
                                    <th id="col-sodienthoai">SDT</th>
                                    <th id="col-hanhdong">Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="searchResults">
                                @if ($message)
                                    <tr>
                                        <td colspan="8" class="text-center">{{ $message }}</td>
                                    </tr>
                                @else
                                    @foreach ($nhanvienList as $nhanvien)
                                        <tr>
                                            <td class="col-manhanvien">{{ $nhanvien->manhanvien }}</td>
                                            <td class="col-hoten truncate">
                                                <input type="hidden" name="id[]" value="{{ $nhanvien->manhanvien }}">
                                                <input type="text" class="form-control" name="hoten[]" value="{{ $nhanvien->hoten }}" required>
                                            </td>
                                            <td class="col-chucvu">
                                                <select class="form-select" name="ghinhan[]">
                                                    <option value="quanlycuahang" {{ $nhanvien->taikhoan->vaitro == 'quanlycuahang' ? 'selected' : '' }}>Quản lý cửa hàng</option>
                                                    <option value="quanlykho" {{ $nhanvien->taikhoan->vaitro == 'quanlykho' ? 'selected' : '' }}>Quản lý kho</option>
                                                    <option value="nhanvien" {{ $nhanvien->taikhoan->vaitro == 'nhanvien' ? 'selected' : '' }}>Thuê trả</option>
                                                </select>
                                            </td>
                                            <td class="col-tentaikhoan">{{ $nhanvien->taikhoan->tentaikhoan }}</td>
                                            {{-- <td class="col-matkhau truncate">
                                                <input type="text" class="form-control" name="matkhau[]" value="{{ optional($nhanvien->taikhoan)->matkhau }}" required>
                                            </td> --}}
                                            <td class="col-email truncate">
                                                <input type="email" class="form-control" name="email[]" value="{{ $nhanvien->email }}" required>
                                            </td>
                                            <td class="col-sodienthoai truncate">
                                                <input type="text" class="form-control" name="sodienthoai[]" value="{{ $nhanvien->sodienthoai }}" required>
                                            </td>
                                            <td class="col-hanhdong">
                                                <button 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteModal" 
                                                    style="outline: none; border: none;" 
                                                    type="button" 
                                                    data-id="{{ $nhanvien->manhanvien }}" 
                                                    data-name="{{ $nhanvien->manhanvien }}" 
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
                    <h5 class="modal-title" id="deleteModalLabel">Xóa nhân viên</h5>
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
                deleteMessage.textContent = `Bạn có chắc chắn muốn xóa nhân viên: "${name}" không?`;
                deleteForm.setAttribute('action', `{{ route('route-cuahang-quanlycuahang-quanlynhanvien.xoaNhanVien', '') }}/${id}`);
            });
        });
    });

    function autoResearch() {
        const searchInput = document.getElementById('searchInput');
        searchInput.addEventListener('input', function() {
            const keyword = searchInput.value;
            fetch("{{ route('route-cuahang-quanlycuahang-quanlynhanvien') }}?keyword=" + keyword)
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