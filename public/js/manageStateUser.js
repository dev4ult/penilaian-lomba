$(document).ready(function () {
  $('.edit-user-btn').click(function () {
    const user_id = this.id.split('-')[1];

    edit_modal.showModal();

    $.ajax({
      url: `/user/${user_id}`,
      method: 'GET',
      dataType: 'json',
      success: function (user) {
        $('#form-edit-user').attr('action', `/user/${user_id}`);

        const { username, full_name, phone_number, role, staff_id } = user;

        $('#username-edit').val(username);
        $('#full-name-edit').val(full_name);
        $('#phone-number-edit').val(phone_number);
        $('#role-edit').val(role);
        $('#nip-nis-edit').val(staff_id);

        $('#load-bars').addClass('hidden');
        $('#edit-container').removeClass('hidden');
        $('#edit-container').addClass('grid');
      },
      error: function (message) {
        edit_modal.close();
      },
    });
  });

  $('#close-edit-modal').click(function () {
    edit_modal.close();

    $('#edit-container').addClass('hidden');
    $('#edit-container').removeClass('grid');
    $('#load-bars').removeClass('hidden');
  });

  $('.delete-user-btn').click(function () {
    const user_id = this.id.split('-')[2];

    delete_modal.showModal();

    $.ajax({
      url: `/user/${user_id}`,
      method: 'GET',
      dataType: 'json',
      success: function (user) {
        $('#form-confirm-delete').attr('action', `/user/delete/${user_id}`);

        const { username } = user;

        $('#username-delete').html(username);
        $('#username-delete').removeClass('hidden');

        $('#load-dots').addClass('hidden');
        $('#confirm-delete').removeClass('hidden');
      },
      error: function (message) {
        delete_modal.close();
      },
    });
  });

  $('#confirm-no-delete').click(function () {
    delete_modal.close();

    $('#confirm-delete').addClass('hidden');
    $('#username-delete').addClass('hidden');
    $('#load-dots').removeClass('hidden');
  });
});
