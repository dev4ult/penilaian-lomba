$(document).ready(function () {
  $('#leader').keyup(function () {
    $('#member-name-1').val(this.value);
  });

  $('#member-name-1').keyup(function () {
    $('#leader').val(this.value);
  });

  function htmlVal(memberVal, nisVal, id) {
    return `<div id="member-group-${id}" class="col-span-2 grid grid-flow-row grid-cols-2 gap-6">
                <hr class="col-span-2" />
                <h2 class="badge badge-neutral">Anggota ${id}</h2>
      
                <div class="text-right">
                    <button id="remove-${id}" type="button" class="remove-member-btn btn btn-sm btn-error capitalize btn-outline">hapus anggota</button>
                </div>
      
                <div class="flex flex-col gap-1 w-full">
                    <label for="member-name-${id}" class="text-sm font-semibold">Nama Lengkap</label>
                    <input type="text" id="member-name-${id}" name="member-name-${id}" class="input-member-name input input-bordered"
                        placeholder="Isikan Nama Lengkap" value="${memberVal}" required>
                </div>
      
                <div class="flex flex-col gap-1 w-full">
                    <label for="nis-${id}" class="text-sm font-semibold">NIS</label>
                    <input type="number" id="nis-${id}" name="nis-${id}" class="input-member-nis input input-bordered"
                        placeholder="Isikan Nomor Induk Siswa" value="${nisVal}" required>
                </div>
            </div>
    `;
  }

  let memberData = [];

  $('#add-member-btn').click(function () {
    memberData.push({ 'member-name': '', nis: '' });

    $('#new-member-container').html('');
    memberData.forEach((member, index) => $('#new-member-container').append(htmlVal(member['member-name'], member['nis'], index + 2)));

    $('#total-member').val(memberData.length + 1);
  });

  $(document).click(function (e) {
    const node = e.target;
    if (node.classList.contains('remove-member-btn')) {
      const id = node.getAttribute('id');
      const member_id = id.split('-')[1];

      // console.log(member_id);
      memberData.splice(member_id - 2, 1);

      $('#new-member-container').html('');
      memberData.forEach((member, index) => $('#new-member-container').append(htmlVal(member['member-name'], member['nis'], index + 2)));

      $('#total-member').val(memberData.length + 1);
    }
  });

  $(document).keyup(function (e) {
    const node = e.target;
    const id = node.getAttribute('id');

    if (node.classList.contains('input-member-name')) {
      const member_id = id.split('-')[2];

      memberData[member_id - 2]['member-name'] = node.value;
    }

    if (node.classList.contains('input-member-nis')) {
      const member_id = id.split('-')[1];

      memberData[member_id - 2]['nis'] = node.value;
    }
  });
});
