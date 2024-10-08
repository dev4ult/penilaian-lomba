$(document).ready(function () {
  $('.edit-user-btn').click(function () {
    const user_id = this.id.split('-')[1];

    $('#edit-container').addClass('hidden');
    $('#edit-container').removeClass('grid');
    $('#load-bars').removeClass('hidden');

    edit_modal.showModal();

    $.ajax({
      url: `/user/${user_id}`,
      method: 'GET',
      dataType: 'json',
      success: function (user) {
        const { user_id, username, full_name, phone_number, role, staff_id } = user;

        $('#user-id').val(user_id);

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

  $('.delete-user-btn').click(function () {
    const user_id = this.id.split('-')[2];

    $('#confirm-delete').addClass('hidden');
    $('#username-delete').addClass('hidden');
    $('#load-dots').removeClass('hidden');

    delete_modal.showModal();

    $.ajax({
      url: `/user/${user_id}`,
      method: 'GET',
      dataType: 'json',
      success: function (user) {
        $('#confirm-delete').attr('href', `/user/delete/${user_id}`);

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
});
