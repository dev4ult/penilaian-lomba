<!-- Header -->
<header class="pb-10 border-b-2 flex justify-between">
    <div class="prose ">
        <h1 class="text-2xl font-extrabold my-0"><?= $contest['contest_name'] ?></h1>
        <p>Detail Lomba menyediakan spesifikasi atau informasi tentang lomba terhadap user Admin dan Juri.</p>
    </div>

    <!-- Breadcrumbs -->
    <div class="text-sm breadcrumbs self-end">
        <ul>
            <li><a href="/" class="text-primary">Dashboard</a></li>
            <li><a href="/contests" class="text-primary">Lomba</a></li>
            <li><span class="badge badge-neutral rounded-full"><?= $contest['contest_name'] ?></span></li>
        </ul>
    </div>
</header>

<div class="my-10 grid grid-flow-row grid-cols-2 gap-10">

    <!-- Description -->
    <div class="col-span-2 grid grid-flow-row grid-cols-4 gap-10">
        <div class="col-span-3">
            <h2 class="text-lg font-semibold text-black/30 mb-3">Deskripsi</h2>
            <p class="leading-8 font-semibold"><?= $contest['description'] ?></p>
        </div>

        <div class="w-full flex gap-2 justify-end">
            <?php if (session('user_role') == 'admin') : ?>
            <button type="button" onclick="delete_contest_modal.showModal()"
                class="btn btn-sm btn-error btn-outline capitalize">hapus</button>
            <a href="/contest/edit/<?= $contest['contest_id'] ?>" class="btn btn-sm btn-warning capitalize w-fit">edit
                informasi</a>
            <?php endif ?>
        </div>


    </div>

    <!-- Information Detail -->
    <div class="col-span-2">
        <input type="number" id="contest-id" name="contest-id" class="hidden" value="<?= $contest['contest_id'] ?>" />
        <h2 class="text-lg font-semibold text-black/30 mb-3">Informasi Pelaksanaan</h2>
        <div class="bg-white p-10 rounded-lg border-2 hover:shadow grid grid-flow grid-cols-3 gap-8">
            <div class="flex gap-2 items-center">
                <span class="p-4 rounded-full w-9 h-9 bg-black/10 text-black/50 grid place-content-center">1</span>
                <div>
                    <h4 class="font-semibold text-sm text-black/50">Tanggal</h4>
                    <h3 class="font-bold"><?= date_format(date_create($contest['date']), "j F Y") ?></h3>
                </div>
            </div>
            <div class="flex gap-2 items-center">
                <span class="p-4 rounded-full w-9 h-9 bg-black/10 text-black/50 grid place-content-center">2</span>
                <div>
                    <h4 class="font-semibold text-sm text-black/50">Waktu</h4>
                    <h3 class="font-bold"><?= date_format(date_create($contest['time_start']), "H:i") ?> -
                        <?= date_format(date_create($contest['time_end']), "H:i") ?></h3>
                </div>
            </div>
            <div class="flex gap-2 items-center">
                <span class="p-4 rounded-full w-9 h-9 bg-black/10 text-black/50 grid place-content-center">3</span>
                <div>
                    <h4 class="font-semibold text-sm text-black/50">Kategori / Tingkatan</h4>
                    <h3 class="font-bold uppercase"><?= $contest['category'] ?></h3>
                </div>
            </div>
            <div class="flex gap-2 items-center">
                <span class="p-4 rounded-full w-9 h-9 bg-black/10 text-black/50 grid place-content-center">4</span>
                <div>
                    <h4 class="font-semibold text-sm text-black/50">Penyelenggara</h4>
                    <h3 class="font-bold"><?= $contest['organizer'] ?></h3>
                </div>
            </div>
            <div class="flex gap-2 items-center">
                <span class="p-4 rounded-full w-9 h-9 bg-black/10 text-black/50 grid place-content-center">5</span>
                <div>
                    <h4 class="font-semibold text-sm text-black/50">Tempat</h4>
                    <h3 class="font-bold"><?= $contest['held_on'] ?></h3>
                </div>
            </div>
            <div class="flex gap-2 items-center">
                <span class="p-4 rounded-full w-9 h-9 bg-black/10 text-black/50 grid place-content-center">6</span>
                <div>
                    <h4 class="font-semibold text-sm text-black/50">Jumlah Peserta</h4>
                    <h3 class="font-bold" id="total-contestants-registered"><?= count($reg_contestants) ?></h3>
                </div>
            </div>
        </div>
    </div>


</div>

