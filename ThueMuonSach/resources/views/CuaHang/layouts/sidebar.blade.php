@if (Request::is('quan-ly-cua-hang*'))
    <a href="{{ route('route-cuahang-quanlycuahang') }}"
        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4">Quản lý cửa hàng</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('route-cuahang-quanlycuahang-quanlynhanvien') }}"
                class="nav-link {{ Request::is('quan-ly-cua-hang/quan-ly-nhan-vien') ? 'active' : 'link-dark' }}">
                Quản lý nhân viên
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-quanlycuahang-xembaibao') }}"
                class="nav-link {{ Request::is('quan-ly-cua-hang/xem-bai-bao') ? 'active' : 'link-dark' }}">
                Xem bài báo
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-quanlycuahang-chamcong') }}"
                class="nav-link {{ Request::is('quan-ly-cua-hang/cham-cong') ? 'active' : 'link-dark' }}">
                Chấm công
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-quanlycuahang-dinhgiaanpham') }}"
                class="nav-link {{ Request::is('quan-ly-cua-hang/dinh-gia-an-pham') ? 'active' : 'link-dark' }}">
                Định giá ấn phẩm
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-quanlycuahang-taokhuyenmai') }}"
                class="nav-link {{ Request::is('quan-ly-cua-hang/tao-khuyen-mai') ? 'active' : 'link-dark' }}">
                Tạo khuyến mãi
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-quanlycuahang-quanlydanhgia') }}"
                class="nav-link {{ Request::is('quan-ly-cua-hang/quan-ly-danh-gia') ? 'active' : 'link-dark' }}">
                Quản lý đánh giá
            </a>
        </li>
    </ul>
@elseif (Request::is('quan-ly-kho*'))
    <a href="{{ route('route-cuahang-quanlykho') }}"
        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4">Quản lý kho</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('route-cuahang-quanlykho-quanlyanpham') }}"
                class="nav-link {{ Request::is('quan-ly-kho/quan-ly-an-pham') ? 'active' : 'link-dark' }}">
                Quản lý ấn phẩm
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-quanlykho-quanlydanhmuc') }}"
                class="nav-link {{ Request::is('quan-ly-kho/quan-ly-danh-muc') ? 'active' : 'link-dark' }}">
                Quản lý danh mục
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-quanlykho-taobaocao') }}"
                class="nav-link {{ Request::is('quan-ly-kho/tao-bao-cao') ? 'active' : 'link-dark' }}">
                Tạo báo cáo
            </a>
        </li>
    </ul>
@elseif (Request::is('nhan-vien*'))
    <a href="{{ route('route-cuahang-quanlykho') }}"
        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4">Nhân viên</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{ route('route-cuahang-nhanvien-quanlyanpham') }}"
                class="nav-link {{ Request::is('nhan-vien/quan-ly-an-pham') ? 'active' : 'link-dark' }}">
                Quản lý ấn phẩm
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-nhanvien-quanlykhachhang') }}"
                class="nav-link {{ Request::is('nhan-vien/quan-ly-khach-hang') ? 'active' : 'link-dark' }}">
                Quản lý khách hàng
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-nhanvien-dangkythanhvien') }}"
                class="nav-link {{ Request::is('nhan-vien/dang-ky-thanh-vien') ? 'active' : 'link-dark' }}">
                Đăng ký thành viên
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('route-cuahang-nhanvien-dangbaibao') }}"
                class="nav-link {{ Request::is('nhan-vien/dang-bai-bao') ? 'active' : 'link-dark' }}">
                Đăng bài báo
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-nhanvien-dondactruoc') }}"
                class="nav-link {{ Request::is('nhan-vien/don-dac-truoc') || Request::is('nhan-vien/don-dac-truoc/*/chi-tiet') ? 'active' : 'link-dark' }}">
                Đơn đặc trước
            </a>
        </li>
        <li>
            <a href="{{ route('route-cuahang-nhanvien-thongkedoanhthu') }}"
                class="nav-link {{ Request::is('nhan-vien/thong-ke-doanh-thu') ? 'active' : 'link-dark' }}">
                Thống kê doanh thu
            </a>
        </li>
    </ul>
@endif

<hr>
<a href="{{ route('route-dangxuat') }}" class="nav-link">
    <h5>Đăng xuất</h5>
</a>
