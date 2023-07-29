$('#leader').keyup(function () {
  $('#member-1').val(this.value);
});

$('#member-1').keyup(function () {
  $('#leader').val(this.value);
});

function htmlVal(id) {
  return `<hr class="col-span-2" />
          <h2 class="badge badge-neutral">Anggota ${id}</h2>

          <div class="text-right">
              <div class="tooltip" data-tip="Jika anggota tim terdiri lebih dari satu orang">
                  <button id="${id}" type="button" class="remove-member-btn btn btn-sm btn-error capitalize btn-outline">Hapus anggota</button>
              </div>
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
          </div>`;
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

$('document').click(function () {
  console.log('test');
});
