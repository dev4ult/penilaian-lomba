<!-- Header -->
<header class="pb-10 border-b-2 flex justify-between">
    <div class="prose">
        <h1 class="text-2xl font-extrabold">Manajemen Lomba</h1>
        <p>Pengelolaan data user untuk aksesibilitas ke aplikasi dan pengaturan peranan atau tugas terhadap user</p>
    </div>

    <!-- Breadcrumbs -->
    <div class="text-sm breadcrumbs self-end">
        <ul>
            <li><a href="/" class="text-primary">Dashboard</a></li>
            <li><span class="badge badge-neutral rounded-full">Lomba</span></li>
        </ul>
    </div>
</header>

<!-- Manage Input / Button -->
<div class="flex gap-3 justify-between mb-6 my-10">
    <!-- Modal Form -->
    <a href="/contest/add" class="btn btn-neutral capitalize btn-outline self-end">Tambah / Publikasi Lomba</a>

    <!-- Search Input -->
    <div class="join">
        <div>
            <input class="input input-bordered join-item" placeholder="Cari Lomba" />
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

<div class="grid grid-flow-row grid-cols-4 gap-5">
    <?php foreach ($contests as $contest) : ?>
        <div class="bg-white rounded-lg border-2 hover:shadow overflow-hidden">
            <img src="<?= $contest['picture'] ? 'data:image/jpg;base64,' . base64_encode($contest['picture']) :
                            base_url('./images/default-card/' . rand(1, 4) . '.png') ?>" class="w-full h-52" alt="default" />
            <div class="p-6">
                <div class="prose">
                    <h2 class="mt-0 mb-2"><?= $contest['contest_name'] ?></h2>
                    <p class="line-clamp-2"><?= $contest['description'] ?></p>
                </div>
                <a href="/contest/<?= $contest['contest_id'] ?>" class="btn btn-neutral btn-sm capitalize mt-3 text-right">lihat detail</a>
            </div>
        </div>
    <?php endforeach ?>
</div>

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