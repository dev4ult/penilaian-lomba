$(document).ready(function () {
  $('.tab').click(function () {
    $('.tab').removeClass('tab-active');

    $(this).addClass('tab-active');
  });

  const aspectRow = (index, subCatIndex) => {
    return `<tr id="tr-aspect-${index}-${subCatIndex}" class="text-xl font-semibold text-center">
                <td class="border-2">${index}</td>
                <td class="border-2">
                    <input type="text" id="eval-aspect-1" class="input input-sm input-bordered"
                        placeholder="Nama Aspek">
                </td>
                <td class="border-2">
                    <select name="aspect-range-1" id="aspect-range-1"
                        class="select select-sm select-bordered join-item">
                        <option disabled selected>Range</option>
                        <option value="1">1 - 8</option>
                        <option value="2">2 - 9</option>
                        <option value="3">3 - 10</option>
                        <option value="4">4 - 11</option>
                    </select>
                </td>
                <td class="border-2">1</td>
                <td class="border-2">2</td>
                <td class="border-2">3</td>
                <td class="border-2">4</td>
                <td class="border-2">5</td>
                <td class="border-2">6</td>
                <td class="border-2">7</td>
                <td class="border-2">8</td>
                <td>
                    <button id="remove-${index}-${subCatIndex}" class="remove-aspect-btn btn btn-error btn-sm btn-outline capitalize">hapus</button>
                </td>
            </tr>`;
  };

  const subCategoryHtml = (categoryAlpha, index, aspects) => {
    console.log(categoryAlpha, index, aspects);
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
                        ${aspects.forEach((aspect, indexAspect) => aspectRow(indexAspect + 1, index))}
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
      aspects: [''],
    });

    $('#sub-category-container').html('');
    subCategoryData.forEach((data, index) => {
      $('#sub-category-container').append(subCategoryHtml(String.fromCharCode(data.charCode, index, data.aspects)));
    });

    charCode++;
  });

  $('.view-edit-btn').click(function () {
    const mode = this.getAttribute('aria-label');

    if (mode == 'edit') {
      $('#preview-mode').addClass('hidden');
      $('#edit-mode').removeClass('hidden');
    } else {
      $('#edit-mode').addClass('hidden');
      $('#preview-mode').removeClass('hidden');
    }
  });

  $(document).click(function (e) {
    const node = e.target;

    // add new aspect
    if (node.classList.contains('add-new-aspect')) {
      const index = node.getAttribute('id').split('-')[2];

      $(`#aspect-container-${index}`).html('');
      totalAspect[index]++;
      let prev = '';

      for (let i = 0; i < totalAspect[index]; i++) {
        prev = $(`#aspect-container-${index}`).html();
        $(`#aspect-container-${index}`).html(prev + aspectRow(i + 1, index));
      }
    }

    if (node.classList.contains('remove-aspect-btn')) {
      const btnId = node.getAttribute('id').split('-');

      const index = btnId[1];
      const subCatIndex = btnId[2];

      $(`#tr-aspect-${index}-${subCatIndex}`).remove();

      totalAspect[subCatIndex]--;
    }
  });
});

// <td colspan="2">
//                                 <input type="radio" class="btn btn-sm px-5" name="options" value="1" aria-label="1" />
//                                 <input type="radio" class="btn btn-sm px-5" name="options" value="2" aria-label="2" />
//                             </td>
//                             <td colspan="2">
//                                 <input type="radio" class="btn btn-sm px-5" name="options" value="3" aria-label="3" />
//                                 <input type="radio" class="btn btn-sm px-5" name="options" value="4" aria-label="4" />
//                             </td>
//                             <td colspan="2">
//                                 <input type="radio" class="btn btn-sm px-5" name="options" value="5" aria-label="5" />
//                                 <input type="radio" class="btn btn-sm px-5" name="options" value="6" aria-label="6" />
//                             </td>
//                             <td colspan="2">
//                                 <input type="radio" class="btn btn-sm px-5" name="options" value="7" aria-label="7" />
//                                 <input type="radio" class="btn btn-sm px-5" name="options" value="8" aria-label="8" />
//                             </td>
