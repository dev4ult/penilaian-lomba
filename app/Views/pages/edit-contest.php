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
            <li><a href="/contest/1" class="text-primary">Adzan Senior</a></li>
            <li><span class="badge badge-neutral rounded-full">Edit Informasi</span></li>
        </ul>
    </div>
</header>

<form method="post" class="p-8 bg-white my-10 border-2 rounded-lg grid grid-flow-row grid-cols-2 gap-6">
    <div class="flex flex-col gap-1 w-full col-span-2">
        <label for="picture" class="text-sm font-semibold">Gambar</label>
        <div id="upload-container" class="w-full border-2 border-dashed border-primary rounded p-10 flex gap-6 items-center justify-center">
            <div id="upload-text" class="flex flex-col justify-center items-end gap-3">
                <input type="file" id="picture" name="picture" class="hidden" required>
                <p class="font-semibold">Drag dan drop file disini</p>
                <span>atau</span>
                <label id="browse-file" for="picture" class="btn btn-primary btn-sm btn-outline capitalize">Cari
                    File</label>
            </div>
            <div id="preview-file">
                <img src="<?= base_url('./images/default-card/1.png') ?>" class="w-52 h-40 bg-cover" alt="preview">
            </div>
        </div>
    </div>

    <!-- Contest Name -->
    <div class="flex flex-col gap-1 w-full">
        <label for="contest-name" class="text-sm font-semibold">Nama Lomba</label>
        <input type="text" id="contest-name" name="contest-name" class="input input-bordered" placeholder="Isikan Nama Lomba" value="Adzan Senior" required>
    </div>

    <!-- Organizer -->
    <div class="flex flex-col gap-1 w-full">
        <label for="organizer" class="text-sm font-semibold">Penyelenggara</label>
        <input type="text" id="organizer" name="organizer" class="input input-bordered" placeholder="Isikan Nama Penyelenggara" value="Ahmad Reza Maulana" required>
    </div>

    <!-- Description -->
    <div class="flex flex-col gap-1 w-full col-span-2">
        <label for="description" class="text-sm font-semibold">Deskripsi Lomba</label>
        <textarea type="text" id="description" name="description" class="textarea textarea-bordered text-base h-52 py-3" placeholder="Isikan Deskripsi Lomba" value="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae enim sed quaerat pariatur quo laudantium dolorem! Libero sit nihil suscipit dignissimos laborum saepe officia nesciunt quo repella" required></textarea>
    </div>

    <!-- Date -->
    <div class="flex flex-col gap-1 w-full">
        <label for="date" class="text-sm font-semibold">Tanggal Pelaksanaan</label>
        <input type="date" id="date" name="date" class="input input-bordered" value="2023-01-12" required>
    </div>



    <!-- Time -->
    <div class="flex flex-col gap-1 w-full">
        <label for="time" class="text-sm font-semibold">Waktu Pelaksanaan</label>
        <div class="join">
            <input type="time" id="time" name="time" class="input input-bordered join-item w-full" value="13:00" required>
            <input type="time" id="time" name="time" class="input input-bordered join-item w-full" value="14:00" required>
        </div>
    </div>

    <!-- Place -->
    <div class="flex flex-col gap-1 w-full">
        <label for="place" class="text-sm font-semibold">Tempat Lomba</label>
        <input type="text" id="place" name="place" class="input input-bordered" placeholder="Isikan Nama Tempat Lomba" value="Aula 303" required>
    </div>

    <hr class="col-span-2" />

    <!-- Judges -->

    <h2 class="badge badge-neutral self-center">Juri</h2>

    <div class="flex flex-col gap-1 w-full col-span-2">
        <div class="join w-full">
            <select name="judge" id="judge" class="select select-bordered join-item w-full">
                <option disabled selected>Pilih Juri</option>
                <option value="Nibras Alyassar">Nibras Alyassar</option>
            </select>
            <button type="button" id="select-judge" class="btn btn-primary btn-outline capitalize">Tambah</button>
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
                <tr id="tr-judge-1">
                    <th>1</th>
                    <td>Nibras Alyassar</td>
                    <td>2100000000</td>
                    <td>080000000000</td>
                    <td>
                        <button id="remove-1" type="button" class="remove-judge-btn btn btn-sm btn-outline btn-error capitalize">hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <hr class="col-span-2" />

    <h2 class="badge badge-neutral self-center">Aspek Penilaian</h2>

    <div class="flex flex-col gap-1 w-full col-span-2">
        <div class="join w-full">
            <input type="text" id="aspect" name="aspect" class="input input-bordered join-item w-full" placeholder="Nama Aspek" required>
            <select name="aspect-range" id="aspect-range" class="select select-bordered join-item">
                <option disabled selected>Pilih Range Nilai</option>
                <option value="1-8">1-8</option>
                <option value="2-9">2-9</option>
                <option value="3-10">3-10</option>
                <option value="4-11">4-11</option>
            </select>
            <button type="button" id="add-aspect" class="btn btn-primary btn-outline capitalize">Tambah</button>
        </div>
    </div>

    <div class="overflow-x-auto col-span-2">
        <table class="table table-lg table-zebra border-2">
            <thead>
                <tr class="bg-black/20">
                    <th></th>
                    <th>Aspek</th>
                    <th>Range Nilai</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="aspect-table">
                <tr id="tr-aspect-1}">
                    <th>1</th>
                    <td>Panjang Nada</td>
                    <td>1-8</td>
                    <td>
                        <button id="remove-aspect-1" type="button" class="remove-aspect-btn btn btn-sm btn-outline btn-error capitalize">hapus</button>
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