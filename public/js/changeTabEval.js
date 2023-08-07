let tab = $('.tab-active').attr('id').split('-')[2];
let indexTabActive = 0;

$(document).ready(function () {
  $('.tab').click(function () {
    $('.tab').removeClass('tab-active');

    $(this).addClass('tab-active');

    const category_id = this.id.split('-')[2];
    const index = this.id.split('-')[3];

    indexTabActive = index;

    tab = category_id;
  });
});
