<!-- Header -->
<header class="pb-10 border-b-2 flex justify-between">
    <div class="prose">
        <h1 class="text-2xl font-extrabold">Tambah / Publikasi Lomba</h1>
        <p>Pengelolaan data user untuk aksesibilitas ke aplikasi dan pengaturan peranan atau tugas terhadap user</p>
    </div>

    <!-- Breadcrumbs -->
    <div class="text-sm breadcrumbs self-end">
        <ul>
            <li><a href="/" class="text-primary">Dashboard</a></li>
            <li><a href="/contests" class="text-primary">Lomba</a></li>
            <li><span class="badge badge-neutral rounded-full">Tambah / Publikasi</span></li>
        </ul>
    </div>
</header>

<form method="post" action="/contest/add"
    class="p-8 bg-white my-10 border-2 rounded-lg grid grid-flow-row grid-cols-2 gap-6" enctype="multipart/form-data">
    <div class="flex flex-col gap-1 w-full col-span-2">
        <label for="picture" class="text-sm font-semibold">Gambar (Opsional)</label>
        <div id="upload-container"
            class="w-full border-2 border-dashed border-primary rounded p-10 flex gap-6 items-center justify-center">
            <div id="upload-text" class="flex flex-col justify-center items-center gap-3">
                <input type="file" id="picture" name="picture" class="hidden" />
                <p class="font-semibold">Drag dan drop file disini</p>
                <span>atau</span>
                <label id="browse-file" for="picture" class="btn btn-primary btn-sm btn-outline capitalize">Cari
                    File</label>
            </div>
            <div id="preview-file"></div>
        </div>
    </div>

    <!-- Contest Name -->
    <div class="flex flex-col gap-1 w-full">
        <label for="contest-name" class="text-sm font-semibold">Nama Lomba</label>
        <input type="text" id="contest-name" name="contest-name" class="input input-bordered"
            placeholder="Isikan Nama Lomba" required />
    </div>

    <!-- Organizer -->
    <div class="flex flex-col gap-1 w-full">
        <label for="organizer" class="text-sm font-semibold">Penyelenggara</label>
        <input type="text" id="organizer" name="organizer" class="input input-bordered"
            placeholder="Isikan Nama Penyelenggara" required />
    </div>

    <!-- Description -->
    <div class="flex flex-col gap-1 w-full col-span-2">
        <label for="description" class="text-sm font-semibold">Deskripsi Lomba</label>
        <textarea type="text" id="description" name="description" class="textarea textarea-bordered text-base h-52 py-3"
            placeholder="Isikan Deskripsi Lomba" required></textarea>
    </div>

    <!-- Date -->
    <div class="flex flex-col gap-1 w-full">
        <label for="date" class="text-sm font-semibold">Tanggal Pelaksanaan</label>
        <input type="date" id="date" name="date" class="input input-bordered" required />
    </div>

    <!-- Time -->
    <div class="flex flex-col gap-1 w-full">
        <label for="time-start" class="text-sm font-semibold">Waktu Pelaksanaan</label>
        <div class="join">
            <input type="time" id="time-start" name="time-start" class="input input-bordered join-item w-full"
                value="10:00" required />
            <input type="time" id="time-end" name="time-end" class="input input-bordered join-item w-full" value="11:00"
                required />
        </div>
    </div>

    <!-- Held On -->
    <div class="flex flex-col gap-1 w-full">
        <label for="held-on" class="text-sm font-semibold">Tempat Lomba</label>
        <input type="text" id="held-on" name="held-on" class="input input-bordered"
            placeholder="Isikan Nama Tempat Lomba" required />
    </div>

    <!-- Category -->
    <div class="flex flex-col gap-1 w-full">
        <label for="category" class="text-sm font-semibold">Kategori / Tingkatan Lomba</label>
        <select id="category" name="category" class="select select-bordered" required>
            <option disabled selected>Pilih Tingkatan Lomba</option>
            <option value="sd">SD</option>
            <option value="smp">SMP</option>
            <option value="sma/smk">SMA/SMK</option>
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
            <input type="text" id="judge-full-name-<?= $judge['user_id'] ?>"
                name="judge-full-name-<?= $judge['user_id'] ?>" class="hidden" value="<?= $judge['full_name'] ?>" />
            <input type="number" id="judge-nis-nip-<?= $judge['user_id'] ?>"
                name="judge-nis-nip-<?= $judge['user_id'] ?>" class="hidden" value="<?= $judge['staff_id'] ?>" />
            <input type="text" id="judge-phone-number-<?= $judge['user_id'] ?>"
                name="judge-phone-number-<?= $judge['user_id'] ?>" class="hidden"
                value="<?= $judge['phone_number'] ?>" />
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
            <input type="text" id="category-eval" name="category-eval" class="input input-bordered join-item w-full"
                placeholder="Nama Kategori" />
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
    <button type="submit" class="btn btn-primary capitalize col-span-2">submit</button>
</form>

<script src="<?= base_url("./js/contestForm.js") ?>"></script>
<script src="<?= base_url("./js/uploadFile.js") ?>"></script>

<script>
<?php if (session()->getFlashdata('error')) : ?>
Toastify({
    text: `<?= session()->getFlashdata('error') ?>`,
    duration: 3000,
    position: 'left',
    className: 'alert alert-error fixed top-5 right-5 w-fit transition-all',
}).showToast();
<?php endif ?>
<?php if (session()->getFlashdata('success')) : ?>
Toastify({
    text: `<?= session()->getFlashdata('success') ?>`,
    duration: 3000,
    position: 'left',
    className: 'alert alert-success fixed top-5 right-5 w-fit transition-all',
}).showToast();
<?php endif ?>
</script>