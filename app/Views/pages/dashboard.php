<!-- Header -->
<header class="pb-10 border-b-2 flex justify-between ">
    <div class="prose">
        <h1 class="my-0 text-2xl font-extrabold">Halo, <?= $user['full_name'] ?></h1>
        <p>Selamat datang di Dashboard Admin.</p>
    </div>
    <a href="/logout" class="self-end btn btn-sm btn-outline btn-error capitalize">Logout</a>
</header>

<!-- Dashboard Content -->
<main class="my-6 w-full">

    <!-- Management -->
    <div>
        <h2 class="text-lg font-semibold text-black/30 mb-3">Manajemen</h2>
        <div class="flex gap-6 w-full">

            <?php if (session('user_role') == 'admin') : ?>
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



            <!-- contestant  -->
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

            <!-- contest  -->
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

        </div>
    </div>

    <!-- Statistic -->
    <div class="mt-10">
        <h2 class="text-lg font-semibold text-black/30 mb-3">Statistik Jumlah Peserta Terdaftar</h2>
        <div class="">
            <div class="p-4 rounded-lg border-2 bg-white hover:shadow">
                <div id="chart" class="min-w-[30rem]"></div>
            </div>

        </div>
    </div>

</main>

<hr>

<!-- attribute -->
<footer class="my-6">
    <h2 class="text-lg font-semibold text-black/30 mb-3">Atribusi Icon</h2>
    <a class="underline text-primary" href="https://www.flaticon.com/free-icons/dashboard"
        title="dashboard icons">Dashboard icons created by Pixel
        perfect - Flaticon</a>
    <a class="underline text-primary" href="https://www.flaticon.com/free-icons/user" title="user icons">User icons
        created by Freepik - Flaticon</a>
    <a class="underline text-primary" href="https://www.flaticon.com/free-icons/prize" title="prize icons">Prize icons
        created by fjstudio -
        Flaticon</a>
    <a class="underline text-primary" href="https://www.flaticon.com/free-icons/user" title="user icons">User icons
        created by Freepik - Flaticon</a>
</footer>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
var options = {
    series: [{
        data: [
            <?php foreach ($contests as $contest) : ?>
            <?php $total_reg = 0 ?>
            <?php foreach ($reg_contestants as $contestant) : ?>
            <?php if ($contest['contest_id'] == $contestant['contest_id']) : ?>
            <?php $total_reg += 1 ?>
            <?php endif ?>
            <?php endforeach ?>
            <?= (int) $total_reg ?>,
            <?php endforeach ?>
        ],
    }, ],
    chart: {
        type: 'bar',
        height: 250,
    },
    plotOptions: {
        bar: {
            borderRadius: 3,
        },
    },
    dataLabels: {
        enabled: false,
    },
    xaxis: {
        categories: [
            <?php foreach ($contests as $contest) : ?> '<?= $contest['contest_name'] ?>',
            <?php endforeach ?>
        ],
    },
};

var chart = new ApexCharts(document.querySelector('#chart'), options);
chart.render();
</script>

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