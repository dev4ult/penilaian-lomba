<!-- Header -->
<header class="pb-10 border-b-2 flex justify-between">
    <div class="prose">
        <h2 class="text-lg font-extrabold">Registrasi Peserta</h2>
        <p>Registrasi Peserta menampung peserta sebelum didaftarkan pada lomba lomba yang nantinya akan dilakukan oleh
            peserta.</p>
    </div>

    <!-- Breadcrumbs -->
    <div class="text-sm breadcrumbs self-end">
        <ul>
            <li><a href="/" class="text-primary">Dashboard</a></li>
            <li><a href="/contestants" class="text-primary">Peserta</a></li>
            <li><span class="badge badge-neutral rounded-full">Registrasi</span></li>
        </ul>
    </div>
</header>

<!-- Form -->
<form method="post" action="/contestant/add"
    class="p-8 bg-white my-10 border-2 rounded-lg grid grid-flow-row grid-cols-2 gap-6">

    <!-- Team Name -->
    <div class="flex flex-col gap-1 w-full">
        <label for="team" class="text-sm font-semibold">Nama Tim</label>
        <input type="text" id="team" name="team" class="input input-bordered" placeholder="Isikan Nama Tim" required>
    </div>

    <!-- Leader Name -->
    <div class="flex flex-col gap-1 w-full">
        <label for="leader" class="text-sm font-semibold">Nama Penanggung Jawab</label>
        <input type="text" id="leader" name="leader" class="input input-bordered"
            placeholder="Isikan Nama Penanggung Jawab" required>
    </div>

    <!-- School Name -->
    <div class="flex flex-col gap-1 w-full">
        <label for="school" class="text-sm font-semibold">Instansi / Sekolah</label>
        <input type="text" id="school" name="school" class="input input-bordered"
            placeholder="Isikan Nama Instasi / Sekolah" required>
    </div>

    <!-- Phone Number -->
    <div class="flex flex-col gap-1 w-full">
        <label for="phone-number" class="text-sm font-semibold">Nomor Telepon</label>
        <input type="number" id="phone-number" name="phone-number" class="input input-bordered"
            placeholder="Isikan Nomor Telepon" required>
    </div>

    <hr class="col-span-2" />

    <h2 class="badge badge-neutral self-center">Anggota 1</h2>

    <!-- Tooltip 1 -->
    <div class="text-right">
        <button id="add-member-btn" type="button" class="btn btn-sm btn-neutral capitalize btn-outline">tambah
            anggota</button>
    </div>

    <input type="number" id="total-member" name="total-member" class="hidden" value="1">

    <div class="col-span-2 grid grid-flow-row grid-cols-2 gap-6">
        <!-- Full Name -->
        <div class="flex flex-col gap-1 w-full">
            <label for="member-name-1" class="text-sm font-semibold">Nama Lengkap</label>
            <input type="text" id="member-name-1" name="member-name-1" class="input input-bordered"
                placeholder="Isikan Nama Lengkap" required>
        </div>

        <!-- NIP or NIS -->
        <div class="flex flex-col gap-1 w-full">
            <label for="nis-1" class="text-sm font-semibold">NIS</label>
            <input type="number" id="nis-1" name="nis-1" class="input input-bordered"
                placeholder="Isikan Nomor Induk Siswa" required>
        </div>
    </div>

    <div id="new-member-container" class="col-span-2">
        <p class="text-black/50 text-sm"><span class="text-black">Keterangan :</span> tidak perlu menambah anggota jika
            tim
            hanya terdiri dari satu individu / anggota</p>
    </div>

    <hr class="col-span-2" />

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary capitalize col-span-2">submit</button>

</form>

<script src="<?= base_url('./js/contestantForm.js') ?>"></script>