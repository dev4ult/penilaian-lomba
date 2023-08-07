let subCategoryData = [];

function isAnyFieldEmpty(category_id) {
  const data = subCategoryData[category_id];

  const category_name = $(`#category-name-${category_id}`).val();

  if (category_name == '') {
    Toastify({
      text: 'Field nama Kategori tidak boleh kosong!',
      close: true,
      duration: 3000,
      position: 'left',
      className: `alert alert-error fixed z-20 top-5 right-5 w-fit transition-all`,
    }).showToast();

    return true;
  }

  for (let i = 0; i < subCategoryData[category_id].length; i++) {
    if (data[i].subCategoryName == '' && data[i].subCategoryId != 'delete') {
      Toastify({
        text: 'Field nama Sub Kategori tidak boleh kosong!',
        close: true,
        duration: 3000,
        position: 'left',
        className: `alert alert-error fixed z-20 top-5 right-5 w-fit transition-all`,
      }).showToast();

      return true;
    }

    for (let j = 0; j < data[i].aspects.length; j++) {
      if (data[i].aspects[j]['name'] == '' && data[i].aspects[j]['aspectId'] != 'delete') {
        Toastify({
          text: 'Field nama Aspek Penilaian tidak boleh kosong!',
          close: true,
          duration: 3000,
          position: 'left',
          className: `alert alert-error fixed z-20 top-5 right-5 w-fit transition-all`,
        }).showToast();

        return true;
      }

      if (data[i].aspects[j]['range'] == null && data[i].aspects[j]['aspectId'] != 'delete') {
        console.log(data[i].aspect);
        Toastify({
          text: 'Setiap Aspek Penilaian harus dipilih range penilaiannya!',
          close: true,
          duration: 3000,
          position: 'left',
          className: `alert alert-error fixed z-20 top-5 right-5 w-fit transition-all`,
        }).showToast();

        return true;
      }
    }
  }
}

// let tab = $('.tab-active').attr('id').split('-')[2];

const subCategoryHtml = (subCategoryAlpha, subCategoryName, categoryId, subCategoryIndex) => {
  return `<div class="overflow-x-auto my-6 relative z-0">
              <table class="table table-lg bg-white border-2">
                  <thead>
                      <tr class="text-base text-center">
                          <th class="border-2">${subCategoryAlpha}</th>
                          <th class="text-left border-2">
                              <input type="text" id="sub-category-${categoryId}-${subCategoryIndex}" name="sub-category-${categoryId}-${subCategoryIndex}" class="sub-category-input input font-medium text-black input-bordered"
                                  placeholder="Nama Sub Kategori" value="${subCategoryName}" required />
                          </th>
                          <th></th>
                          <th colspan="2" class="border-2">Kurang</th>
                          <th colspan="2" class="border-2">Cukup</th>
                          <th colspan="2" class="border-2">Baik</th>
                          <th colspan="2" class="border-2">Sangat Baik</th>
                          <th>
                              <button type="button" id="delete-sub-${categoryId}-${subCategoryIndex}" class="delete-sub-category-btn btn btn-error capitalize btn-outline btn-sm">hapus</button>
                          </th>
                      </tr>
                  </thead>
                  <tbody id="aspect-container-${categoryId}-${subCategoryIndex}">
                  </tbody>
                  <tfoot>
                      <tr>
                          <td class="border-2"></td>
                          <td colspan="11" class="border-2">
                              <button id="new-aspect-${categoryId}-${subCategoryIndex}" type="button" class="add-new-aspect btn btn-outline btn-sm btn-primary capitalize">tambah aspek penilaian</button>
                          </td>
                      </tr>
                  </tfoot>
              </table>
          </div>`;
};

const aspectRowHtml = (index, categoryId, subCategoryIndex, aspectName, rangeVal) => {
  let range = '';
  for (let i = 0; i < 8; i++) {
    range += `<td class="border-2">${rangeVal ? i + parseInt(rangeVal) : ''}</td>`;
  }

  return `<tr id="tr-aspect-${index}-${categoryId}-${subCategoryIndex}" class="text-xl font-semibold text-center">
              <td class="border-2">${index + 1}</td>
              <td class="border-2">
                  <input type="text" id="eval-aspect-${index}-${subCategoryIndex}" name="eval-aspect-${index}-${subCategoryIndex}" class="aspect-input input input-sm input-bordered w-full"
                      placeholder="Nama Aspek" value="${aspectName}" required />
              </td>
              <td class="border-2">
                  <select id="aspect-range-${index}-${subCategoryIndex}" name="aspect-range-${index}-${subCategoryIndex}" class="aspect-select select select-sm select-bordered join-item" required>
                      <option value="" disabled ${rangeVal ? '' : 'selected'}>Range</option>
                      <option value="1" ${rangeVal == '1' ? 'selected' : ''}>1 - 8</option>
                      <option value="2" ${rangeVal == '2' ? 'selected' : ''}>2 - 9</option>
                      <option value="3" ${rangeVal == '3' ? 'selected' : ''}>3 - 10</option>
                      <option value="4" ${rangeVal == '4' ? 'selected' : ''}>4 - 11</option>
                  </select>
              </td>
              ${range}
              <td>
                  <button id="remove-${index}-${subCategoryIndex}" class="remove-aspect-btn btn btn-error btn-sm btn-outline capitalize">hapus</button>
              </td>
          </tr>`;
};

