$(document).ready(function () {
  // -----------Thay đổi nút lưu
  var input = $('#form-dondattruoc').find('input, select');

  input.change(function (e) {
    e.preventDefault();
    $('#btn-Luu').removeClass('pe-none opacity-50');
  });

  // Ajax search
  // Thiết lập CSRF token cho tất cả các yêu cầu AJAX
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': '{{ csrf_token() }}',
    },
  });

  $('#sapxepDTT').change(function (e) {
    e.preventDefault();
    $.ajax({
      type: 'GET',
      url: '/nhan-vien/don-dat-truoc',
      data: {
        search: $(this).val(), // Sử dụng giá trị của dropdown
      },
      success: function (data) {
        $('#list-DTT').html(data);
        console.log(data);
      },
      error: function (xhr) {
        console.error('AJAX Error:', xhr.responseText);
      },
    });
  });

  // Xử lí khi phân trang khi Ajax
  $(document).on('click', '.pagination a', function (e) {
    // e.preventDefault();
    const url = $(this).attr('href');
    // const searchValue = $('input[name="TimKiem"]').val();
    const sortValue = $('#sapxepDTT').val();

    $.ajax({
      type: 'GET',
      url: url,
      data: {
        // search: searchValue,
        search: sortValue,
      },
      success: function (data) {
        $('#list-DTT').html(data);
      },
    });
  });

  // hiển thị thông báo xóa

  $('.btn-xoakh').click(function (e) { 
    e.preventDefault
    const confirmation = confirm("Bạn có chắc chắn muốn xóa khách hàng này không?");
    if (confirmation) {
        // Submit form nếu người dùng xác nhận
        $(button).type('submit');
    }
   })
});