<div class="my-10 py-10 border-y-2 grid grid-flow-row grid-cols-2 gap-10">
    <!-- Aspects -->
    <div>
        <div class="flex gap-4 justify-between">
            <h2 class="text-lg font-semibold text-black/30 mb-3">Kategori Penilaian</h2>
            <?php if (session('user_role') == 'admin') : ?>
            <a href="/contest/evaluation-aspect/<?= $contest['contest_id'] ?>"
                class="btn btn-sm btn-warning capitalize">Edit Kategori</a>
            <?php endif ?>
        </div>

        <div class="overflow-x-auto">
            <table class="table table-zebra bg-white border-2">
                <thead>
                    <tr class="bg-secondary text-secondary-content">
                        <th></th>
                        <th>Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($categories) == 0) : ?>
                    <tr>
                        <td colspan="2">
                            <h3 class="text-center text-black/50">-- Belum ada Kategori yang ditambahkan pada lomba ini
                                --
                            </h3>
                        </td>
                    </tr>
                    <?php endif ?>
                    <?php foreach ($categories as $index => $category) : ?>
                    <tr>
                        <th><?= $index + 1 ?></th>
                        <td><?= $category['category_name'] ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>

    <!-- Judges -->
    <input type="number" id="total-judges" name="total-judges" class="hidden" value="<?= count($judges) ?>" />
    <div>
        <h2 class="text-lg font-semibold text-black/30 mb-3">Juri</h2>

        <div class="overflow-x-auto">
            <table class="table table-zebra bg-white border-2">
                <thead>
                    <tr class="bg-accent text-accent-content">
                        <th></th>
                        <th>Nama Lengkap</th>
                        <th>NIP / S</th>
                        <th>Nomor Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($judges) == 0) : ?>
                    <tr>
                        <td colspan="4">
                            <h3 class="text-center text-black/50">-- Belum ada Juri yang ditugaskan pada lomba ini --
                            </h3>
                        </td>
                    </tr>
                    <?php endif ?>
                    <?php foreach ($judges as $index => $judge) : ?>
                    <tr>
                        <th><?= $index + 1 ?></th>
                        <td><?= $judge['full_name'] ?></td>
                        <td><?= $judge['staff_id'] ?></td>
                        <td><?= $judge['phone_number'] ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Contestant -->
<div class="my-10">
    <!-- Manage Contestant -->
    <div class="flex gap-3 justify-between mb-3">
        <h2 class="text-lg font-semibold text-black/30 self-end">Peserta</h2>

        <div>
            <div class="inline-flex">
                <button type="button" onclick="recap_modal.showModal()" id="recap-modal-btn"
                    class="btn btn-primary btn-outline capitalize w-fit">rekap nilai lomba</button>
            </div>

            <!-- refresh -->

            <button type="button" onclick="refresh()" class="btn capitalize btn-primary mx-2">refresh</button>

            <!-- Add Contestants -->
            <div class="join">
                <input type="text" id="select-contestants" class="input input-bordered" list="contestants"
                    placeholder="Tambah Peserta" />
                <datalist id="contestants">
                    <?php foreach ($contestants as $contestant) : ?>
                    <option value="<?= $contestant['team_name'] ?>" />
                    <?php endforeach ?>
                </datalist>
                <button id="add-contestant"
                    class="btn btn-primary btn-outline capitalize join-item btn-disabled">Tambah</button>
            </div>
        </div>
    </div>

    <!-- Table Contestant Registered -->
    <div class="overflow-x-auto mt-4">
        <table class="table table-lg table-zebra bg-white border-2">
            <!-- head -->
            <thead>
                <tr class="bg-neutral text-neutral-content">
                    <th></th>
                    <th>Nama Tim</th>
                    <th>Instansi</th>
                    <th>Nilai</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="reg-contestants-container">
                <?php if (count($reg_contestants) == 0) : ?>
                <tr>
                    <td colspan="6">
                        <h3 class="text-center text-black/50">-- Belum ada Peserta yang mendaftar pada lomba ini --</h3>
                    </td>
                </tr>
                <?php endif ?>

                <?php foreach ($reg_contestants as $index => $contestant) : ?>
                <tr>
                    <th><?= $index + 1 ?></th>
                    <td id="team-name-data-<?= $contestant['contestant_id'] ?>"><?= $contestant['team_name'] ?></td>
                    <td><?= $contestant['school'] ?></td>
                    <?php $contestant_eval = 0 ?>
                    <?php foreach ($total_evaluation as $eval) {
                            if ($eval['contest_id'] == $contestant['contest_id'] && $eval['contestant_id'] == $contestant['contestant_id']) {
                                $contestant_eval += $eval['total_evaluation'];
                            }
                        } ?>
                    <td><span class="badge badge-neutral badge-outline badge-lg"><?= $contestant_eval ?></span></td>
                    <td class="flex gap-1.5 items-center">
                        <button id="preview-<?= $contestant['reg_contestant_id'] ?>"
                            class="preview-contestant-btn btn btn-sm btn-neutral btn-outline capitalize">lihat</button>
                        |
                        <a href="/contest/contestant-evaluation/<?= $contestant['contest_id'] ?>/<?= $contestant['contestant_id'] ?>"
                            class="btn btn-sm btn-primary capitalize">Beri Penilaian</a>
                        <button type="button" id="contestant-rmv-<?= $contestant['contestant_id'] ?>"
                            class="remove-reg-btn btn btn-sm btn-error btn-outline capitalize">hapus</button>
                    </td>
                </tr>
                <script>
                $(`option[value="<?= $contestant['team_name'] ?>"]`).remove();
                </script>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Delete Contest Confirmation -->
