<!-- Header -->
<header class="pb-10 border-b-2 flex justify-between">
    <div class="prose">
        <h1 class="text-2xl font-extrabold">Edit Informasi / Penugasan Lomba</h1>
        <p>Pengelolaan data user untuk aksesibilitas ke aplikasi dan pengaturan peranan atau tugas terhadap user</p>
    </div>

    <!-- Breadcrumbs -->
    <div class="text-sm breadcrumbs flex-shrink-0 self-end">
        <ul>
            <li><a href="/" class="text-primary">Dashboard</a></li>
            <li><a href="/contests" class="text-primary">Lomba</a></li>
            <li><a href="/contest/<?= $contest['contest_id'] ?>" class="text-primary"><?= $contest['contest_name'] ?></a></li>
            <li><span class="badge badge-neutral rounded-full">Edit Informasi</span></li>
        </ul>
    </div>
</header>

<form method="post" action="/contest/put" class="p-8 bg-white my-10 border-2 rounded-lg grid grid-flow-row grid-cols-2 gap-6" enctype="multipart/form-data">
    <input type="number" id="contest-id" name="contest-id" class="hidden" value="<?= $contest['contest_id'] ?>" />

    <div class="flex flex-col gap-1 w-full col-span-2">
        <label for="picture" class="text-sm font-semibold">Gambar</label>
        <div id="upload-container" class="w-full border-2 border-dashed border-primary rounded p-10 flex gap-6 items-center justify-center">
            <div id="upload-text" class="flex flex-col justify-center items-center gap-3">
                <input type="file" id="picture" name="picture" class="hidden" />
                <p class="font-semibold">Drag dan drop file disini</p>
                <span>atau</span>
                <label id="browse-file" for="picture" class="btn btn-primary btn-sm btn-outline capitalize">Cari
                    File</label>
            </div>
            <div id="preview-file">

            </div>
        </div>
    </div>

    <!-- Contest Name -->
    <div class="flex flex-col gap-1 w-full">
        <label for="contest-name" class="text-sm font-semibold">Nama Lomba</label>
        <input type="text" id="contest-name" name="contest-name" class="input input-bordered" placeholder="Isikan Nama Lomba" value="<?= $contest['contest_name'] ?>" required>
    </div>

    <!-- Organizer -->
    <div class="flex flex-col gap-1 w-full">
        <label for="organizer" class="text-sm font-semibold">Penyelenggara</label>
        <input type="text" id="organizer" name="organizer" class="input input-bordered" placeholder="Isikan Nama Penyelenggara" value="<?= $contest['organizer'] ?>" required>
    </div>

    <!-- Description -->
    <div class="flex flex-col gap-1 w-full col-span-2">
        <label for="description" class="text-sm font-semibold">Deskripsi Lomba</label>
        <textarea type="text" id="description" name="description" class="textarea textarea-bordered text-base h-52 py-3" placeholder="Isikan Deskripsi Lomba" required><?= $contest['description'] ?></textarea>
    </div>

    <!-- Date -->
    <div class="flex flex-col gap-1 w-full">
        <label for="date" class="text-sm font-semibold">Tanggal Pelaksanaan</label>
        <input type="date" id="date" name="date" class="input input-bordered" value="<?= $contest['date'] ?>" required>
    </div>

    <!-- Time -->
    <div class="flex flex-col gap-1 w-full">
        <label for="time-start" class="text-sm font-semibold">Waktu Pelaksanaan</label>
        <div class="join">
            <input type="time" id="time-start" name="time-start" class="input input-bordered join-item w-full" value="<?= $contest['time_start'] ?>" required />
            <input type="time" id="time-end" name="time-end" class="input input-bordered join-item w-full" value="<?= $contest['time_end'] ?>" required />
        </div>
    </div>

    <!-- Held On -->
    <div class="flex flex-col gap-1 w-full">
        <label for="held-on" class="text-sm font-semibold">Tempat Lomba</label>
        <input type="text" id="held-on" name="held-on" class="input input-bordered" placeholder="Isikan Nama Tempat Lomba" value="<?= $contest['held_on'] ?>" required>
    </div>

    <!-- Category -->
    <div class="flex flex-col gap-1 w-full">
        <label for="category" class="text-sm font-semibold">Kategori / Tingkatan Lomba</label>
        <select id="category" name="category" class="select select-bordered" required>
            <option disabled>Pilih Tingkatan Lomba</option>
            <option value="sd" <?= $contest['category'] == "sd" ? "selected" : "" ?>>SD</option>
            <option value="smp" <?= $contest['category'] == "smp" ? "selected" : "" ?>>SMP</option>
            <option value="sma/smk" <?= $contest['category'] == "sma/smk" ? "selected" : "" ?>>SMA/SMK</option>
        </select>
    </div>

    <hr class="col-span-2" />

    <!-- Judges -->

    <h2 class="badge badge-neutral self-center">Juri</h2>

    <div class="flex flex-col gap-1 w-full col-span-2">
        <input type="number" id="total-judges" name="total-judges" class="hidden" value="0" />
        <div class="join w-full">
            <select name="judge" id="judge" class="select select-bordered join-item w-full">
                <option id="option-select" value="" selected>Pilih Juri</option>
                <?php foreach ($judges as $judge) : ?>
                    <option value="<?= $judge['user_id'] ?>" id="option-<?= $judge['user_id'] ?>"><?= $judge['full_name'] ?>
                    </option>
                <?php endforeach ?>
            </select>
            <?php foreach ($judges as $judge) : ?>
                <input type="text" id="judge-full-name-<?= $judge['user_id'] ?>" name="judge-full-name-<?= $judge['user_id'] ?>" class="hidden" value="<?= $judge['full_name'] ?>" />
                <input type="number" id="judge-nis-nip-<?= $judge['user_id'] ?>" name="judge-nis-nip-<?= $judge['user_id'] ?>" class="hidden" value="<?= $judge['staff_id'] ?>" />
                <input type="text" id="judge-phone-number-<?= $judge['user_id'] ?>" name="judge-phone-number-<?= $judge['user_id'] ?>" class="hidden" value="<?= $judge['phone_number'] ?>" />
            <?php endforeach ?>
            <button type="button" id="add-judge" class="btn btn-primary btn-outline capitalize">Tambah</button>
        </div>
    </div>

    <div class="overflow-x-auto col-span-2">
        <table class="table table-lg table-zebra border-2">
            <thead>
                <tr class="bg-black/20">
                    <th></th>
                    <th>Nama Lengkap</th>
                    <th>Nomor Induk Pegawai / Siswa</th>
                    <th>Nomor Telepon</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="judge-table">
                <tr>
                    <td colspan="5">
                        <h3 class="text-center text-black/50">-- Belum ada Juri yang ditambahkan --</h3>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="col-span-2" />

    <h2 class="badge badge-neutral self-center">Kategori Penilaian</h2>

    <div class="flex flex-col gap-1 w-full col-span-2">
        <input type="number" id="total-eval-category" name="total-eval-category" class="hidden" value="0" />
        <div class="join w-full">
            <input type="text" id="category-eval" name="category-eval" class="input input-bordered join-item w-full" placeholder="Nama Kategori" />
            <button type="button" id="add-category" class="btn btn-primary btn-outline capitalize">Tambah</button>
        </div>
    </div>

    <div class="overflow-x-auto col-span-2">
        <table class="table table-lg table-zebra border-2">
            <thead>
                <tr class="bg-black/20">
                    <th></th>
                    <th>Kategori</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="category-table">
                <tr>
                    <td colspan="3">
                        <h3 class="text-center text-black/50">-- Belum ada Kategori Penilaian yang ditambahkan --</h3>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="col-span-2" />

    <!-- Submit Button -->
    <button type="submit" class="btn btn-warning capitalize col-span-2">simpan perubahan</button>
