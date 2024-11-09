$(document).ready(function () {
  // -------------Remove disable for button Search
  $('.input-tk').on('input', function () {
    $('.btn-tk').removeAttr('disabled');
  });

  // -----------Thay đổi nút lưu
  var input = $('#form-dondattruoc').find('input, select');

  input.on('input', function (e) {

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
      },
      error: function (xhr) {
        console.error('AJAX Error:', xhr.responseText);
      },
    });
  });

  // Xử lí khi phân trang khi Ajax
  $(document).on('click', '.pagination a', function (e) {

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

    const confirmation = confirm('Bạn có chắc chắn muốn xóa khách hàng này không?');
    if (confirmation) {
      // Submit form nếu người dùng xác nhận
      $('.btn-xoakh').attr('type', 'submit');
    }
  });

  // Ajax request dữ liệu cập nhật
  $('.btn-update').click(function () {

    var eventID = $(this).attr('data-event-id');
    $('#customerID').val(eventID);
    // Ajax
    $.ajax({

      type: 'get',
      url: '/nhan-vien/customer-info',
      data: {
        eventID: eventID,
      },
      success: function (data) {
        $('#modal-khachhang .modal-body').html(data);
        $('#modal-khachhang').modal('show');
      },
    });
  });


  // Lấy tất cả ô input
  $('#modal-khachhang').on('shown.bs.modal', function () {

    var findInputModal = $('.modal-body').find('input');
    findInputModal.on('input', function () {
      $('.btn-modal-update').removeAttr('disabled');
    });
  });

  // lắng nghe sự kiện submit form
  $('#form-capnhatCustomer').on('submit', function (e) {

    e.preventDefault();

    var eventID = $('.btn-update').attr('data-event-id');
    $('#customerID').val(eventID);

    var formData = $(this).serialize();
    var csrfToken = $('input[name="_token"]').val();

    // // Ajax
    $.ajax({
      type: 'PUT',
      url: '/nhan-vien/quan-ly-khach-hang/cap-nhat',
      data: formData,
      success: function (response) {
        $('#modal-khachhang').modal('hide');

        if (response.success) {
          toastr.success(response.message, 'Thành công', {
            positionClass: 'toast-bottom-right', // Định vị trí thông báo
            timeOut: '2000', // Thời gian tự động ẩn
            closeButton: true,
            newestOnTop: false,
          });
        }

        setTimeout(() => {
          location.reload();
        }, 1500);

      },
      error: function (xhr) {
        
        if (xhr.status == 422) {
          var errors = xhr.responseJSON.errors;
          $('.text-danger').text('');
          $.each(errors, function (key, value) {
            $('#error-' + key).text(value[0]);
          });
        }
      },
    });
  });
});
