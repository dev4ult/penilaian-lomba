<!-- Header -->
<header class="pb-10 border-b-2 flex justify-between">
    <div class="prose">
        <h2 class="text-lg font-extrabold">Manajemen Akun / User</h2>
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
        Akun / User Baru</button>

    <!-- Modal Form -->
    <dialog id="registration_modal" class="modal">
        <form method="dialog" class="modal-box p-8 max-w-2xl relative">
            <h3 class="badge badge-lg badge-neutral mb-3">Form Registrasi</h3>
            <p class="mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, laboriosam!</p>
            <div class="grid grid-flow-row grid-cols-2 gap-6">
                <hr class="col-span-2" />
                <!-- Username -->
                <div class="flex flex-col gap-1 w-full">
                    <label for="username" class="text-sm font-semibold">Username</label>
                    <input type="text" id="username" name="username" class="input input-bordered"
                        placeholder="Isikan Username" required>
                </div>

                <!-- Password -->
                <div class="flex flex-col gap-1 w-full">
                    <label for="password" class="text-sm font-semibold">Password</label>
                    <input type="password" id="password" name="password" class="input input-bordered"
                        placeholder="Isikan Password" required>
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
                    <input type="password" id="password-conf" name="password-conf" class="input input-bordered"
                        placeholder="Isikan Konfirmasi Password" required>
                </div>

                <hr class="col-span-2" />

                <!-- NIP or NIS -->
                <div class="flex flex-col gap-1 w-full">
                    <label for="nip-nis" class="text-sm font-semibold">NIP / NIS</label>
                    <input type="number" id="nip-nis" name="nip-nis" class="input input-bordered"
                        placeholder="Isikan NIP / NIS" required>
                </div>

                <!-- Phone Number -->
                <div class="flex flex-col gap-1 w-full">
                    <label for="phone-number" class="text-sm font-semibold">Nomor Telepon</label>
                    <input type="number" id="phone-number" name="phone-number" class="input input-bordered"
                        placeholder="Isikan Nomor Telepon" required>
                </div>

                <hr class="col-span-2" />

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary capitalize col-span-2">submit</button>
            </div>
            <div class="modal-action my-0">
                <button type="button" onclick="registration_modal.close()"
                    class="absolute top-0 right-0 m-8 btn btn-sm btn-square btn-outline">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
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
        <!-- head -->
        <thead>
            <tr class="bg-neutral text-neutral-content">
                <th></th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Nomor Induk Pegawai / Mahasiswa</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <td>Blue</td>
                <td>Cy Ganderton</td>
                <td>21XXXXXXXXXXXXXX</td>
                <td><button class="btn btn-sm btn-neutral btn-outline capitalize"
                        onclick="modal_detail.showModal()">detail</button></td>
            </tr>
            <tr>
                <th>2</th>
                <td>Blue</td>
                <td>Cy Ganderton</td>
                <td>21XXXXXXXXXXXXXX</td>
                <td><button class="btn btn-sm btn-neutral btn-outline capitalize"
                        onclick="modal_detail.showModal()">detail</button></td>
            </tr>
            <tr>
                <th>3</th>
                <td>Blue</td>
                <td>Cy Ganderton</td>
                <td>21XXXXXXXXXXXXXX</td>
                <td><button class="btn btn-sm btn-neutral btn-outline capitalize"
                        onclick="modal_detail.showModal()">detail</button></td>
            </tr>
            <tr>
                <th>4</th>
                <td>Blue</td>
                <td>Cy Ganderton</td>
                <td>21XXXXXXXXXXXXXX</td>
                <td><button class="btn btn-sm btn-neutral btn-outline capitalize"
                        onclick="modal_detail.showModal()">detail</button></td>
            </tr>
            <tr>
                <th>5</th>
                <td>Blue</td>
                <td>Cy Ganderton</td>
                <td>21XXXXXXXXXXXXXX</td>
                <td><button class="btn btn-sm btn-neutral btn-outline capitalize"
                        onclick="modal_detail.showModal()">detail</button></td>
            </tr>
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

<!-- Modal Detail -->
<dialog id="modal_detail" class="modal">
    <form method="dialog" class="modal-box">
        <h3 class="font-bold text-lg">Hello!</h3>
        <p class="py-4">Press ESC key or click the button below to close</p>
        <div class="modal-action">
            <!-- if there is a button in form, it will close the modal -->
            <button class="btn">Close</button>
        </div>
    </form>
</dialog>