<dialog id="delete_contest_modal" class="modal">
    <form method="dialog" class="modal-box p-8">
        <h3 class="badge badge-lg badge-neutral mb-3">Konfirmasi Hapus</h3>
        <p class="mb-6">Apakah anda yakin untuk menghapus Lomba <?= $contest['contest_name'] ?>?
        </p>

        <div class="modal-action my-0">
            <a href="/contest/delete/<?= $contest['contest_id'] ?>"
                class="btn btn-sm btn-outline btn-error capitalize">Iya</a>
            <button onclick="delete_contest_modal.close()" type="button" class="btn btn-sm btn-neutral capitalize">
                Tidak
            </button>
        </div>
    </form>
</dialog>
<!-- Modal Recap Contest -->
<dialog id="recap_modal" class="modal">
    <form action="/generate-contest-recap" method="post" class="modal-box p-8">
        <h3 class="badge badge-lg badge-neutral mb-3">Rekap Nilai</h3>
        <p class="mb-6">Rekapitulasi Nilai Peserta akan menghasilkan file pdf berisikan hasil akhir penilaian
            peserta.</span>?
        </p>

        <input type="number" id="contest-id" name="contest-id" class="hidden" value="<?= $contest['contest_id'] ?>" />

        <hr class="my-6">

        <div class="flex flex-col gap-1">
            <label for="filename" class="text-sm font-semibold">Nama File</label>
            <input type="text" id="filename" name="filename" class="input input-bordered"
                placeholder="Rekapitulasi Nilai Lomba ..." required />
        </div>

        <hr class="my-6">

        <h3 class="badge badge-neutral mb-6">Nilai Penentu Lomba</h3>

        <div class="grid grid-flow-row grid-cols-2 gap-4">
            <?php if (count($categories) == 0) : ?>
            <p class="col-span-2">Tidak ada kategori penilaian...</p>
            <input type="text" name="unknown" class="hidden" required />
            <?php endif ?>
            <?php foreach ($categories as $category) : ?>
            <label class="label cursor-pointer p-4 border-2 rounded">
                <span class="label-text"><?= $category['category_name'] ?></span>
                <input type="checkbox" name="category-<?= $category['eval_category_id'] ?>" checked="checked"
                    value="<?= $category['eval_category_id'] ?>" class="checkbox checkbox-primary" />
            </label>
            <?php endforeach ?>
        </div>

        <hr class="my-6">

        <button type="submit" class="btn btn-primary capitalize w-full">Download</button>

        <div class="modal-action my-0">
            <button type="button" onclick="recap_modal.close()"
                class="absolute top-0 right-0 m-8 btn btn-sm btn-square btn-outline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>

            </button>
        </div>
    </form>
</dialog>

