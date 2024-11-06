@if (Auth::check() && Auth::user()->vaitro === 'admin')
    <div class="dropend w-100">
        <button class="btn fs-4 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
        </button>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('route-cuahang-nhanvien') }}">Nhân viên</a></li>
            <li><a class="dropdown-item" href="{{ route('route-cuahang-quanlykho') }}">Quản lý kho</a></li>
            <li><a class="dropdown-item" href="{{ route('route-cuahang-quanlycuahang') }}">Quản lý cửa hàng</a></li>
        </ul>
    </div>
@elseif (Auth::user()->vaitro === 'quanlycuahang')
    <a href="{{ route('route-cuahang-quanlycuahang') }}"
        class="d-flex align-items-center me-md-auto link-dark text-decoration-none">
        <span class="fs-4">Quản lý cửa hàng</span>
    </a>
@elseif (Auth::user()->vaitro === 'quanlykho')
    <a href="{{ route('route-cuahang-quanlykho') }}"
        class="d-flex align-items-center me-md-auto link-dark text-decoration-none">
        <span class="fs-4">Quản lý kho</span>
    </a>
@elseif (Auth::user()->vaitro === 'nhanvien')
    <a href="{{ route('route-cuahang-nhanvien') }}"
        class="d-flex align-items-center me-md-auto link-dark text-decoration-none">
        <span class="fs-4">Nhân viên</span>
    </a>
@endif

<hr>

@if (Request::routeIs('route-cuahang-quanlycuahang*'))
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('route-cuahang-quanlycuahang-quanlynhanvien') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlycuahang-quanlynhanvien*') ? 'active' : 'link-dark' }}">
                Quản lý nhân viên
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-quanlycuahang-xembaocao') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlycuahang-xembaocao*') ? 'active' : 'link-dark' }}">
                Xem báo cáo
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-quanlycuahang-chamcong') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlycuahang-chamcong*') ? 'active' : 'link-dark' }}">
                Chấm công
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-quanlycuahang-dinhgiaanpham') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlycuahang-dinhgiaanpham*') ? 'active' : 'link-dark' }}">
                Định giá ấn phẩm
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-quanlycuahang-taokhuyenmai') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlycuahang-taokhuyenmai*') ? 'active' : 'link-dark' }}">
                Tạo khuyến mãi
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-quanlycuahang-quanlydanhgia') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlycuahang-quanlydanhgia*') ? 'active' : 'link-dark' }}">
                Quản lý đánh giá
            </a>
        </li>
    </ul>
@elseif (Request::routeIs('route-cuahang-quanlykho*'))
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('route-cuahang-quanlykho-quanlyanpham') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlykho-quanlyanpham*') ? 'active' : 'link-dark' }}">
                Quản lý ấn phẩm
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('route-cuahang-quanlykho-quanlytonkho') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlykho-quanlytonkho*') ? 'active' : 'link-dark' }}">
                Quản lý tồn kho
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-quanlykho-quanlydanhmuc') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlykho-quanlydanhmuc*') ? 'active' : 'link-dark' }}">
                Quản lý danh mục
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-quanlykho-taobaocao') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlykho-taobaocao*') ? 'active' : 'link-dark' }}">
                Tạo báo cáo
            </a>
        </li>
    </ul>
@elseif (Request::routeIs('route-cuahang-nhanvien*'))
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{ route('route-cuahang-nhanvien-quanlyanpham') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-nhanvien-quanlyanpham*') ? 'active' : 'link-dark' }}">
                Quản lý ấn phẩm
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-nhanvien-quanlykhachhang') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-nhanvien-quanlykhachhang*') ? 'active' : 'link-dark' }}">
                Quản lý khách hàng
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-nhanvien-dangkythanhvien') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-nhanvien-dangkythanhvien*') ? 'active' : 'link-dark' }}">
                Đăng ký thành viên
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('route-cuahang-nhanvien-dangbaibao') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-nhanvien-dangbaibao*') ? 'active' : 'link-dark' }}">
                Đăng bài báo
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-nhanvien-dondattruoc') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-nhanvien-dondattruoc*') ? 'active' : 'link-dark' }}">
                Đơn đặc trước
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-nhanvien-thongkedoanhthu') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-nhanvien-thongkedoanhthu*') ? 'active' : 'link-dark' }}">
                Thống kê doanh thu
            </a>
        </li>
    </ul>
@endif

<hr>
<a href="{{ route('route-dangxuat') }}" class="nav-link">
    <h5>Đăng xuất</h5>
</a>
