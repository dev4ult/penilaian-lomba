if (totalCategories == 1) {
  $('#prev-btn').addClass('hidden');
  $('#next-btn').addClass('hidden');
  $('#submit-btn').removeClass('hidden');
}

function displayCategory() {
  const category_id = $('.tab')[indexTabActive].getAttribute('id').split('-')[2];

  tab = category_id;
  $('.category-container').addClass('hidden');
  $(`#category-container-${category_id}`).removeClass('hidden');

  if (indexTabActive == 0) {
    $('#prev-btn').addClass('hidden');
    $('#next-btn').removeClass('hidden');
    $('#submit-btn').addClass('hidden');
  } else if (indexTabActive == totalCategories - 1) {
    $('#prev-btn').removeClass('hidden');
    $('#next-btn').addClass('hidden');
    $('#submit-btn').removeClass('hidden');
  } else {
    $('#submit-btn').addClass('hidden');
    $('#prev-btn').removeClass('hidden');
    $('#next-btn').removeClass('hidden');
  }
}

$(document).ready(function () {
  $('#next-btn').click(function () {
    if (indexTabActive < totalCategories - 1) {
      $('.tab')[indexTabActive].classList.remove('tab-active');
      indexTabActive++;
      $('.tab')[indexTabActive].classList.add('tab-active');

      displayCategory();
    }
  });

  $('#prev-btn').click(function () {
    if (indexTabActive > 0) {
      $('.tab')[indexTabActive].classList.remove('tab-active');
      indexTabActive--;
      $('.tab')[indexTabActive].classList.add('tab-active');

      displayCategory();
    }
  });

  $('.tab').click(function () {
    displayCategory();
  });
});