<!-- Modal Detail Contestant -->
<dialog id="detail_modal" class="modal">
    <form method="post" action="/generate-contestant-recap" class="modal-box max-w-2xl p-8">
        <div id="main-eval-information">
            <h1 class="badge badge-lg badge-neutral mb-3">Informasi Penilaian</h1>
            <p class="mb-3">Detail Penilaian Peserta memberikan informasi mengenai peserta dan penilaiannya pada lomba
                ini
                per kategori dan aspek.</p>
            <hr class="my-6">
            <h2 class="badge badge-neutral mb-3 block">Juri yang Menilai</h2>

            <span id="load-bars" class="loading loading-bars loading-md"></span>

            <p id="judge-who-evaluated" class="hidden"></p>

            <hr class="my-6">

            <div class="flex justify-between mb-3">
                <h2 class="badge badge-neutral self-end">Kategori Penilaian</h2>

                <button type="button" id="per-aspect-btn" class="btn btn-sm btn-outline capitalize">Aspek
                    Penilaian</button>
            </div>

            <span id="load-bars" class="loading loading-bars loading-md"></span>

            <div id="detail-evaluation" class="overflow-x-auto hidden">
                <table class="table table-zebra bg-white border-2">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Kategori Penilaian</th>
                            <th>Nilai Total</th>
                            <th>Sudah Menilai</th>
                        </tr>
                    </thead>
                    <tbody id="detail-category-eval" class="font-semibold">
                    </tbody>
                </table>
            </div>

            <hr class="my-6">

            <h2 class="badge badge-neutral mb-3 block">Tim / Peserta</h2>

            <span id="load-bars" class="loading loading-bars loading-md"></span>

            <div id="detail-contestant" class="p-6 border-2 rounded grid-flow-row grid-cols-2 gap-4 my-3 hidden">
                <div class="flex gap-2 items-center">
                    <span class="p-4 rounded-full w-9 h-9 bg-black/10 text-black/50 grid place-content-center">1</span>
                    <div>
                        <h3 class="text-sm text-black/50 font-semibold">Nama Tim</h3>
                        <h4 class="font-bold" id="team-name"></h4>
                    </div>
                </div>
                <div class="flex gap-2 items-center">
                    <span class="p-4 rounded-full w-9 h-9 bg-black/10 text-black/50 grid place-content-center">2</span>
                    <div>
                        <h3 class="text-sm text-black/50 font-semibold">Penanggung Jawab</h3>
                        <h4 class="font-bold" id="leader"></h4>
                    </div>
                </div>
                <div class="flex gap-2 items-center">
                    <span class="p-4 rounded-full w-9 h-9 bg-black/10 text-black/50 grid place-content-center">3</span>
                    <div>
                        <h3 class="text-sm text-black/50 font-semibold">Asal Instansi / Sekolah</h3>
                        <h4 class="font-bold" id="school"></h4>
                    </div>
                </div>
                <div class="flex gap-2 items-center">
                    <span class="p-4 rounded-full w-9 h-9 bg-black/10 text-black/50 grid place-content-center">4</span>
                    <div>
                        <h3 class="text-sm text-black/50 font-semibold">Nomor Telepon</h3>
                        <h4 class="font-bold" id="phone-number"></h4>
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
                    <tbody id="detail-member" class="font-semibold">

                    </tbody>
                </table>
            </div>

        </div>
        <div id="per-aspect-evaluation" class="hidden">
            <h1 class="badge badge-lg badge-neutral mb-3">Aspek Penilaian</h1>
            <p class="mb-3">Data tabel dibawah merupakan penilaian peserta per aspek pada lomba ini.</p>
            <hr class="my-6">
            <div class="flex justify-between gap-3">
                <input type="number" name="reg-contestant-id" id="reg-contestant-id" class="hidden" />

                <div class="collapse border-2 border-primary text-primary w-fit">
                    <input type="checkbox" />
                    <div class="collapse-title font-semibold">
                        Rekap Nilai Peserta
                    </div>
                    <div class="collapse-content flex flex-col gap-3 text-black">
                        <div class="flex flex-col gap-1">
                            <label for="queue-number" class="text-sm font-semibold">Nomor Urut</label>
                            <input type="number" id="queue-number" name="queue-number" class="input input-bordered"
                                placeholder="Nomor Urut" required />
                        </div>

                        <div class="flex flex-col gap-1">
                            <label for="duration" class="text-sm font-semibold">Durasi</label>
                            <input type="time" id="duration" name="duration" class="input input-bordered" required />
                        </div>

                        <button type="submit" class="btn btn-primary capitalize">submit</button>
                    </div>
                </div>

                <button type="button" class="btn btn-sm btn-outline capitalize" id="back-to-main-btn">Kembali</button>
            </div>
            <div class="overflow-x-auto" id="all-aspect-tables">

            </div>
        </div>
        <div class="modal-action my-0">
            <button type="button" onclick="detail_modal.close()"
                class="absolute top-0 right-0 m-8 btn btn-sm btn-square btn-outline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </form>
</dialog>

<!-- Modal Delete Confirmation -->
<dialog id="delete_modal" class="modal">
    <form id="form-confirm-delete" method="dialog" class="modal-box p-8">
        <h3 class="badge badge-lg badge-neutral mb-3">Konfirmasi Hapus</h3>
        <p class="mb-6">Apakah anda yakin untuk menghapus Tim / Peserta <span id="team-delete"
                class="font-bold"></span>?
        </p>

        <input type="number" id="delete-contestant-id" name="delete-contestant-id" class="hidden" />

        <div class="modal-action my-0">
            <button type="button" id="confirm-delete" class="btn btn-sm btn-outline btn-error capitalize">Iya</button>
            <button id="confirm-no-delete" onclick="delete_modal.close()" type="button"
                class="btn btn-sm btn-neutral capitalize">
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
    className: 'alert alert-error fixed z-20 top-5 right-5 w-fit transition-all',
}).showToast();
<?php endif ?>
<?php if (session()->getFlashdata('success')) : ?>
Toastify({
    text: `<?= session()->getFlashdata('success') ?>`,
    duration: 3000,
    position: 'left',
    className: 'alert alert-success fixed z-20 top-5 right-5 w-fit transition-all',
}).showToast();
<?php endif ?>
</script>


<script src="<?= base_url('./js/manageRegisterContestants.js') ?>"></script>