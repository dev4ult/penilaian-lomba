<!-- Header -->
<header class="pb-10 border-b-2 flex justify-between">
    <div class="prose">
        <h1 class="text-xl my-0 font-extrabold">Manajemen Akun / User</h1>
        <p>Pengelolaan data user untuk aksesibilitas ke aplikasi dan pengaturan peranan atau tugas terhadap user</p>
    </div>

    <!-- Breadcrumbs -->
    <div class="text-sm breadcrumbs self-end">
        <ul>
            <li><a href="/" class="text-primary">Dashboard</a></li>
            <li><span class="badge badge-neutral rounded-full">Akun / User</span></li>
        </ul>
    </div>
</header>

<!-- Manage Input / Button -->
<div class="flex gap-3 justify-between mb-6 mt-8">
    <!-- Modal Button -->
    <button class="btn btn-neutral capitalize btn-outline self-end" onclick="registration_modal.showModal()">Registrasi
        Akun / User</button>

    <!-- Modal Form -->
    <dialog id="registration_modal" class="modal">
        <form action="/users" method="post" class="modal-box p-8 max-w-2xl relative">
            <h3 class="badge badge-lg badge-neutral mb-3">Form Registrasi</h3>
            <p class="mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, laboriosam!
            </p>
            <div class="grid grid-flow-row grid-cols-2 gap-6">
                <hr class="col-span-2" />
                <!-- Username -->
                <div class="flex flex-col gap-1 w-full">
                    <label for="username" class="text-sm font-semibold">Username</label>
                    <input type="text" id="username" name="username" class="input input-bordered" placeholder="Isikan Username" required>
                </div>

                <!-- Password -->
                <div class="flex flex-col gap-1 w-full">
                    <label for="password" class="text-sm font-semibold">Password</label>
                    <input type="password" id="password" name="password" class="input input-bordered" placeholder="Isikan Password" required>
                </div>

                <!-- Role -->
                <div class="flex flex-col gap-1 w-full">
                    <label for="role" class="text-sm font-semibold">Role</label>
                    <select name="role" id="role" class="select select-bordered" required>
                        <option disabled selected>Pilih Role</option>
                        <option value="juri">Juri</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <!-- Password Confirmation -->
                <div class="flex flex-col gap-1 w-full">
                    <label for="password-conf" class="text-sm font-semibold">Konfirmasi Password</label>
                    <input type="password" id="password-conf" name="password-conf" class="input input-bordered" placeholder="Isikan Konfirmasi Password" required>
                </div>

                <hr class="col-span-2" />

                <!-- Full Name -->
                <div class="flex flex-col gap-1 w-full col-span-2">
                    <label for="full-name" class="text-sm font-semibold">Nama Lengkap</label>
                    <input type="text" id="full-name" name="full-name" class="input input-bordered" placeholder="Isikan Nama Lengkap" required>
                </div>

                <!-- NIP or NIS -->
                <div class="flex flex-col gap-1 w-full">
                    <label for="nip-nis" class="text-sm font-semibold">NIP / NIS</label>
                    <input type="number" id="nip-nis" name="nip-nis" class="input input-bordered" placeholder="Isikan NIP / NIS" required>
                </div>

                <!-- Phone Number -->
                <div class="flex flex-col gap-1 w-full">
                    <label for="phone-number" class="text-sm font-semibold">Nomor Telepon</label>
                    <input type="number" id="phone-number" name="phone-number" class="input input-bordered" placeholder="Isikan Nomor Telepon" required>
                </div>

                <hr class="col-span-2" />

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary capitalize col-span-2">submit</button>
            </div>
            <div class="modal-action my-0">
                <button type="button" onclick="registration_modal.close()" class="absolute top-0 right-0 m-8 btn btn-sm btn-circle btn-outline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </form>
    </dialog>

    <!-- Search Input -->
    <div class="join">
        <div>
            <div>
                <input class="input input-bordered join-item" placeholder="Cari Admin atau Juri" />
            </div>
        </div>
        <select class="select select-bordered join-item">
            <option disabled selected>Filter</option>
            <option>Admin</option>
            <option>Juri</option>
        </select>
        <div class="indicator">
            <button class="btn join-item capitalize btn-primary">Cari</button>
        </div>
    </div>
</div>

