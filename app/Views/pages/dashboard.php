<!-- Header -->
<header class="pb-10 border-b-2 flex justify-between">
    <div class="prose">
        <h1 class="my-0 text-2xl font-extrabold">Halo, Nibras Alyassar</h1>
        <p class="mt-2">Selamat datang di Dashboard Admin</p>
    </div>
    <a href="#" class="self-end btn btn-sm btn-outline btn-error capitalize">Logout</a>
</header>

<!-- Dashboard Content -->
<main class="prose my-6">

    <!-- Management -->
    <h2 class="text-lg font-semibold text-black/30 mb-3">Manajemen</h2>
    <div class="flex gap-6">
        <!-- User -->
        <a href="/users"
            class="no-underline w-fit bg-white border-2 hover:shadow rounded-lg py-5 px-7 cursor-pointer flex gap-4 items-center">
            <div class="h-fit p-4 rounded-full bg-blue-300">
                <img src="<?= base_url('./icons/user.png') ?>" class="w-8 my-0" alt="user">
            </div>
            <div>
                <h4 class="my-0 text-black/70">User</h4>
                <h1 class="text-5xl mb-0 text-black/70">20</h1>
            </div>
        </a>

        <!-- Juri -->
        <a href="/jury"
            class="no-underline w-fit bg-white border-2 hover:shadow rounded-lg py-5 px-7 cursor-pointer flex gap-4 items-center">
            <div class="h-fit p-4 rounded-full bg-red-300">
                <img src="<?= base_url('./icons/jury.png') ?>" class="w-8 my-0" alt="juri">
            </div>
            <div>
                <h4 class="my-0 text-black/70">Juri</h4>
                <h1 class="text-5xl mb-0 text-black/70">15</h1>
            </div>
        </a>

        <!-- Lomba  -->
        <a href="/contests"
            class="no-underline w-fit bg-white border-2 hover:shadow rounded-lg py-5 px-7 cursor-pointer flex gap-4 items-center">
            <div class="h-fit p-4 rounded-full bg-purple-300">
                <img src="<?= base_url('./icons/contest.png') ?>" class="w-8 my-0" alt="lomba">
            </div>
            <div>
                <h4 class="my-0 text-black/70">Lomba</h4>
                <h1 class="text-5xl mb-0 text-black/70">34</h1>
            </div>
        </a>
    </div>


    <!-- Statistic -->
    <h2 class="text-lg font-semibold text-black/30 mb-3 mt-10">Statistik</h2>
    <div class="flex gap-6">
        <div class="p-4 rounded-lg border-2 bg-white hover:shadow">
            <div id="chart" class="min-w-[30rem]"></div>
        </div>
        <div class="p-4 rounded-lg border-2 bg-white hover:shadow">
            <div id="chart-donut" class="min-w-[30rem]"></div>
        </div>
    </div>
</main>


<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="<?= base_url('./js/dashboardChart.js') ?>"></script>