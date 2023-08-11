const rowContestant = (index, contest_id, total_eval, contestant_id, reg_contestant_id, team_name, school) => {
  return `<tr>
            <th>${index}</th>
            <td id="team-name-data-${contestant_id}">${team_name}</td>
            <td>${school}</td>
            <td><span class="badge badge-neutral badge-lg badge-outline">${total_eval}</span></td>
            <td class="flex gap-1.5 items-center">
                <button id="preview-${reg_contestant_id}" class="preview-contestant-btn btn btn-sm btn-neutral btn-outline capitalize">lihat</button> |
                <a href="/contest/contestant-evaluation/${contest_id}/${contestant_id}" class="btn btn-sm btn-primary capitalize">Beri Penilaian</a>
                <button type="button" id="contestant-rmv-${contestant_id}"
                    class="remove-reg-btn btn btn-sm btn-error btn-outline capitalize">hapus</button>
            </td>
        </tr>`;
};

$(document).ready(function () {
  $('#select-contestants').keyup(function () {
    if ($(`option[value='${this.value}']`).length > 0) {
      $('#add-contestant').removeClass('btn-disabled');
    } else {
      $('#add-contestant').addClass('btn-disabled');
    }
  });

  const contest_id = $('#contest-id').val();

  function notify(status, message) {
    Toastify({
      text: message,
      close: true,
      duration: 3000,
      position: 'left',
      className: `alert ${status == 200 ? 'alert-success' : 'alert-error'} fixed z-20 top-5 right-5 w-fit transition-all`,
    }).showToast();
  }

  function refresh() {
    $.ajax({
      url: `/contest/get-register-contestants/${contest_id}`,
      method: 'GET',
      dataType: 'json',
      success: function (response) {
        const { status } = response;

        if (status == 200) {
          const { data, contestant_eval } = response;

          $('#reg-contestants-container').html('');

          data.forEach((item, index) => {
            let total_eval = 0;
            contestant_eval.forEach((eval) => {
              if (eval['contest_id'] == item['contest_id'] && eval['contestant_id'] == item['contestant_id']) {
                total_eval += parseInt(eval['total_evaluation']);
              }
            });

            $('#reg-contestants-container').append(rowContestant(index + 1, item['contest_id'], total_eval, item['contestant_id'], item['reg_contestant_id'], item['team_name'], item['school']));
          });

          if (data.length == 0) {
            $('#reg-contestants-container').html(`<tr>
                                                    <td colspan="6">
                                                        <h3 class="text-center text-black/50">-- Belum ada Peserta yang mendaftar pada lomba ini --</>
                                                    </td>
                                                </tr>`);
          }

          $('#total-contestants-registered').html(data.length);
        } else {
          const { message } = response;
          notify(status, message);
        }
      },
    });
  }

  $('#add-contestant').click(function () {
    const value = $('#select-contestants').val();

    const formData = new FormData();
    formData.append('contest-id', contest_id);
    formData.append('team-name', value);

    $.ajax({
      url: '/contest/register-contestant',
      method: 'POST',
      dataType: 'json',
      processData: false,
      contentType: false,
      cache: false,
      data: formData,
      success: function (response) {
        const { status, message } = response;

        if (status == 200) {
          $('#select-contestants').val('');
          $(`option[value="${value}"]`).remove();
          refresh();
        }

        notify(status, message);
      },
    });
  });

  $(document).click(function (e) {
    const node = e.target;

    if (node.classList.contains('remove-reg-btn')) {
      const contestant_id = node.getAttribute('id').split('-')[2];
      const team_name = $(`#team-name-data-${contestant_id}`).html();

      $('#team-delete').html(team_name);
      $('#delete-contestant-id').val(contestant_id);

      delete_modal.showModal();
    }

    if (node.classList.contains('preview-contestant-btn')) {
      const id = node.getAttribute('id').split('-');
      const reg_contestant_id = id['1'];

      $('#judge-who-evaluated').addClass('hidden');
      $('#detail-evaluation').addClass('hidden');

      $('.loading-bars').removeClass('hidden');

      $('#detail-contestant').addClass('hidden');
      $('#detail-contestant').removeClass('grid');

      detail_modal.showModal();

      $.ajax({
        url: `/contest/get-preview-contestant/${reg_contestant_id}`,
        method: 'GET',
        dataType: 'json',
        success: function (response) {
          const { status } = response;

          if (status == 200) {
            const { contestant, members, eval_category, contest_category, evaluated_by_user } = response;
            const { team_name, leader, school, phone_number } = contestant;

            $('.loading-bars').addClass('hidden');

            $('#judge-who-evaluated').removeClass('hidden');
            $('#judge-who-evaluated').html('');

            if (evaluated_by_user.length == 0) {
              $('#judge-who-evaluated').html('<span class="text-error">Belum ada juri yang menilai</span>');
            }

            evaluated_by_user.forEach((user, index) => $('#judge-who-evaluated').append(`<span class="badge badge-accent rounded-full badge-lg">${user.full_name}</span>${index < evaluated_by_user.length - 1 ? ' | ' : ''}`));
            $('#detail-evaluation').removeClass('hidden');

            $('#detail-category-eval').html('');
            contest_category.forEach((category, index) => {
              let totalEval = 0;
              eval_category.forEach((eval) => (category.eval_category_id == eval.category_id ? (totalEval += parseInt(eval.total_evaluation)) : undefined));

              $('#detail-category-eval').append(`<tr>
                                                    <th>${index + 1}</th>
                                                    <td>${category.category_name}</td>
                                                    <td>${totalEval}</td>
                                                </tr>`);
            });

            $('#team-name').html(team_name);
            $('#leader').html(leader);
            $('#school').html(school);
            $('#phone-number').html(phone_number);

            $('#detail-contestant').removeClass('hidden');
            $('#detail-contestant').addClass('grid');

            $('#detail-member').html('');
            members.forEach((member, index) =>
              $('#detail-member').append(`<tr>
                                              <th>${index + 1}</th>
                                              <td>${member.full_name}</td>
                                              <td>${member.student_id}</td>
                                          </tr>`)
            );
          }
        },
        error: function (message) {
          detail_modal.close();
        },
      });
    }
  });

  $('#confirm-delete').click(function () {
    const contestant_id = $('#delete-contestant-id').val();
    if (contestant_id != '') {
      $.ajax({
        url: `/contest/remove-contestant/${contest_id}/${contestant_id}`,
        method: 'GET',
        dataType: 'json',
        success: function (response) {
          const { status, message } = response;
          const team_name = $('#team-delete').html();

          if (status == 200) {
            $('#contestants').append(`<option value="${team_name}" />`);
            refresh();
          }

          notify(status, message);

          delete_modal.close();
        },
        error: function (message) {
          delete_modal.close();
        },
      });
    }
  });
});
