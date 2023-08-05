const rowContestant = (index, contest_id, contestant_id, team_name, school) => {
  return `<tr>
            <th>${index}</th>
            <td id="team-name-data-${contestant_id}">${team_name}</td>
            <td>${school}</td>
            <td><span class="badge badge-success">80/100</span></td>
            <td class="flex gap-1.5 items-center">
                <button class="btn btn-sm btn-neutral btn-outline capitalize"
                    onclick="detail_modal.showModal()">lihat</button> |
                <a href="/contest/contestant-evaluation/${contest_id}/${contestant_id}" class="btn btn-sm btn-warning capitalize">ubah
                    penilaian</a>
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
      className: `alert ${status == 200 ? 'alert-success' : 'alert-error'} fixed top-5 right-5 w-fit transition-all`,
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
          const { data } = response;

          $('#reg-contestants-container').html('');

          data.forEach((item, index) => $('#reg-contestants-container').append(rowContestant(index + 1, item['contest_id'], item['contestant_id'], item['team_name'], item['school'])));

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

  $('#refresh').click(function () {
    refresh();
  });
});
