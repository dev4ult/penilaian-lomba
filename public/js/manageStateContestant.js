$(document).ready(function () {
  const rowMember = (index, name, number_id) => {
    return `<tr>
                <th>${index}</th>
                <td>${name}</td>
                <td>${number_id}</td>
            </tr>`;
  };

  $('.detail-contestant-btn').click(function () {
    const contestant_id = this.id.split('-')[1];

    $('#detail-contestant').addClass('hidden');
    $('#detail-contestant').removeClass('grid');
    $('#load-bars').removeClass('hidden');

    detail_modal.showModal();

    $.ajax({
      url: `/contestant/${contestant_id}`,
      method: 'GET',
      dataType: 'json',
      success: function (contestant) {
        const { team, leader, school, phone_number, member } = contestant;

        $('#team-name').html(team);
        $('#leader').html(leader);
        $('#school').html(school);
        $('#phone-number').html(phone_number);

        $('#member-container').html('');
        member.forEach((item, index) => $('#member-container').append(rowMember(index + 1, item.full_name, item.student_id)));

        $('#load-bars').addClass('hidden');
        $('#detail-contestant').removeClass('hidden');
        $('#detail-contestant').addClass('grid');
      },
      error: function (message) {
        detail_modal.close();
      },
    });
  });

  $('.delete-contestant-btn').click(function () {
    const contestant_id = this.id.split('-')[2];

    $('#team-delete').addClass('hidden');

    $('#load-dots').removeClass('hidden');
    $('#confirm-delete').addClass('hidden');

    delete_modal.showModal();

    $.ajax({
      url: `/contestant/${contestant_id}`,
      method: 'GET',
      dataType: 'json',
      success: function (contestant) {
        $('#confirm-delete').attr('href', `/contestant/delete/${contestant_id}`);

        const { team } = contestant;

        $('#team-delete').html(team);
        $('#team-delete').removeClass('hidden');

        $('#load-dots').addClass('hidden');
        $('#confirm-delete').removeClass('hidden');
      },
      error: function (message) {
        delete_modal.close();
      },
    });
  });
});
