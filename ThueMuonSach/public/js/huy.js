$(document).ready(function () {
  // -------------Remove disable for button Search
  $('.input-tk').on('input', function () {
    $('.btn-tk').removeAttr('disabled');
  });

  // ---------------------------------------------------------------AJAX-------------------------------------------------------------------------------//
  // Setup CSRF token for all request Ajax
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
  });

  // =================================Function Re-order===================================================
  // -----------Change bg button update re-order
  var input = $('#form-dondattruoc').find('input, select');

  input.on('input', function (e) {
    e.preventDefault();

    $('#btn-Luu').removeClass('pe-none opacity-50');
  });

  // ------------Ajax Request Accept-status Re-order
  $('.status-accept').click(function () {
    var accept_data = $(this).data('id');
    // console.log(accept_data);
    Swal.fire({
      title: 'Xác nhận đơn hàng?',
      text: 'Bạn có muốn xác nhận đơn hàng này.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Đồng ý',
    }).then((result) => {
      if (result.isConfirmed) {
        // console.log('aaaa')
        $.ajax({
          type: 'put',
          url: '/nhan-vien/update/status',
          data: {
            orderID: accept_data,
          },
          // dataType: "dataType",
          success: function (response) {
            if (response.success) {
              toastr.success(response.success, response.message, {
                positionClass: 'toast-bottom-right',
                timeOut: '2000', // set time hidden notify
                closeButton: true,
                newestOnTop: false,
              });
            }
            setTimeout(() => {
              location.reload();
            }, 1000);
          },
        });
      }
    });
  });

  // ----------------------Move Type Order Quickly
  $('.quickly-order').click(function () {
    var data_id = $(this).data('id');

    Swal.fire({
      title: 'Đơn hàng này đã có sách',
      text: 'Bạn có muốn chuyển đơn hàng này thành đơn thuê?.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Đồng ý',
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: 'put',
          url: '/nhan-vien/don-dat-truoc/quickly-status',
          data: {
            orderID: data_id,
          },
          success: function (response) {
            if (response.success) {
              toastr.success(response.success, response.message, {
                positionClass: 'toast-bottom-right',
                timeOut: '2000', // set time hidden notify
                closeButton: true,
                newestOnTop: false,
              });
            }
            setTimeout(() => {
              location.reload();
            }, 1000);
          },
        });
      }
    });
  });

  // =================================Function Customer manager====================================

  // -------------Ajax Request infor Customer for function update
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

  // -------------------Get all input in form modal customer
  $('#modal-khachhang').on('shown.bs.modal', function () {
    var findInputModal = $('.modal-body').find('input');
    findInputModal.on('input', function () {
      $('.btn-modal-update').removeAttr('disabled');
    });
  });

  // -------------------Submit form update customer
  $('#form-capnhatCustomer').on('submit', function (e) {
    e.preventDefault();

    var eventID = $('.btn-update').attr('data-event-id');
    $('#customerID').val(eventID);

    var formData = $(this).serialize();

    //----------Ajax
    $.ajax({
      type: 'PUT',
      url: '/nhan-vien/quan-ly-khach-hang/cap-nhat',
      data: formData,
      success: function (response) {
        $('#modal-khachhang').modal('hide');

        if (response.success) {
          toastr.success(response.message, 'Thành công', {
            positionClass: 'toast-bottom-right',
            timeOut: '2000', // set time hidden notify
            closeButton: true,
            newestOnTop: false,
          });
        }
        // -----------Set time reload page
        setTimeout(() => {
          location.reload();
        }, 1500);
      },
      // ---------------when request return errors
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

  // ------------------show notify delte customer
  $('.btn-xoakh').click(function () {
    Swal.fire({
      title: 'Xóa khách hàng?',
      text: 'Bạn có chắc muốn xóa khách hàng này',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Đồng ý',
    }).then((result) => {
      if (result.isConfirmed) {
        $('#form-deleteCustomer').submit();
      }
    });
  });
  // =========================================Function Crete Report==================================
  // ---------------Request create report with Ajax
  $('.btn-report').click(function () {
    var data = {
      loaibc: $('#loaibc').val(),
      danhmuc: $('#danhmuc').val(),
      startdate: $('#startdate').val(),
      enddate: $('#enddate').val(),
    };
    // ----------------Ajax
    $.ajax({
      type: 'post',
      url: '/quan-ly-kho/tao-bao-cao',
      data: data,
      success: function (response) {
        $('.main-report ').html(response);
        $('#action-report').removeClass('d-none');
        $('.text-danger').text('');
        // console.log(response);
      },
      error: function (xhr) {
        // --------------When request return with errors
        if (xhr.status == 422) {
          $('.main-report ').text('');
          $('#action-report').addClass('d-none');
          var errors = xhr.responseJSON.errors;
          $('.text-danger').text('');
          $.each(errors, function (key, value) {
            $('#error-' + key).text(value[0]);
          });
        }
      },
    });
  });
  // ---Canncel function Create Report----------------------------------------------------------------------------
  $('#cancel-report').click(function () {
    location.reload();
  });
  // -------------------------------------------------------------------------------
  // -------------------------------------------------------------------------------
  // -------------------------------------------------------------------------------
  // -------------------------------------------------------------------------------
});
