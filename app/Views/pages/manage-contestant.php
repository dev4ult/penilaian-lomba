<!-- Header -->
<header class="pb-10 border-b-2 flex justify-between">
    <div class="prose">
        <h2 class="text-lg font-extrabold">Manajemen Peserta</h2>
        <p>Pengelolaan data user untuk aksesibilitas ke aplikasi dan pengaturan peranan atau tugas terhadap user</p>
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
    <div class="join">
        <div>
            <div>
                <input class="input input-bordered join-item" placeholder="Cari Peserta" />
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
                <th>Nama Tim</th>
                <th>Ketua</th>
                <th>Instansi / Sekolah</th>
                <th>Nomor Telepon</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <td>Blue</td>
                <td>Cy Ganderton</td>
                <td>SMK 123</td>
                <td>08XXXXXXXXXXXX</td>
                <td class="flex gap-1.5 items-center">
                    <button type="button" class="btn btn-sm btn-neutral btn-outline capitalize"
                        onclick="detail_modal.showModal()">lihat</button> |
                    <a href="/contestant/edit" class="btn btn-sm btn-warning capitalize">edit</a>
                    <button type="button" class="btn btn-sm btn-error btn-outline capitalize"
                        onclick="delete_modal.showModal()">hapus</button>
                </td>
            </tr>
            <tr>
                <th>2</th>
                <td>Blue</td>
                <td>Cy Ganderton</td>
                <td>SMA 345</td>
                <td>08XXXXXXXXXXXX</td>
                <td class="flex gap-1.5 items-center">
                    <button type="button" class="btn btn-sm btn-neutral btn-outline capitalize"
                        onclick="detail_modal.showModal()">lihat</button> |
                    <a href="/contestant/edit" class="btn btn-sm btn-warning capitalize">edit</a>
                    <button type="button" class="btn btn-sm btn-error btn-outline capitalize"
                        onclick="delete_modal.showModal()">hapus</button>
                </td>
            </tr>
            <tr>
                <th>3</th>
                <td>Blue</td>
                <td>Cy Ganderton</td>
                <td>SMP 231</td>
                <td>08XXXXXXXXXXXX</td>
                <td class="flex gap-1.5 items-center">
                    <button type="button" class="btn btn-sm btn-neutral btn-outline capitalize"
                        onclick="detail_modal.showModal()">lihat</button> |
                    <a href="/contestant/edit" class="btn btn-sm btn-warning capitalize">edit</a>
                    <button type="button" class="btn btn-sm btn-error btn-outline capitalize"
                        onclick="delete_modal.showModal()">hapus</button>
                </td>
            </tr>
            <tr>
                <th>4</th>
                <td>Blue</td>
                <td>Cy Ganderton</td>
                <td>SMP 213</td>
                <td>08XXXXXXXXXXXX</td>
                <td class="flex gap-1.5 items-center">
                    <button type="button" class="btn btn-sm btn-neutral btn-outline capitalize"
                        onclick="detail_modal.showModal()">lihat</button> |
                    <a href="/contestant/edit" class="btn btn-sm btn-warning capitalize">edit</a>
                    <button type="button" class="btn btn-sm btn-error btn-outline capitalize"
                        onclick="delete_modal.showModal()">hapus</button>
                </td>
            </tr>
            <tr>
                <th>5</th>
                <td>Blue</td>
                <td>Cy Ganderton</td>
                <td>SMA 20</td>
                <td>08XXXXXXXXXXXX</td>
                <td class="flex gap-1.5 items-center">
                    <button type="button" class="btn btn-sm btn-neutral btn-outline capitalize"
                        onclick="detail_modal.showModal()">lihat</button> |
                    <a href="/contestant/edit" class="btn btn-sm btn-warning capitalize">edit</a>
                    <button type="button" class="btn btn-sm btn-error btn-outline capitalize"
                        onclick="delete_modal.showModal()">hapus</button>
                </td>
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

<!-- Modal Detail-->
<dialog id="detail_modal" class="modal">
    <form method="dialog" class="modal-box max-w-2xl p-8">
        <h3 class="badge badge-lg badge-neutral mb-3">Detail Peserta</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam odio eius atque ullam incidunt ipsa!</p>

        <hr class="my-6">

        <div class="grid p-6 border-2 rounded grid-flow-row grid-cols-2 gap-4 my-3">
            <div>
                <h3 class="text-sm text-black/50 font-semibold">Nama Tim</h3>
                <h4 class="font-bold">Cabe Rawit</h4>
            </div>
            <div>
                <h3 class="text-sm text-black/50 font-semibold">Ketua</h3>
                <h4 class="font-bold">Siddiq Maulana</h4>
            </div>
            <div>
                <h3 class="text-sm text-black/50 font-semibold">Asal Instansi / Sekolah</h3>
                <h4 class="font-bold">SMAN 34</h4>
            </div>
            <div>
                <h3 class="text-sm text-black/50 font-semibold">Nomor Telepon</h3>
                <h4 class="font-bold">080000000000</h4>
            </div>
        </div>

        <hr class="my-6">

        <h2 class="badge badge-neutral mb-3">Data Anggota</h2>
        <div class="overflow-x-auto">
            <table class="table table-zebra bg-white border-2">
                <thead>
                    <tr class="">
                        <th></th>
                        <th>Nama Lengkap</th>
                        <th>NIS</th>
                    </tr>
                </thead>
                <tbody class="font-semibold">
                    <tr>
                        <th>1</th>
                        <td>Cy Ganderton</td>
                        <td>2100000000</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>Cy Ganderton</td>
                        <td>2100000000</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>Cy Ganderton</td>
                        <td>2100000000</td>
                    </tr>
                </tbody>
            </table>
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
    <form method="dialog" class="modal-box p-8">
        <h3 class="badge badge-lg badge-neutral mb-3">Konfirmasi Hapus</h3>
        <p class="mb-6">Apakah anda yakin untuk menghapus Tim / Peserta ini?
        </p>

        <div class="modal-action my-0">
            <button type="button" onclick="delete_modal.close()"
                class="btn btn-sm btn-outline btn-error capitalize">Iya</button>
            <button type="button" onclick="delete_modal.close()" class="btn btn-sm btn-primary capitalize">
                Tidak
            </button>
        </div>
    </form>
</dialog>