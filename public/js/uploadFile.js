$(document).ready(function () {
  function enterContainer() {
    $('#upload-container').addClass('bg-primary');
    $('#upload-container').addClass('text-primary-content');
    $('#browse-file').addClass('btn-neutral');
    $('#browse-file').removeClass('btn-primary');
    $('#browse-file').removeClass('btn-outline');
  }

  function leaveContainer() {
    $('#upload-container').removeClass('bg-primary');
    $('#upload-container').removeClass('text-primary-content');
    $('#browse-file').addClass('btn-primary');
    $('#browse-file').removeClass('btn-neutral');
    $('#browse-file').addClass('btn-outline');
  }

  $('#upload-container').on('dragenter', function (e) {
    e.preventDefault();
    e.stopPropagation();
    enterContainer();
  });

  $('#upload-container').on('dragleave', function (e) {
    e.preventDefault();
    e.stopPropagation();
    leaveContainer();
  });

  $('#upload-container').on('dragover', function (e) {
    e.preventDefault();
    e.stopPropagation();
    enterContainer();
  });

  $('#upload-container').on('drop', function (e) {
    e.preventDefault();
    e.stopPropagation();

    const draggedData = e.originalEvent.dataTransfer;
    const fileImg = draggedData.files[0];

    const imageEl = `<img src="${URL.createObjectURL(fileImg)}" class="w-52 h-40 bg-cover" alt="preview"/>`;

    $('#upload-text').removeClass('items-center');
    $('#upload-text').addClass('items-end');

    $('#preview-file').html(imageEl);

    leaveContainer();
  });

  $('#picture').change(function (e) {
    e.preventDefault();
    e.stopPropagation();

    const fileImg = e.target.files[0];

    const imageEl = `<img src="${URL.createObjectURL(fileImg)}" class="w-52 h-40 bg-cover" alt="preview"/>`;

    $('#upload-text').removeClass('items-center');
    $('#upload-text').addClass('items-end');

    $('#preview-file').html(imageEl);

    leaveContainer();
  });
});
