<!-- Header -->
<header class="pb-10 border-b-2 flex justify-between">
    <div class="prose">
        <h1 class="text-2xl font-extrabold my-0">Manajemen Peserta</h1>
        <p>Pengelolaan Peserta untuk melihat list atau pengaturan terhadap peserta seperti tambah, edit dan hapus
            informasi peserta.</p>
    </div>

    <!-- Breadcrumbs -->
    <div class="text-sm breadcrumbs self-end">
        <ul>
            <li><a href="/" class="text-primary">Dashboard</a></li>
            <li><span class="badge badge-neutral rounded-full">Peserta</span></li>
        </ul>
    </div>
</header>

<!-- Manage Input / Button -->
<div class="flex gap-3 justify-between mb-6 mt-8">
    <!-- go to registration -->
    <a href="/contestant/add" class="btn btn-neutral capitalize btn-outline self-end">Registrasi
        Peserta</a>


    <!-- Search Input -->
    <form action="/contestants" method="post" class="join">
        <div>
            <div>
                <input class="input input-bordered join-item" name="search-keyword" placeholder="Cari Peserta" />
            </div>
        </div>
        <div class="indicator">
            <button type="submit" class="btn join-item capitalize btn-primary">Cari</button>
        </div>
    </form>
</div>

<!-- Table User -->
<div class="overflow-x-auto my-6">
    <table class="table table-lg table-zebra bg-white border-2">
        <!-- head -->
        <thead>
            <tr class="bg-neutral text-neutral-content">
                <th></th>
                <th>Nama Tim</th>
                <th>Penanggung Jawab</th>
                <th>Instansi / Sekolah</th>
                <th>Nomor Telepon</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contestants as $index => $contestant) : ?>
                <tr>
                    <th><?= $index + 1 ?></th>
                    <td><?= $contestant['team_name'] ?></td>
                    <td><?= $contestant['leader'] ?></td>
                    <td><?= $contestant['school'] ?></td>
                    <td><?= $contestant['phone_number'] ?></td>
                    <td class="flex gap-1.5 items-center">
                        <button id="contestant-<?= $contestant['contestant_id'] ?>" type="button" class="detail-contestant-btn btn btn-sm btn-neutral btn-outline capitalize">lihat</button> |
                        <a href="/contestant/edit/<?= $contestant['contestant_id'] ?>" class="btn btn-sm btn-warning capitalize">edit</a>
                        <button id="contestant-rmv-<?= $contestant['contestant_id'] ?>" type="button" class="delete-contestant-btn btn btn-sm btn-error btn-outline capitalize">hapus</button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<!-- Pagination -->
<!-- <div class="join justify-end">
    <button class="join-item btn">1</button>
    <button class="join-item btn btn-active">2</button>
    <button class="join-item btn">3</button>
    <button class="join-item btn">4</button>
</div> -->

<!-- Modal Detail-->
<dialog id="detail_modal" class="modal">
    <form method="dialog" class="modal-box max-w-2xl p-8">
        <h3 class="badge badge-lg badge-neutral mb-3">Detail Peserta</h3>
        <p>Detail Peserta menampilkan informasi lengkap peserta tim berserta anggota-anggotanya!</p>

        <hr class="my-6">

        <span id="load-bars" class="loading loading-bars loading-md"></span>

        <div id="detail-contestant" class="p-6 border-2 rounded grid-flow-row grid-cols-2 gap-4 my-3 hidden">
            <div class="flex gap-2 items-center">
                <span class="p-4 rounded-full w-9 h-9 bg-black/10 text-black/50 grid place-content-center">1</span>
                <div>
                    <h3 class="text-sm text-black/50 font-semibold">Nama Tim</h3>
                    <h4 id="team-name" class="font-semibold"></h4>
                </div>
            </div>
            <div class="flex gap-2 items-center">
                <span class="p-4 rounded-full w-9 h-9 bg-black/10 text-black/50 grid place-content-center">2</span>
                <div>
                    <h3 class="text-sm text-black/50 font-semibold">Penanggung Jawab</h3>
                    <h4 id="leader" class="font-semibold"></h4>
                </div>
            </div>
            <div class="flex gap-2 items-center">
                <span class="p-4 rounded-full w-9 h-9 bg-black/10 text-black/50 grid place-content-center">3</span>
                <div>
                    <h3 class="text-sm text-black/50 font-semibold">Asal Instansi / Sekolah</h3>
                    <h4 id="school" class="font-semibold"></h4>
                </div>
            </div>
            <div class="flex gap-2 items-center">
                <span class="p-4 rounded-full w-9 h-9 bg-black/10 text-black/50 grid place-content-center">4</span>
                <div>
                    <h3 class="text-sm text-black/50 font-semibold">Nomor Telepon</h3>
                    <h4 id="phone-number" class="font-semibold"></h4>
                </div>
            </div>
        </div>

        <hr class="my-6">

        <h2 class="badge badge-neutral mb-3">Data Anggota</h2>
        <div class="overflow-x-auto">
            <table class="table table-zebra bg-white border-2">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nama Lengkap</th>
                        <th>NIS</th>
                    </tr>
                </thead>
                <tbody id="member-container" class="font-semibold">

                </tbody>
            </table>
        </div>
        <div class="modal-action my-0">
            <button id="close-detail" type="button" onclick="detail_modal.close()" class="absolute top-0 right-0 m-8 btn btn-sm btn-square btn-outline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </form>
</dialog>

<!-- Modal Delete Confirmation -->
<dialog id="delete_modal" class="modal">
    <form method="dialog" class="modal-box p-8">
        <h3 class="badge badge-lg badge-neutral mb-3">Konfirmasi Hapus</h3>
        <p class="mb-6">Apakah anda yakin untuk menghapus Tim / Peserta <span id="load-dots" class="loading loading-dots loading-sm"></span> <span id="team-delete" class="hidden"></span>?
        </p>

        <div class="modal-action my-0">
            <a id="confirm-delete" class="btn btn-sm btn-outline btn-error capitalize">Iya</a>
            <button type="button" onclick="delete_modal.close()" class="btn btn-sm btn-neutral capitalize">
                Tidak
            </button>
        </div>
    </form>
</dialog>

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

<script src="<?= base_url('./js/manageStateContestant.js') ?>"></script>