let judgeData = [];

const tableRowJudge = (id, user_id, fullName, nisNip, phoneNumber) => {
  return `<tr id="tr-judge-${id}">
              <th>${id}</th>
              <td>${fullName}</td>
              <td>${nisNip}</td>
              <td>${phoneNumber}</td>
              <td>
                  <input type="text" id="judge-${id}" name="judge-${id}" class="hidden" value="${user_id}" />
                  <button id="remove-judge-${id}" type="button" class="remove-judge-btn btn btn-sm btn-outline btn-error capitalize">hapus</button>
              </td>
          </tr>`;
};

let categoryData = [];

const tableRowCategoryEval = (id, category) => {
  return `<tr id="tr-category-${id}">
              <th>${id}</th>
              <td>
                <input type="text" id="category-${id}" placeholder="Isikan Nama Kategori" name="category-${id}" value="${category}" class="input-category input input-bordered" required />
              </td>
              <td>
                  <a href="/contest/evaluation-aspect" class="btn btn-sm btn-warning capitalize">edit penilaian</a> |
                  <button id="remove-category-${id}" type="button" class="remove-category-btn btn btn-sm btn-outline btn-error capitalize">hapus</button>
              </td>
          </tr>`;
};

$(document).ready(function () {
  $('#add-judge').click(function () {
    if ($('#judge').val() == '') {
      return Toastify({
        text: 'Pilih juri terlebih dahulu!',
        close: true,
        duration: 3000,
        position: 'left',
        className: 'alert alert-error fixed top-5 right-5 w-fit transition-all',
      }).showToast();
    }

    const user_id = $('#judge').val();

    const fullName = $(`#judge-full-name-${user_id}`).val();
    const nisNip = $(`#judge-nis-nip-${user_id}`).val();
    const phoneNumber = $(`#judge-phone-number-${user_id}`).val();

    judgeData.push({ 'user-id': user_id, 'full-name': fullName, 'nis-nip': nisNip, 'phone-number': phoneNumber });

    $(`#option-${user_id}`).remove();
    $('#jugde').val('').change();

    $('#judge-table').html('');
    judgeData.forEach((judge, index) => $('#judge-table').append(tableRowJudge(index + 1, judge['user-id'], judge['full-name'], judge['nis-nip'], judge['phone-number'])));

    $('#total-judges').val(judgeData.length);
  });

  $('#add-category').click(function () {
    if (!$('#category-eval').val()) {
      return Toastify({
        text: 'Nama Kategori tidak boleh kosong!',
        close: true,
        duration: 3000,
        position: 'left',
        className: 'alert alert-error fixed top-5 right-5 w-fit transition-all',
      }).showToast();
    }

    categoryData.push($('#category-eval').val());
    $('#category-eval').val('');

    $('#category-table').html('');
    categoryData.forEach((category, index) => $('#category-table').append(tableRowCategoryEval(index + 1, category)));

    $('#total-eval-category').val(categoryData.length);
  });

  $(document).click(function (e) {
    const node = e.target;
    const id = node.getAttribute('id');

    if (node.classList.contains('remove-judge-btn')) {
      const remove_id = id.split('-')[2];

      $('#judge').append(`<option id="option-${judgeData[remove_id - 1]['user-id']}" value="${judgeData[remove_id - 1]['user-id']}">${judgeData[remove_id - 1]['full-name']}</option>`);

      judgeData.splice(remove_id - 1, 1);

      $('#judge-table').html('');
      judgeData.forEach((judge, index) => $('#judge-table').append(tableRowJudge(index + 1, judge['full-name'], judge['nis-nip'], judge['phone-number'])));

      $('#total-judges').val(judgeData.length);

      if (judgeData.length == 0) {
        $('#judge-table').html(`<tr>
                                    <td colspan="5">
                                        <h3 class="text-center text-black/50">-- Belum ada Juri yang ditambahkan --</h3>
                                    </td>
                                </tr>`);
      }
    }

    if (node.classList.contains('remove-category-btn')) {
      const remove_id = id.split('-')[2];

      categoryData.splice(remove_id - 1, 1);

      $('#category-table').html('');
      categoryData.forEach((category, index) => $('#category-table').append(tableRowCategoryEval(index + 1, category)));

      $('#total-eval-category').val(categoryData.length);

      if (categoryData.length == 0) {
        $('#category-table').html(`<tr>
                                    <td colspan="5">
                                        <h3 class="text-center text-black/50">-- Belum ada Aspek yang ditambahkan --</h3>
                                    </td>
                                </tr>`);
      }
    }
  });

  $(document).keyup(function (e) {
    const node = e.target;
    const id = node.getAttribute('id');

    if (node.classList.contains('input-category')) {
      const category_id = id.split('-')[1];

      categoryData[category_id - 1] = node.value;
    }
  });
});
