<!-- Header -->
<header class="pb-10 border-b-2 flex justify-between">
    <div class="prose">
        <h2 class="text-lg font-extrabold">Edit Peserta</h2>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae praesentium ea provident placeat, cum
            ullam.</p>
    </div>

    <!-- Breadcrumbs -->
    <div class="text-sm breadcrumbs self-end">
        <ul>
            <li><a href="/" class="text-primary">Dashboard</a></li>
            <li><a href="/contestants" class="text-primary">Peserta</a></li>
            <li><span class="badge badge-neutral rounded-full">Edit</span></li>
        </ul>
    </div>
</header>

<!-- Form -->
<form method="post" class="p-8 bg-white my-10 border-2 rounded-lg grid grid-flow-row grid-cols-2 gap-6">

    <!-- Team Name -->
    <div class="flex flex-col gap-1 w-full">
        <label for="team" class="text-sm font-semibold">Nama Tim</label>
        <input type="text" id="team" name="team" class="input input-bordered" placeholder="Isikan Nama Tim" value="Cabe Rawit" required>
    </div>

    <!-- Leader Name -->
    <div class="flex flex-col gap-1 w-full">
        <label for="leader" class="text-sm font-semibold">Nama Lengkap Ketua</label>
        <input type="text" id="leader" name="leader" class="input input-bordered" placeholder="Isikan Nama Lengkap Ketua" value="Siddiq Maulana" required>
    </div>

    <!-- School Name -->
    <div class="flex flex-col gap-1 w-full">
        <label for="school" class="text-sm font-semibold">Instansi / Sekolah</label>
        <input type="text" id="school" name="school" class="input input-bordered" placeholder="Isikan Nama Instasi / Sekolah" value="SMAN 34" required>
    </div>

    <!-- Phone Number -->
    <div class="flex flex-col gap-1 w-full">
        <label for="phone" class="text-sm font-semibold">Nomor Telepon</label>
        <input type="number" id="phone" name="phone" class="input input-bordered" placeholder="Isikan Nomor Telepon" value="080000000000" required>
    </div>

    <hr class="col-span-2" />

    <h2 class="badge badge-neutral self-center">Anggota 1</h2>

    <!-- Tooltip 1 -->
    <div class="text-right">
        <button id="add-member-btn" type="button" class="btn btn-sm btn-neutral capitalize btn-outline">tambah
            anggota</button>
    </div>

    <div class="col-span-2 grid grid-flow-row grid-cols-2 gap-6">
        <!-- Full Name -->
        <div class="flex flex-col gap-1 w-full">
            <label for="member-1" class="text-sm font-semibold">Nama Lengkap</label>
            <input type="text" id="member-1" name="member-1" class="input input-bordered" placeholder="Isikan Nama Lengkap" value="Siddiq Maulana" required>
        </div>

        <!-- NIP or NIS -->
        <div class="flex flex-col gap-1 w-full">
            <label for="nis-1" class="text-sm font-semibold">NIS</label>
            <input type="number" id="nis-1" name="nis-1" class="input input-bordered" placeholder="Isikan Nomor Induk Siswa" value="2100000000" required>
        </div>
    </div>

    <div id="new-member-container" class="col-span-2">
        <p class="text-black/50 text-sm"><span class="text-black">Keterangan :</span> tidak perlu menambah anggota jika
            tim
            hanya terdiri dari satu individu / anggota</p>
    </div>

    <hr class="col-span-2" />

    <!-- <div id="add-member-container" class="h-0"></div> -->

    <!-- Submit Button -->
    <button type="submit" class="btn btn-warning capitalize col-span-2">simpan perubahan</button>

</form>

<script src="<?= base_url('./js/contestantForm.js') ?>"></script>