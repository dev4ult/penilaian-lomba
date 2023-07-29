$(document).ready(function () {
  $('#leader').keyup(function () {
    $('#member-1').val(this.value);
  });

  $('#member-1').keyup(function () {
    $('#leader').val(this.value);
  });

  function htmlVal(id) {
    return `<div id="member-group-${id}" class="col-span-2 grid grid-flow-row grid-cols-2 gap-6">
                <hr class="col-span-2" />
                <h2 class="badge badge-neutral">Anggota ${id}</h2>
      
                <div class="text-right">
                    <button id="remove-${id}" type="button" class="remove-member-btn btn btn-sm btn-error capitalize btn-outline">hapus anggota</button>
                </div>
      
                <div class="flex flex-col gap-1 w-full">
                    <label for="member-${id}" class="text-sm font-semibold">Nama Lengkap</label>
                    <input type="text" id="member-${id}" name="member-${id}" class="input input-bordered"
                        placeholder="Isikan Nama Lengkap" required>
                </div>
      
                <div class="flex flex-col gap-1 w-full">
                    <label for="nis-${id}" class="text-sm font-semibold">NIS</label>
                    <input type="number" id="nis-${id}" name="nis-${id}" class="input input-bordered"
                        placeholder="Isikan Nomor Induk Siswa" required>
                </div>
            </div>
    `;
  }

  let totalMember = 0;

  $('#add-member-btn').click(function () {
    totalMember++;

    let vals = '';
    for (let i = 0; i < totalMember; i++) {
      vals += htmlVal(i + 2);
    }

    $('#new-member-container').html(vals);
  });

  $(document).click(function (e) {
    const node = e.target;
    if (node.classList.contains('remove-member-btn')) {
      const id = node.getAttribute('id');
      const member_id = id.split('-')[1];

      $(`#member-group-${member_id}`).remove();

      totalMember--;
    }
  });
});
