$(function() {
  $('#select_option').change(function(){
    $('.options_selected').hide();
    $('#' + $(this).val()).show();
  });
});