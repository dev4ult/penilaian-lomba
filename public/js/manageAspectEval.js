$(document).ready(function () {
  $('.view-edit-btn').click(function () {
    const mode = this.getAttribute('aria-label');

    if (mode == 'edit') {
      $('#view-mode').addClass('hidden');
      $('#edit-mode').removeClass('hidden');
    } else {
      $('#edit-mode').addClass('hidden');
      $('#view-mode').removeClass('hidden');
    }
  });

  const aspectRowHtml = (index, subCatIndex, rangeVal) => {
    let range = '';
    for (let i = 0; i < 8; i++) {
      range += `<td class="border-2">${rangeVal ? i + parseInt(rangeVal) : ''}</td>`;
    }

    return `<tr id="tr-aspect-${index}-${subCatIndex}" class="text-xl font-semibold text-center">
                <td class="border-2">${index + 1}</td>
                <td class="border-2">
                    <input type="text" id="eval-aspect-1-${index}-${subCatIndex}" name="eval-aspect-${index}-${subCatIndex}" class="aspect-input input input-sm input-bordered"
                        placeholder="Nama Aspek">
                </td>
                <td class="border-2">
                    <select name="aspect-range-${index}-${subCatIndex}" id="aspect-range-${index}-${subCatIndex}" class="aspect-select select select-sm select-bordered join-item" >
                        <option disabled ${rangeVal ? 'selected="false"' : 'selected'}>Range</option>
                        <option value="1" ${rangeVal == '1' ? 'selected' : ''}>1 - 8</option>
                        <option value="2" ${rangeVal == '2' ? 'selected' : ''}>2 - 9</option>
                        <option value="3" ${rangeVal == '3' ? 'selected' : ''}>3 - 10</option>
                        <option value="4" ${rangeVal == '4' ? 'selected' : ''}>4 - 11</option>
                    </select>
                </td>
                ${range}
                <td>
                    <button id="remove-${index}-${subCatIndex}" class="remove-aspect-btn btn btn-error btn-sm btn-outline capitalize">hapus</button>
                </td>
            </tr>`;
  };

  const subCategoryHtml = (categoryAlpha, index) => {
    return `<div class="overflow-x-auto my-6">
                <table class="table table-lg bg-white border-2">
                    <thead>
                        <tr class="text-base text-center">
                            <th class="border-2">${categoryAlpha}</th>
                            <th class="text-left border-2">
                                <input type="text" id="sub-category-1" class="input font-medium text-black input-bordered"
                                    placeholder="Nama Sub Kategori">
                            </th>
                            <th></th>
                            <th colspan="2" class="border-2">Kurang</th>
                            <th colspan="2" class="border-2">Cukup</th>
                            <th colspan="2" class="border-2">Baik</th>
                            <th colspan="2" class="border-2">Sangat Baik</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="aspect-container-${index}">
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="border-2"></td>
                            <td colspan="11" class="border-2">
                                <button id="new-aspect-${index}" type="button" class="add-new-aspect btn btn-outline btn-sm btn-primary capitalize">tambah aspek penilaian</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>`;
  };

  let subCategoryData = [];

  let charCode = 65;
  $('#add-sub-category').click(function () {
    subCategoryData.push({
      charCode,
      aspects: [null],
    });

    $('#sub-category-container').html('');
    subCategoryData.forEach((data, index) => {
      $('#sub-category-container').append(subCategoryHtml(String.fromCharCode(data.charCode), index));

      data.aspects.forEach((rangeVal, aIndex) => {
        $(`#aspect-container-${index}`).append(aspectRowHtml(aIndex, index, rangeVal));
      });
    });

    charCode++;
  });

  $(document).click(function (e) {
    const node = e.target;

    // add new aspect
    if (node.classList.contains('add-new-aspect')) {
      const index = node.getAttribute('id').split('-')[2];

      subCategoryData[index].aspects.push(null);

      $(`#aspect-container-${index}`).html('');

      subCategoryData[index].aspects.forEach((rangeVal, aIndex) => {
        $(`#aspect-container-${index}`).append(aspectRowHtml(aIndex, index, rangeVal));
      });
    }

    if (node.classList.contains('remove-aspect-btn')) {
      const btnId = node.getAttribute('id').split('-');

      const aIndex = btnId[1];
      const index = btnId[2];

      subCategoryData[index].aspects.splice(aIndex, 1);

      $(`#aspect-container-${index}`).html('');

      subCategoryData[index].aspects.forEach((rangeVal, aIndex) => {
        $(`#aspect-container-${index}`).append(aspectRowHtml(aIndex, index, rangeVal));
      });
    }
  });

  $(document).change(function (e) {
    const node = e.target;

    if (node.classList.contains('aspect-select')) {
      const selectId = node.getAttribute('id').split('-');
      const selectVal = node.value;

      const aIndex = selectId[2];
      const index = selectId[3];

      subCategoryData[index].aspects[aIndex] = selectVal;

      $(`#aspect-container-${index}`).html('');

      subCategoryData[index].aspects.forEach((rangeVal, aIndex) => {
        $(`#aspect-container-${index}`).append(aspectRowHtml(aIndex, index, rangeVal));
      });
    }
  });
});
