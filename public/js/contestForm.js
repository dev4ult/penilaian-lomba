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

  let totalDataCategory = 0;

  const tableRowCategoryEval = (id, category) => {
    return `<tr id="tr-category-${id}">
                <th>${id}</th>
                <td>${category}</td>
                <td class="flex gap-1.5 items-center">
                    <a href="/contest/evaluation-aspect" class="btn btn-sm btn-neutral capitalize">aspek penilaian</a> |
                    <button id="remove-category-${id}" type="button" class="remove-category-btn btn btn-sm btn-outline btn-error capitalize">hapus</button>
                </td>
            </tr>`;
  };

  $('#add-category').click(function () {
    if (!$('#category-eval').val()) {
      return Toastify({
        text: 'Nama Kategory tidak boleh kosong',
        close: true,
        duration: 3000,
        position: 'left',
        className: 'alert alert-error fixed top-5 right-5 w-fit transition-all',
      }).showToast();
    }

    const prevData = $('#category-table').html();
    const newCategoryEval = tableRowCategoryEval(totalDataCategory + 1, $('#category-eval').val());

    $('#category-eval').val('');

    $('#category-table').html(totalDataCategory == 0 ? newCategoryEval : prevData + newCategoryEval);
    totalDataCategory++;
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

    if (node.classList.contains('remove-category-btn')) {
      const id = node.getAttribute('id');
      const remove_id = id.split('-')[2];

      $(`#tr-category-${remove_id}`).remove();

      totalDataCategory--;

      if (totalDataCategory == 0) {
        $('#category-table').html(`<tr>
                                    <td colspan="5">
                                        <h3 class="text-center text-black/50">-- Belum ada Aspek yang ditambahkan --</h3>
                                    </td>
                                </tr>`);
      }
    }
  });
});
