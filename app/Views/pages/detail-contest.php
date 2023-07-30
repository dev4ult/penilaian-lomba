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

<div class="my-10 grid grid-flow-row grid-cols-2 gap-10">

    <!-- Description -->
    <div class="">
        <h2 class="text-lg font-semibold text-black/30 mb-3">Deskripsi</h2>
        <p class="leading-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae enim sed quaerat
            pariatur quo laudantium
            dolorem!
            Libero sit nihil suscipit dignissimos laborum saepe officia nesciunt quo repella</p>
    </div>

    <div class="text-right">
        <a href="/contest/edit" class="btn btn-warning capitalize">edit informasi / Penugasan</a>
    </div>


    <!-- Informatian Detail -->
    <div class="col-span-2">
        <h2 class="text-lg font-semibold text-black/30 mb-3">Informasi Pelaksanaan</h2>
        <div class="bg-white p-6 rounded-lg border-2 hover:shadow grid grid-flow grid-cols-3 gap-4">
            <div>
                <h4 class="font-semibold text-sm text-black/50">Tanggal</h4>
                <h3 class="font-bold">12 Januari 2023</h3>
            </div>
            <div>
                <h4 class="font-semibold text-sm text-black/50">Waktu</h4>
                <h3 class="font-bold">13.00 - 14.00</h3>
            </div>
            <div>
                <h4 class="font-semibold text-sm text-black/50">Penyelenggara</h4>
                <h3 class="font-bold">Ahmah Reza Maulana</h3>
            </div>
            <div>
                <h4 class="font-semibold text-sm text-black/50">Tempat</h4>
                <h3 class="font-bold">Aula 303</h3>
            </div>
            <div>
                <h4 class="font-semibold text-sm text-black/50">Jumlah Peserta</h4>
                <h3 class="font-bold">45</h3>
            </div>
        </div>
    </div>


</div>

<div class="my-10 py-10 border-y-2 grid grid-flow-row grid-cols-2 gap-10">
    <!-- Aspects -->
    <div>
        <h2 class="text-lg font-semibold text-black/30 mb-3">Aspek Penilaian</h2>

        <div class="overflow-x-auto">
            <table class="table table-zebra bg-white border-2">
                <thead>
                    <tr class="bg-secondary text-secondary-content">
                        <th></th>
                        <th>Aspek</th>
                        <th>Range Nilai</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>Cy Ganderton</td>
                        <td>1-8</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>Cy Ganderton</td>
                        <td>1-8</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>Cy Ganderton</td>
                        <td>1-8</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <p class="mt-2 text-black/60 text-sm"><span class="text-black">Keterangan :</span> Range Nilai merupakan
            ketentuan nilai terkecil dan terbesar dari suatu aspek penilaian lomba</p>
    </div>

    <!-- Judges -->
    <div>
        <h2 class="text-lg font-semibold text-black/30 mb-3">Juri</h2>

        <div class="overflow-x-auto">
            <table class="table table-zebra bg-white border-2">
                <thead>
                    <tr class="bg-accent text-accent-content">
                        <th></th>
                        <th>Nama Lengkap</th>
                        <th>Nomor Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                        <td>Cy Ganderton</td>
                        <td>080000000000</td>
                    </tr>
                    <tr>
                        <th>2</th>
                        <td>Cy Ganderton</td>
                        <td>080000000000</td>
                    </tr>
                    <tr>
                        <th>3</th>
                        <td>Cy Ganderton</td>
                        <td>080000000000</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Contestant -->
<div class="my-10">
    <div class="flex gap-3 justify-between mb-3">
        <h2 class="text-lg font-semibold text-black/30 self-end">Peserta</h2>
        <div class="join">
            <button class="btn btn-neutral btn-outline capitalize mr-4">Tambah Peserta</button>
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
                    <td><button class="btn btn-sm btn-neutral btn-outline capitalize" onclick="modal_detail.showModal()">detail</button></td>
                </tr>
                <tr>
                    <th>2</th>
                    <td>Blue</td>
                    <td><span class="badge badge-warning">60/100</span></td>
                    <td><button class="btn btn-sm btn-neutral btn-outline capitalize" onclick="modal_detail.showModal()">detail</button></td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>Blue</td>
                    <td><span class="badge badge-error">50/100</span></td>
                    <td><button class="btn btn-sm btn-neutral btn-outline capitalize" onclick="modal_detail.showModal()">detail</button></td>
                </tr>
                <tr>
                    <th>4</th>
                    <td>Blue</td>
                    <td><span class="badge badge-success">100/100</span></td>
                    <td><button class="btn btn-sm btn-neutral btn-outline capitalize" onclick="modal_detail.showModal()">detail</button></td>
                </tr>
                <tr>
                    <th>5</th>
                    <td>Blue</td>
                    <td><span class="badge badge-secondary badge-outline">0/100</span></td>
                    <td><button class="btn btn-sm btn-neutral btn-outline capitalize" onclick="modal_detail.showModal()">detail</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>