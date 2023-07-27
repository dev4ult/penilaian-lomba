<!-- Header -->
<header class="pb-10 border-b-2 flex justify-between">
    <div class="prose">
        <h2 class="text-lg font-extrabold">Manajemen User</h2>
        <p>Pengelolaan data user untuk aksesibilitas ke aplikasi dan pengaturan peranan atau tugas terhadap user</p>
    </div>

    <!-- Breadcrumbs -->
    <div class="text-sm breadcrumbs self-end">
        <ul>
            <li><a href="/" class="text-primary">Dashboard</a></li>
            <li><span class="badge badge-neutral rounded-full">User</span></li>
        </ul>
    </div>
</header>

<!-- Manage Input / Button -->
<div class="flex gap-3 justify-between mb-6 mt-8">
    <!-- Modal Form -->
    <button class="btn btn-neutral capitalize btn-sm btn-outline self-end" onclick="my_modal_1.showModal()">Registrasi
        User Baru</button>
    <dialog id="my_modal_1" class="modal">
        <form method="dialog" class="modal-box">
            <h3 class="font-bold text-lg">Hello!</h3>
            <p class="py-4">Press ESC key or click the button below to close</p>
            <div class="modal-action">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
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
                <td><button class="btn btn-sm btn-secondary btn-outline capitalize" onclick="modal_detail.showModal()">detail</button></td>
            </tr>
            <tr>
                <th>2</th>
                <td>Blue</td>
                <td>Cy Ganderton</td>
                <td>21XXXXXXXXXXXXXX</td>
                <td><button class="btn btn-sm btn-secondary btn-outline capitalize" onclick="modal_detail.showModal()">detail</button></td>
            </tr>
            <tr>
                <th>3</th>
                <td>Blue</td>
                <td>Cy Ganderton</td>
                <td>21XXXXXXXXXXXXXX</td>
                <td><button class="btn btn-sm btn-secondary btn-outline capitalize" onclick="modal_detail.showModal()">detail</button></td>
            </tr>
            <tr>
                <th>4</th>
                <td>Blue</td>
                <td>Cy Ganderton</td>
                <td>21XXXXXXXXXXXXXX</td>
                <td><button class="btn btn-sm btn-secondary btn-outline capitalize" onclick="modal_detail.showModal()">detail</button></td>
            </tr>
            <tr>
                <th>5</th>
                <td>Blue</td>
                <td>Cy Ganderton</td>
                <td>21XXXXXXXXXXXXXX</td>
                <td><button class="btn btn-sm btn-secondary btn-outline capitalize" onclick="modal_detail.showModal()">detail</button></td>
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