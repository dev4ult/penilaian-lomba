<!-- Header -->
<header class="pb-10 border-b-2 flex justify-between ">
    <div class="prose">
        <h1 class="my-0 text-2xl font-extrabold">Halo, <?= $user['full_name'] ?></h1>
        <p>Selamat datang di Dashboard Admin</p>
    </div>
    <a href="/logout" class="self-end btn btn-sm btn-outline btn-error capitalize">Logout</a>
</header>

<!-- Dashboard Content -->
<main class="my-6 w-full">

    <!-- Management -->
    <div>
        <h2 class="text-lg font-semibold text-black/30 mb-3">Manajemen</h2>
        <div class="flex gap-6 w-full">

            <?php if(session('user_role') == 'admin') : ?>
            <!-- User -->
            <a href="/users"
                class="no-underline w-fit bg-white border-2 hover:shadow rounded-lg py-5 px-7 cursor-pointer flex gap-4 items-center">
                <div class="h-fit p-4 rounded-full bg-blue-300">
                    <img src="<?= base_url('./icons/user.png') ?>" class="w-8 h-8 my-0" alt="user">
                </div>
                <div class="">
                    <h4 class="font-medium">Akun</h4>
                    <h1 class="text-5xl mb-0 font-semibold"><?= $total_users ?></h1>
                </div>
            </a>
            <?php endif ?>

            <!-- Lomba  -->
            <a href="/contests"
                class="no-underline w-fit bg-white border-2 hover:shadow rounded-lg py-5 px-7 cursor-pointer flex gap-4 items-center">
                <div class="h-fit p-4 rounded-full bg-purple-300">
                    <img src="<?= base_url('./icons/contest.png') ?>" class="w-8 h-8 my-0" alt="lomba">
                </div>
                <div class="">
                    <h4 class="font-medium">Lomba</h4>
                    <h1 class="text-5xl mb-0 font-semibold"><?= $total_contests ?></h1>
                </div>
            </a>

            <!-- Lomba  -->
            <a href="/contestants"
                class="no-underline w-fit bg-white border-2 hover:shadow rounded-lg py-5 px-7 cursor-pointer flex gap-4 items-center">
                <div class="h-fit p-4 rounded-full bg-orange-300">
                    <img src="<?= base_url('./icons/contestant.png') ?>" class="w-8 h-8 my-0" alt="peserta">
                </div>
                <div class="">
                    <h4 class="font-medium">Peserta</h4>
                    <h1 class="text-5xl mb-0 font-semibold"><?= $total_contestants ?></h1>
                </div>
            </a>

        </div>
    </div>

    <!-- Statistic -->
    <div class="mt-10">
        <h2 class="text-lg font-semibold text-black/30 mb-3">Statistik</h2>
        <div class="grid grid-flow-row grid-cols-2 gap-6">
            <div class="p-4 rounded-lg border-2 bg-white hover:shadow">
                <div id="chart" class="min-w-[30rem]"></div>
            </div>
            <div class="p-4 rounded-lg border-2 bg-white hover:shadow">
                <div id="chart-donut" class="min-w-[30rem]"></div>
            </div>
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="<?= base_url('./js/dashboardChart.js') ?>"></script>

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