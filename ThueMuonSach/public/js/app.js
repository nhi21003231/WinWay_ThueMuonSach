$(document).ready(function () {

  var input = $('#form-dondattruoc').find('input, select');  
  
 input.change(function (e) { 
  e.preventDefault();
  $('#btn-Luu').removeClass('pe-none opacity-50');
 });
});