document.addEventListener('DOMContentLoaded', function () {
    const defaultColumns = ['manhanvien', 'hoten', 'chucvu'];

    // Gán sự kiện click cho từng checkbox
    document.querySelectorAll('.column-toggle').forEach(function (checkbox) {
        checkbox.addEventListener('change', applyColumnSelection);
    });

    // Gán sự kiện cho nút Bỏ chọn
    document.getElementById('resetColumns').addEventListener('click', function () {
        // Đặt lại trạng thái của các checkbox theo cột mặc định
        document.querySelectorAll('.column-toggle').forEach(function (checkbox) {
            checkbox.checked = defaultColumns.includes(checkbox.getAttribute('data-column'));
        });

        // Hiển thị lại chỉ các cột mặc định
        applyColumnSelection();
    });
});


function applyColumnSelection() {
    // Lặp qua từng checkbox
    document.querySelectorAll('.column-toggle').forEach(function (checkbox) {
        let columnClass = 'col-' + checkbox.getAttribute('data-column');
        let columnElements = document.querySelectorAll('.' + columnClass + ', #col-' + checkbox.getAttribute('data-column'));
        
        // Kiểm tra trạng thái checkbox và hiển thị/ẩn cột
        columnElements.forEach(function (element) {
            if (checkbox.checked) {
                element.style.display = '';
            } else {
                element.style.display = 'none';
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', function () {
    // Lắng nghe sự kiện submit của form tìm kiếm
    document.getElementById('searchForm').addEventListener('submit', function (e) {
        e.preventDefault(); // Ngăn không cho form gửi yêu cầu tải lại trang

        // Lấy từ khóa tìm kiếm
        const keyword = document.querySelector('input[name="keyword"]').value;
        
        // Thực hiện yêu cầu AJAX
        fetch(`{{ route('route-cuahang-quanlycuahang-quanlynhanvien') }}?keyword=${keyword}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest' // Đánh dấu yêu cầu là AJAX
            }
        })
        .then(response => response.text())
        .then(data => {
            // Thay thế nội dung của bảng nhân viên với kết quả tìm kiếm
            document.querySelector('tbody').innerHTML = data;
        })
        .catch(error => console.error('Lỗi khi tìm kiếm:', error));
    });
});