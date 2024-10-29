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
function chonDongThanhLy() {
    // Lấy tất cả các hàng có checkbox
    const rows = document.querySelectorAll("#ba-danhsach tbody tr");

    rows.forEach((row) => {
        // Tìm checkbox trong mỗi hàng
        const checkbox = row.querySelector(".ba-form-check-input");

        // Gắn sự kiện click cho toàn bộ hàng
        row.addEventListener("click", function(event) {
            // Bỏ qua click trên chính checkbox để tránh xung đột
            if (event.target !== checkbox) {
                // Đổi trạng thái của checkbox
                checkbox.checked = !checkbox.checked;
                // Thêm hoặc xóa lớp table-info
                row.classList.toggle("table-info", checkbox.checked);
            }
        });

        // Gắn sự kiện click cho checkbox để đồng bộ với lớp của hàng
        checkbox.addEventListener("click", function() {
            row.classList.toggle("table-info", checkbox.checked);
        });
    });
}

// Hàm tìm kiếm
function timKiemAnPham() {
    const searchInput = document.getElementById("ba-timkiem");
    const productTable = document.getElementById("ba-danhsach");
    const searchButton = document.getElementById("ba-nuttimkiem");
    const noResultsRow = document.getElementById("khong-an-pham");
    const rows = productTable.getElementsByTagName("tr");

    searchButton.addEventListener("click", function () {
        const filter = searchInput.value.toLowerCase();
        let hasResults = false; // Biến để kiểm tra xem có kết quả hay không

        // Lặp qua tất cả các hàng
        for (let i = 0; i < rows.length; i++) {
            const cells = rows[i].getElementsByTagName("td");
            let found = false;

            // Kiểm tra tất cả các ô trong hàng
            for (let j = 0; j < cells.length; j++) {
                if (cells[j]) {
                    const cellText = cells[j].textContent || cells[j].innerText;
                    if (cellText.toLowerCase().indexOf(filter) > -1) {
                        found = true; // Nếu tìm thấy, đánh dấu là đã tìm thấy
                        hasResults = true; // Đánh dấu rằng đã tìm thấy ít nhất 1 kết quả
                        break;
                    }
                }
            }

            // Hiển thị hoặc ẩn hàng dựa trên kết quả tìm kiếm
            if (found) {
                rows[i].style.display = ""; // Hiển thị
            } else {
                rows[i].style.display = "none"; // Ẩn
            }
        }

        // Kiểm tra xem có kết quả hay không và hiển thị thông báo
        noResultsRow.style.display = hasResults ? "none" : ""; // Hiển thị hoặc ẩn thông báo
    });
}