$(document).ready(function () {
  // -------------Remove disable for button Search
  $('.input-tk').on('input', function () {
    $('.btn-tk').removeAttr('disabled');
  });

  // -----------Change bg button update re-order
  var input = $('#form-dondattruoc').find('input, select');

  input.on('input', function (e) {
    e.preventDefault();
    $('#btn-Luu').removeClass('pe-none opacity-50');
  });

  // ------------------show notify delte customer
  $('.btn-xoakh').click(function (e) {
    const confirmation = confirm('Bạn có chắc chắn muốn xóa khách hàng này không?');
    if (confirmation) {
      $('.btn-xoakh').attr('type', 'submit');
    }
  });

  // ---------------------------------------------------------------AJAX-------------------------------------------------------------------------------//

  // -------------------------Ajax search
  // Setup CSRF token for all request Ajax
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    },
  });

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

  // -------------------listen event submit form update customer
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

  // ---------------Request create report with Ajax
  $('.btn-report').click(function () {
    var data = {
      loaibc: $('#loaibc').val(),
      danhmuc: $('#danhmuc').val(),
      startdate: $('#startdate').val(),
      enddate: $('#enddate').val(),
    };

    // console.log(data);
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
