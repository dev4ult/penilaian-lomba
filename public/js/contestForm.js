$(document).ready(function () {
  let totalDataJudge = 0;

  const tableRowJudge = (id) => {
    return `<tr id="tr-judge-${id}">
                <th>${id}</th>
                <td>Nibras Alyassar</td>
                <td>2100000000</td>
                <td>080000000000</td>
                <td>
                    <button id="remove-${id}" type="button" class="remove-judge-btn btn btn-sm btn-outline btn-error capitalize">hapus</button>
                </td>
            </tr>`;
  };

  $('#add-judge').click(function () {
    if ($('#judge').val()) {
      const prevData = $('#judge-table').html();
      const newJudge = tableRowJudge(totalDataJudge + 1);

      $('#judge-table').html(totalDataJudge == 0 ? newJudge : prevData + newJudge);
      totalDataJudge++;
    } else {
      Toastify({
        text: 'Pilih juri terlebih dahulu',
        close: true,
        duration: 3000,
        position: 'left',
        className: 'alert alert-error fixed top-5 right-5 w-fit transition-all',
      }).showToast();
    }
  });

  let totalDataAspect = 0;

  const tableRowAspect = (id, aspect, range) => {
    return `<tr id="tr-aspect-${id}">
                <th>${id}</th>
                <td>${aspect}</td>
                <td>${range}</td>
                <td>
                    <button id="remove-aspect-${id}" type="button" class="remove-aspect-btn btn btn-sm btn-outline btn-error capitalize">hapus</button>
                </td>
            </tr>`;
  };

  $('#add-aspect').click(function () {
    if (!$('#aspect').val()) {
      return Toastify({
        text: 'Pilih juri terlebih dahulu',
        close: true,
        duration: 3000,
        position: 'left',
        className: 'alert alert-error fixed top-5 right-5 w-fit transition-all',
      }).showToast();
    }

    if (!$('#aspect-range').val()) {
      return Toastify({
        text: 'Pilih juri terlebih dahulu',
        close: true,
        duration: 3000,
        position: 'left',
        className: 'alert alert-error fixed top-5 right-5 w-fit transition-all',
      }).showToast();
    }

    const prevData = $('#aspect-table').html();
    const newAspect = tableRowAspect(totalDataAspect + 1, $('#aspect').val(), $('#aspect-range').val());

    $('#aspect-table').html(totalDataAspect == 0 ? newAspect : prevData + newAspect);
    totalDataAspect++;
  });

  $(document).click(function (e) {
    const node = e.target;
    if (node.classList.contains('remove-judge-btn')) {
      const id = node.getAttribute('id');
      const remove_id = id.split('-')[1];

      $(`#tr-judge-${remove_id}`).remove();

      totalDataJudge--;

      if (totalDataJudge == 0) {
        $('#judge-table').html(`<tr>
                                    <td colspan="5">
                                        <h3 class="text-center text-black/50">-- Belum ada Juri yang ditambahkan --</h3>
                                    </td>
                                </tr>`);
      }
    }

    if (node.classList.contains('remove-aspect-btn')) {
      const id = node.getAttribute('id');
      const remove_id = id.split('-')[1];

      $(`#tr-judge-${remove_id}`).remove();

      totalDataAspect--;

      if (totalDataAspect == 0) {
        $('#aspect-table').html(`<tr>
                                    <td colspan="5">
                                        <h3 class="text-center text-black/50">-- Belum ada Aspek yang ditambahkan --</h3>
                                    </td>
                                </tr>`);
      }
    }
  });
});