const subCategoryViewHtml = (subCategoryAlpha, subCategoryName, categoryId, subCategoryId) => {
  return `<table class="table table-lg bg-white border-2 my-6">
            <thead>
                <tr class="text-base text-center">
                    <th class="border-2">${subCategoryAlpha}</th>
                    <th class="text-left border-2">
                        <h3 class="font-semibold text-lg">${subCategoryName}</h3>
                    </th>
                    <th colspan="2" class="border-2">Kurang</th>
                    <th colspan="2" class="border-2">Cukup</th>
                    <th colspan="2" class="border-2">Baik</th>
                    <th colspan="2" class="border-2">Sangat Baik</th>
                </tr>
            </thead>
            <tbody id="aspect-container-view-${categoryId}-${subCategoryId}"></tbody>
          </table>`;
};

const aspectRowViewHtml = (index, categoryId, subCategoryIndex, aspectName, rangeVal) => {
  let range = '';
  for (let i = 0; i < 8; i++) {
    range += `<td class="border-2 p-2">
                  <label>
                      <input type="radio" class="hidden peer" name="options-${index}-${categoryId}-${subCategoryIndex}" />
                      <span class="btn w-full peer-checked:btn-primary">${rangeVal + i}</span>
                  </label>
              </td>`;
  }

  return `<tr class="text-xl font-semibold ">
            <td class="border-2 text-center">${index}</td>
            <td class="border-2">
                <h4>${aspectName}</h4>
            </td>
            ${range}
          </tr>`;
};

