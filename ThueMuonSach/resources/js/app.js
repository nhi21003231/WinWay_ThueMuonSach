// import '.boostrap';
$(document).ready(function () {
  var input = $('#form-dondattruoc').find(':input')
  input.change(function (e) { 
    e.preventDefault();
    $('#btn-Luu').removeClass('pe-none opacity-50');
  });;
});