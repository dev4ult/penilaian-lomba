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

<form method="post" class="p-8 bg-white my-10 border-2 rounded-lg grid grid-flow-row grid-cols-2 gap-6">
    <div class="flex flex-col gap-1 w-full col-span-2">
        <label for="picture" class="text-sm font-semibold">Gambar</label>
        <div id="upload-container"
            class="w-full border-2 border-dashed border-primary rounded p-10 flex gap-6 items-center justify-center">
            <div id="upload-text" class="flex flex-col justify-center items-center gap-3">
                <input type="file" id="picture" name="picture" class="hidden" required>
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
            placeholder="Isikan Nama Lomba" required>
    </div>

    <!-- Organizer -->
    <div class="flex flex-col gap-1 w-full">
        <label for="organizer" class="text-sm font-semibold">Penyelenggara</label>
        <input type="text" id="organizer" name="organizer" class="input input-bordered"
            placeholder="Isikan Nama Penyelenggara" required>
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
        <input type="date" id="date" name="date" class="input input-bordered" required>
    </div>

    <!-- Time -->
    <div class="flex flex-col gap-1 w-full">
        <label for="time" class="text-sm font-semibold">Waktu Pelaksanaan</label>
        <div class="join">
            <input type="time" id="time" name="time" class="input input-bordered join-item w-full" value="10:00"
                required>
            <input type="time" id="time" name="time" class="input input-bordered join-item w-full" value="11:00"
                required>
        </div>
    </div>

    <!-- Place -->
    <div class="flex flex-col gap-1 w-full">
        <label for="place" class="text-sm font-semibold">Tempat Lomba</label>
        <input type="text" id="place" name="place" class="input input-bordered" placeholder="Isikan Nama Tempat Lomba"
            required>
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
        <div class="join w-full">
            <input type="text" id="category-eval" name="category-eval" class="input input-bordered join-item w-full"
                placeholder="Nama Kategori" required>
            <!-- <select name="aspect-range" id="aspect-range" class="select select-bordered join-item">
                <option disabled selected>Pilih Range Nilai</option>
                <option value="1-8">1-8</option>
                <option value="2-9">2-9</option>
                <option value="3-10">3-10</option>
                <option value="4-11">4-11</option>
            </select> -->
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