$(document).ready(function () {
  // view and edit mode
  $('.view-edit-btn').click(function () {
    const mode = this.getAttribute('aria-label');

    if (mode == 'edit') {
      $('.view-mode').addClass('hidden');
      $('.edit-mode').removeClass('hidden');
    } else {
      $('.edit-mode').addClass('hidden');
      $('.view-mode').removeClass('hidden');
    }
  });

  // category tab change
  $('.tab').click(function () {
    const category_id = this.id.split('-')[2];

    tab = category_id;

    $('.category-container').addClass('hidden');
    $(`#category-container-${category_id}`).removeClass('hidden');
  });

  // delete category open modal
  $('.delete-category-btn').click(function () {
    const contestId = $('#contest-id').val();
    const categoryId = this.id.split('-')[2];
    const categoryName = this.id.split('-')[3];

    $('#confirm-delete-category').attr('href', `/contest/evaluation-aspect/delete/${contestId}/${categoryId}`);
    $('#category-delete').html(categoryName);
    $('#confirm-delete-category').removeClass('hidden');
    delete_category_modal.showModal();
  });

  let charCode = 65;
  $('.add-sub-category').click(function () {
    subCategoryData[tab].push({
      subCategoryId: null,
      subCategoryName: '',
      charCode,
      aspects: [{ aspectId: null, name: '', range: null }],
    });

    $(`#sub-category-container-${tab}`).html('');
    subCategoryData[tab].forEach((data, subCategoryIndex) => {
      data.subCategoryId != 'delete' ? $(`#sub-category-container-${tab}`).append(subCategoryHtml(String.fromCharCode(data.charCode), data.subCategoryName, tab, subCategoryIndex)) : '';

      data.aspects.forEach((item, aIndex) => {
        return item['aspectId'] != 'delete' ? $(`#aspect-container-${tab}-${subCategoryIndex}`).append(aspectRowHtml(aIndex, tab, subCategoryIndex, item['name'], item['range'])) : '';
      });
    });

    if (subCategoryData[tab].map((data) => data.subCategoryId).some((id) => id == null || id > 0)) {
      $(`#save-eval-aspect-${tab}`).removeClass('hidden');
    }

    charCode++;
  });

  $('#confirm-delete').click(function () {
    const dataId = $(this).attr('data-id').split('-');

    const categoryId = dataId[0];
    const subCategoryIndex = dataId[1];
    const deleteId = dataId[2];

    subCategoryData[categoryId][subCategoryIndex].deleteId = deleteId;
    subCategoryData[categoryId][subCategoryIndex].subCategoryId = 'delete';

    subCategoryData[categoryId][subCategoryIndex].aspects.forEach((item, index) => {
      item.deleteId = item.aspectId;
      item.aspectId = 'delete';
    });

    if (!subCategoryData[tab].map((data) => data.subCategoryId).some((id) => id == null || id > 0)) {
      $(`#save-eval-aspect-${tab}`).addClass('hidden');
    }

    $(`#sub-category-container-${tab}`).html('');
    subCategoryData[categoryId].forEach((data, subCategoryIndex) => {
      function refresh() {
        $(`#sub-category-container-${tab}`).append(subCategoryHtml(String.fromCharCode(data.charCode), data.subCategoryName, tab, subCategoryIndex));

        data.aspects.forEach((item, aIndex) => {
          return item['aspectId'] != 'delete' ? $(`#aspect-container-${tab}-${subCategoryIndex}`).append(aspectRowHtml(aIndex, tab, subCategoryIndex, item['name'], item['range'])) : '';
        });
      }

      return data.subCategoryId != 'delete' ? refresh() : '';
    });

    $('#confirm-delete').addClass('hidden');
    delete_modal.close();
  });

  $(document).click(function (e) {
    const node = e.target;

    // add new aspect
    if (node.classList.contains('add-new-aspect')) {
      const subCategoryIndex = node.getAttribute('id').split('-')[3];

      subCategoryData[tab][subCategoryIndex].aspects.push({ aspectId: null, name: '', range: null });

      $(`#aspect-container-${tab}-${subCategoryIndex}`).html('');

      subCategoryData[tab][subCategoryIndex].aspects.forEach((item, aIndex) => {
        $(`#aspect-container-${tab}-${subCategoryIndex}`).append(aspectRowHtml(aIndex, tab, subCategoryIndex, item['name'], item['range']));
      });
    }

    // remove aspect
    if (node.classList.contains('remove-aspect-btn')) {
      const btnId = node.getAttribute('id').split('-');

      const aIndex = btnId[1];
      const subCategoryIndex = btnId[2];

      const delete_id = subCategoryData[tab][subCategoryIndex].aspects[aIndex].aspectId;

      subCategoryData[tab][subCategoryIndex].aspects[aIndex].deleteId = delete_id;
      subCategoryData[tab][subCategoryIndex].aspects[aIndex].aspectId = 'delete';

      $(`#aspect-container-${tab}-${subCategoryIndex}`).html('');

      subCategoryData[tab][subCategoryIndex].aspects.forEach((item, aIndex) => {
        return item['aspectId'] != 'delete' ? $(`#aspect-container-${tab}-${subCategoryIndex}`).append(aspectRowHtml(aIndex, tab, subCategoryIndex, item['name'], item['range'])) : '';
      });

      if (subCategoryData[tab].length == 0) {
        $(`#save-eval-aspect-${tab}`).addClass('hidden');
      }
    }

    // remove sub category
    if (node.classList.contains('delete-sub-category-btn')) {
      const id = node.getAttribute('id').split('-');
      const categoryId = id[2];
      const subCategoryIndex = id[3];

      const subCategory = subCategoryData[categoryId][subCategoryIndex];
      const subCategoryName = subCategory.subCategoryName;
      const subCategoryId = subCategory.subCategoryId;

      // console.log(subCategoryId);

      $('#sub-category-delete').html(subCategoryName);
      $('#confirm-delete').attr('data-id', `${categoryId}-${subCategoryIndex}-${subCategoryId}`);
      $('#confirm-delete').removeClass('hidden');
      delete_modal.showModal();
    }
  });

  $(document).change(function (e) {
    const node = e.target;

    if (node.classList.contains('aspect-select')) {
      const selectId = node.getAttribute('id').split('-');
      const selectVal = node.value;

      const aIndex = selectId[2];
      const subCategoryIndex = selectId[3];

      subCategoryData[tab][subCategoryIndex].aspects[aIndex]['range'] = selectVal;

      $(`#aspect-container-${tab}-${subCategoryIndex}`).html('');

      subCategoryData[tab][subCategoryIndex].aspects.forEach((item, aIndex) => {
        $(`#aspect-container-${tab}-${subCategoryIndex}`).append(aspectRowHtml(aIndex, tab, subCategoryIndex, item['name'], item['range']));
      });
    }
  });

  $(document).keyup(function (e) {
    const node = e.target;

    if (node.classList.contains('aspect-input')) {
      const id = node.getAttribute('id').split('-');
      const inputVal = node.value;

      const aIndex = id[2];
      const subCategoryIndex = id[3];

      subCategoryData[tab][subCategoryIndex].aspects[aIndex]['name'] = inputVal;
    }

    if (node.classList.contains('sub-category-input')) {
      const id = node.getAttribute('id').split('-');
      const inputVal = node.value;

      const subCategoryIndex = id[3];

      subCategoryData[tab][subCategoryIndex].subCategoryName = inputVal;
    }
  });

  $('.save-eval-aspect-btn').click(function () {
    const category_id = this.id.split('-')[3];
    const category_name = $(`#category-name-${category_id}`).val();

    if (isAnyFieldEmpty(category_id)) return;

    const formData = new FormData();

    formData.append('category-id', category_id);
    formData.append('category-name', category_name);
    formData.append('contest-id', $('#contest-id').val());
    formData.append('evaluation-aspect', JSON.stringify(subCategoryData[category_id]));

    $.ajax({
      url: '/contest/evaluation-aspect/put',
      method: 'POST',
      dataType: 'json',
      processData: false,
      contentType: false,
      cache: false,
      data: formData,
      success: function (response) {
        console.log(response);
        location.reload();
      },
    });
  });
});
