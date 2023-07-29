$('#leader').keyup(function () {
  $('#member-1').val(this.value);
});

$('#member-1').keyup(function () {
  $('#leader').val(this.value);
});