<!-- Table User -->
<div class="overflow-x-auto my-6">
    <table class="table table-lg table-zebra bg-white border-2">
        <thead>
            <tr class="bg-neutral text-neutral-content">
                <th></th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>NIP / S</th>
                <th>Role</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $index => $user) : ?>
                <tr>
                    <th><?= $index + 1 ?></th>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['full_name'] ?></td>
                    <td><?= $user['staff_id'] ?></td>
                    <td><span class="badge badge-lg capitalize <?= $user['role'] == 'admin' ? 'badge-success' : 'bg-orange-500' ?>"><?= $user['role'] ?></span>
                    </td>
                    <td>
                        <button id="user-<?= $user['user_id'] ?>" class="edit-user-btn btn btn-sm btn-warning btn-outline capitalize">edit</button>
                        <button id="user-rmv-<?= $user['user_id'] ?>" class="delete-user-btn btn btn-sm btn-error btn-outline capitalize">hapus</button>
                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="join justify-end">
    <button class="join-item btn">1</button>
    <button class="join-item btn btn-active">2</button>
    <button class="join-item btn">3</button>
    <button class="join-item btn">4</button>
</div>

<!-- Modal Edit -->
<dialog id="edit_modal" class="modal">
    <form id="form-edit-user" method="post" class="modal-box max-w-2xl p-8 relative">
        <h3 class="badge badge-lg badge-neutral mb-3">Edit Akun / User</h3>
        <p class="mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, laboriosam!
        </p>

        <hr class="mb-6">

        <span id="load-bars" class="loading loading-bars loading-md"></span>

        <div id="edit-container" class="grid-flow-row grid-cols-2 gap-6 hidden">

            <!-- Username -->
            <div class="flex flex-col gap-1 w-full">
                <label for="username-edit" class="text-sm font-semibold">Username</label>
                <input type="text" id="username-edit" name="username" class="input input-bordered" placeholder="Isikan Username" required>
            </div>

            <!-- Role -->
            <div class="flex flex-col gap-1 w-full">
                <label for="role-edit" class="text-sm font-semibold">Role</label>
                <select id="role-edit" name="role" class="select select-bordered" required>
                    <option disabled>Pilih Role</option>
                    <option value="juri">Juri</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <hr class="col-span-2">

            <!-- Full Name -->
            <div class="flex flex-col gap-1 w-full col-span-2">
                <label for="full-name-edit" class="text-sm font-semibold">Nama Lengkap</label>
                <input type="text" id="full-name-edit" name="full-name" class="input input-bordered" placeholder="Isikan Nama Lengkap" required>
            </div>

            <!-- NIP or NIS -->
            <div class="flex flex-col gap-1 w-full">
                <label for="nip-nis-edit" class="text-sm font-semibold">NIP / NIS</label>
                <input type="number" id="nip-nis-edit" name="nip-nis" class="input input-bordered" placeholder="Isikan NIP / NIS" required>
            </div>

            <!-- Phone Number -->
            <div class="flex flex-col gap-1 w-full">
                <label for="phone-number-edit" class="text-sm font-semibold">Nomor Telepon</label>
                <input type="number" id="phone-number-edit" name="phone-number" class="input input-bordered" placeholder="Isikan Nomor Telepon" required>
            </div>

            <hr class="col-span-2" />

            <div class="flex gap-1 items-center col-span-2">
                <h2 class="badge badge-neutral">Ubah Password</h2>
                <div class="tooltip" data-tip="Bersifat Opsional">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current shrink-0 w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- New Password -->
            <div class="flex flex-col gap-1 w-full">
                <label for="password-edit" class="text-sm font-semibold">Password Baru</label>
                <input type="password" id="password-edit" name="password" class="input input-bordered" placeholder="Isikan Password">
            </div>

            <!-- Password Confirmation -->
            <div class="flex flex-col gap-1 w-full self-end">
                <label for="password-conf-edit" class="text-sm font-semibold">Konfirmasi Password Lama</label>
                <input type="password" id="password-conf-edit" name="password-conf" class="input input-bordered" placeholder="Isikan Konfirmasi Password Lama">
            </div>

            <hr class="col-span-2" />

            <!-- Submit Button -->
            <button type="submit" class="btn btn-warning capitalize col-span-2">simpan perubahan</button>
        </div>
        <div class="modal-action my-0">
            <button type="button" id="close-edit-modal" onclick="edit_modal.close()" class="absolute top-0 right-0 m-8 btn btn-sm btn-circle btn-outline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </form>
</dialog>

<!-- Modal Delete Confirmation -->
<dialog id="delete_modal" class="modal">
    <form id="form-confirm-delete" method="post" class="modal-box p-8">
        <h3 class="badge badge-lg badge-neutral mb-3">Konfirmasi Hapus</h3>
        <p class="mb-6">Apakah anda yakin untuk menghapus <span id="load-dots" class="loading loading-dots loading-sm"></span> <span id="username-delete" class="hidden"></span>?
        </p>

        <div class="modal-action my-0">
            <button id="confirm-delete" type="submit" class="btn btn-sm btn-outline btn-error capitalize hidden">Iya</button>
            <button id="confirm-no-delete" type="button" class="btn btn-sm btn-neutral capitalize">
                Tidak
            </button>
        </div>
    </form>
</dialog>

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

<script src="<?= base_url('./js/manageStateUser.js') ?>"></script>