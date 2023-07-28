<!-- Header -->
<header class="pb-10 border-b-2 flex justify-between">
    <div class="prose ">
        <h1 class="text-2xl font-extrabold my-0">Adzan Senior</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione porro quas magni, nam perspiciatis
            voluptatum!</p>
    </div>

    <!-- Breadcrumbs -->
    <div class="text-sm breadcrumbs self-end">
        <ul>
            <li><a href="/" class="text-primary">Dashboard</a></li>
            <li><a href="/contests" class="text-primary">Lomba</a></li>
            <li><span class="badge badge-neutral rounded-full">Adzan Senior</span></li>
        </ul>
    </div>
</header>

<div class="my-10 grid grid-flow-row grid-cols-2 gap-10 pb-10 border-b-2">

    <!-- Informatian Detail -->
    <div>
        <h2 class="text-lg font-semibold text-black/30 mb-3">Informasi Pelaksanaan</h2>
        <div class="bg-white p-6 rounded-lg border-2 hover:shadow grid grid-flow grid-cols-2 gap-3">
            <div>
                <h4 class="font-bold text-black/50">Tanggal</h4>
                <h3 class="text-xl">12 Januari 2023</h3>
            </div>
            <div>
                <h4 class="font-bold text-black/50">Waktu</h4>
                <h3 class="text-xl">13.00 - 14.00</h3>
            </div>
            <div>
                <h4 class="font-bold text-black/50">Jumlah Peserta</h4>
                <h3 class="text-xl">45</h3>
            </div>
        </div>
    </div>

    <!-- Description -->
    <div>
        <h2 class="text-lg font-semibold text-black/30 mb-3">Deskripsi</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae enim sed quaerat pariatur quo laudantium
            dolorem!
            Libero sit nihil suscipit dignissimos laborum saepe officia nesciunt quo repellat commodi obcaecati officiis
            nulla illum</p>
    </div>
</div>


<div class="my-10 grid grid-flow-row grid-cols-2 gap-10">
    <!-- Contestant -->
    <div>
        <div class="flex gap-3 justify-between mb-3">
            <h2 class="text-lg font-semibold text-black/30 self-end">Peserta</h2>
            <div class="join">
                <select class="select select-bordered join-item">
                    <option disabled selected>Filter</option>
                    <option>Belum Dinilai</option>
                    <option>Sudah Dinilai</option>
                </select>
                <div class="indicator">
                    <button class="btn join-item capitalize btn-primary">Set</button>
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
                        <th>Nilai</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>Blue</td>
                        <td><span class="badge badge-success">80/100</span></td>
                        <td><button class="btn btn-sm btn-neutral btn-outline capitalize"
                                onclick="modal_detail.showModal()">detail</button></td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>Blue</td>
                        <td><span class="badge badge-warning">60/100</span></td>
                        <td><button class="btn btn-sm btn-neutral btn-outline capitalize"
                                onclick="modal_detail.showModal()">detail</button></td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>Blue</td>
                        <td><span class="badge badge-error">50/100</span></td>
                        <td><button class="btn btn-sm btn-neutral btn-outline capitalize"
                                onclick="modal_detail.showModal()">detail</button></td>
                    </tr>
                    <tr>
                        <th>4</th>
                        <td>Blue</td>
                        <td><span class="badge badge-success">100/100</span></td>
                        <td><button class="btn btn-sm btn-neutral btn-outline capitalize"
                                onclick="modal_detail.showModal()">detail</button></td>
                    </tr>
                    <tr>
                        <th>5</th>
                        <td>Blue</td>
                        <td><span class="badge badge-secondary badge-outline">0/100</span></td>
                        <td><button class="btn btn-sm btn-neutral btn-outline capitalize"
                                onclick="modal_detail.showModal()">detail</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Aspects -->
    <div class="my-10">
        <h2 class="text-lg font-semibold text-black/30 mb-3">Aspek Penilaian</h2>
        <div class="bg-white p-6 rounded-lg border-2 hover:shadow">
            <h4 class="font-bold">Pelaksanaan</h4>
            <h3>12 Januari 2023 | 10.00 - 12.00</h3>
        </div>
    </div>


</div>

<!-- Judges -->
<div>
    <div class="flex gap-3 justify-between mb-3">
        <h2 class="text-lg font-semibold text-black/30 self-end">Juri</h2>
        <div class="join">
            <div>
                <input class="input input-bordered join-item" placeholder="Tambah Juri" />
            </div>
            <div class="indicator">
                <button class="btn join-item capitalize btn-primary">Tambah</button>
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
                    <th>Nama Lengkap</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>1</th>
                    <td>Cy Ganderton</td>
                    <td><button class="btn btn-sm btn-error btn-outline capitalize"
                            onclick="modal_detail.showModal()">Hapus</button></td>
                </tr>
                <tr>
                    <th>2</th>
                    <td>Cy Ganderton</td>
                    <td><button class="btn btn-sm btn-error btn-outline capitalize"
                            onclick="modal_detail.showModal()">Hapus</button></td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>Cy Ganderton</td>
                    <td><button class="btn btn-sm btn-error btn-outline capitalize"
                            onclick="modal_detail.showModal()">Hapus</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>