</form>

<script src="<?= base_url("./js/contestForm.js") ?>"></script>
<script src="<?= base_url("./js/uploadFile.js") ?>"></script>


<!-- setup uploaded picture -->
<script>
    <?php if ($contest['picture']) : ?>
        const imageEl =
            `<img src="data:image/jpg;base64,<?= base64_encode($contest['picture']) ?>" class="w-52 h-40 bg-cover" alt="preview"/>`;

        $('#upload-text').removeClass('items-center');
        $('#upload-text').addClass('items-end');

        $('#preview-file').html(imageEl);
    <?php endif ?>
</script>

<!-- setup judges data and categories -->
<script>
    <?php if (count($categories) > 0) : ?>
        <?php foreach ($categories as $category) : ?>
            categoryData.push('<?= $category['category_name'] ?>');
        <?php endforeach ?>

        $('#category-table').html('');
        categoryData.forEach((category, index) => $('#category-table').append(tableRowCategoryEval(index + 1, category)));

        $('#total-eval-category').val(categoryData.length);
    <?php endif ?>

    <?php if (count($judges_contest) > 0) : ?>
        <?php foreach ($judges_contest as $judge) : ?>
            judgeData.push({
                'user-id': '<?= $judge['user_id'] ?>',
                'full-name': '<?= $judge['full_name'] ?>',
                'nis-nip': '<?= $judge['staff_id'] ?>',
                'phone-number': '<?= $judge['phone_number'] ?>'
            });

            $(`#option-${<?= $judge['user_id'] ?>}`).remove();
        <?php endforeach ?>

        $('#judge-table').html('');
        judgeData.forEach((judge, index) => $('#judge-table').append(tableRowJudge(index + 1, judge['user-id'], judge[
            'full-name'], judge['nis-nip'], judge['phone-number'])));

        $('#total-judges').val(judgeData.length);
    <?php endif ?>
</script>

<!-- toastify -->
<script>
    <?php if (session()->getFlashdata('error')) : ?>
        Toastify({
            text: `<?= session()->getFlashdata('error') ?>`,
            close: true,
            duration: 3000,
            position: 'left',
            className: 'alert alert-error fixed top-5 right-5 w-fit transition-all',
        }).showToast();
    <?php endif ?>
    <?php if (session()->getFlashdata('success')) : ?>
        Toastify({
            text: `<?= session()->getFlashdata('success') ?>`,
            close: true,
            duration: 3000,
            position: 'left',
            className: 'alert alert-success fixed top-5 right-5 w-fit transition-all',
        }).showToast();
    <?php endif ?>
</script>