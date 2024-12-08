// common.js

// Hàm để tô màu dòng khi tình trạng ấn phẩm thay đổi
function toMauDong() {
    const selects = document.querySelectorAll('select[name^="tinh_trang"]');

    selects.forEach((select) => {
        select.addEventListener("change", function () {
            const row = this.closest("tr"); // Tìm hàng chứa select
            const selectedValue = this.value;
            const oldValue = this.getAttribute("data-old"); // Lấy giá trị cũ từ data-old

            // Kiểm tra giá trị đã thay đổi
            if (selectedValue !== oldValue) {
                row.classList.add("table-info"); // Thêm lớp table-info
            } else {
                row.classList.remove("table-info"); // Xóa lớp table-info nếu chọn lại giá trị cũ
            }
        });
    });
}

// Hàm tô màu dòng khi chọn ấn phẩm thanh lý
function toMauDongThanhLy() {
    // Lấy tất cả các hàng có checkbox
    const rows = document.querySelectorAll("#ba-danhsach tbody tr");

    rows.forEach((row) => {
        // Tìm checkbox trong mỗi hàng
        const checkbox = row.querySelector(".ba-form-check-input");

        // Gắn sự kiện click cho toàn bộ hàng
        row.addEventListener("click", function (event) {
            // Bỏ qua click trên chính checkbox để tránh xung đột
            if (event.target !== checkbox) {
                // Đổi trạng thái của checkbox
                checkbox.checked = !checkbox.checked;
                // Thêm hoặc xóa lớp table-info
                row.classList.toggle("table-info", checkbox.checked);
            }
        });

        // Gắn sự kiện click cho checkbox để đồng bộ với lớp của hàng
        checkbox.addEventListener("click", function () {
            row.classList.toggle("table-info", checkbox.checked);
        });
    });
}

// Hàm tô màu dòng khi nhập số lượng
function toMauDongNhapAnPham() {
    const quantityInputs = document.querySelectorAll('input[name^="soluong"]');

    // Kiểm tra và tô màu ngay khi trang tải
    quantityInputs.forEach((input) => {
        const row = input.closest("tr");

        // Tô màu nếu giá trị ban đầu khác "0" và không rỗng
        if (input.value !== "0" && input.value.trim() !== "") {
            row.classList.add("table-info");
        }

        // Lắng nghe sự kiện thay đổi giá trị trong quá trình nhập
        input.addEventListener("input", function () {
            const value = this.value.trim(); // Loại bỏ khoảng trắng thừa

            // Tô màu nếu giá trị khác "0" và không rỗng
            if (value !== "0" && value !== "") {
                row.classList.add("table-info");
            } else {
                row.classList.remove("table-info");
            }
        });
    });
}


// Hàm tìm kiếm
function timKiemAnPham() {
    const searchInput = document.getElementById("ba-timkiem");
    const productTable = document.getElementById("ba-danhsach");
    const searchButton = document.getElementById("ba-nuttimkiem");
    const noResultsRow = document.getElementById("khong-an-pham");

    const tbodyRows = productTable
        .getElementsByTagName("tbody")[0]
        .getElementsByTagName("tr");

    // Kích hoạt tìm kiếm khi nhấn Enter trong ô tìm kiếm
    searchInput.addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            event.preventDefault(); // Ngăn form submit nếu có
            searchButton.click(); // Kích hoạt nút tìm kiếm
        }
    });

    // Sự kiện khi nhấn vào nút tìm kiếm
    searchButton.addEventListener("click", function () {
        const filter = searchInput.value.toLowerCase();
        let hasResults = false;

        for (let i = 0; i < tbodyRows.length; i++) {
            const cells = tbodyRows[i].getElementsByClassName("search-column");
            let found = false;

            for (let j = 0; j < cells.length; j++) {
                const cellText = cells[j].textContent || cells[j].innerText;
                if (cellText.toLowerCase().indexOf(filter) > -1) {
                    found = true;
                    hasResults = true;
                    break;
                }
            }

            // Hiển thị hoặc ẩn hàng dựa trên kết quả tìm kiếm
            tbodyRows[i].style.display = found ? "" : "none";
        }

        // Hiển thị hoặc ẩn thông báo không có kết quả
        noResultsRow.style.display = hasResults ? "none" : "";
    });
}
