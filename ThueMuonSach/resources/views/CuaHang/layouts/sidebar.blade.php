@if (Request::routeIs('route-cuahang-quanlycuahang*'))
    <a href="{{ route('route-cuahang-quanlycuahang') }}"
        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4">Quản lý cửa hàng</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('route-cuahang-quanlycuahang-quanlynhanvien') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlycuahang-quanlynhanvien*') ? 'active' : 'link-dark' }}">
                Quản lý nhân viên
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-quanlycuahang-xembaibao') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlycuahang-xembaibao*') ? 'active' : 'link-dark' }}">
                Xem bài báo
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
    <a href="{{ route('route-cuahang-quanlykho') }}"
        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4">Quản lý kho</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('route-cuahang-quanlykho-quanlyanpham') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-quanlykho-quanlyanpham*') ? 'active' : 'link-dark' }}">
                Quản lý ấn phẩm
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
    <a href="{{ route('route-cuahang-nhanvien-quanlyanpham') }}"
        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4">Nhân viên</span>
    </a>
    <hr>
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
            <a href="{{ route('route-cuahang-nhanvien-dondactruoc') }}"
                class="nav-link {{ Request::routeIs('route-cuahang-nhanvien-dondactruoc*') ? 'active' : 'link-dark' }}">
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
