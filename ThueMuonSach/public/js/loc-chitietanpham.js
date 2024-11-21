//hàm này để chuyển đổi giữa thông tin và đánh giá
function showTab(tab) {
    // Xóa lớp 'active' khỏi tất cả các nút
    document.querySelectorAll('.tab-btn').forEach((btn) => btn.classList.remove('active'));

    // Ẩn tất cả nội dung
    document.querySelectorAll('.tab-content').forEach((content) => content.classList.remove('active'));

    // Hiển thị nội dung tương ứng và kích hoạt nút
    document.getElementById(`${tab}-tab`).classList.add('active');
    document.getElementById(`${tab}-content`).classList.add('active');
}