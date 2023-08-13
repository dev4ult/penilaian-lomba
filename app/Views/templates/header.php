<!DOCTYPE html>
<html lang="en" data-theme="corporate">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokumen</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="<?= base_url("./css/styles.css") ?>">
    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</head>

<body class="font-inter bg-purple-50 min-h-screen flex overflow-x-hidden">
    <aside class="bg-white border-r-2 p-10 min-w-[20rem]">
        <div class="flex flex-col gap-14">
            <a href="/" class="px-2 flex items-center gap-3">
                <img src="<?= base_url('./images/logo.png') ?>" class="w-10" alt="app logo" />
                <span class="font-bold">Komunitas Count Pembaris Indonesia</span>
            </a>
            <?php if (session('user_role') == 'admin') : ?>
            <a href="/contest/add" class="btn btn-primary capitalize">
                Publikasi Lomba
                <span>+</span>
            </a>
            <?php else : ?>
            <a href="/contestant/add" class="btn btn-primary capitalize">
                Registrasi Peserta
                <span>+</span>
            </a>
            <?php endif ?>


        </div>

        <div class="flex flex-col gap-4 mt-7">
            <a href="/" class="px-4 h-12 flex gap-6 items-center font-semibold hover:text-primary group">
                <img src="<?= base_url('./icons/dashboard.png') ?>" class="w-5" alt="contest logo">
                <span
                    class=" <?= $path == "dashboard" ? 'text-black' : 'text-black/30 group-hover:text-black' ?>">Dashboard</span>
            </a>
            <?php if (session('user_role') == 'admin') : ?>
            <a href="/users" class="px-4 h-12 flex gap-6 items-center font-semibold hover:text-primary group">
                <img src="<?= base_url('./icons/user.png') ?>" class="w-5" alt="contest logo">
                <span class=" <?= $path == "user" ? 'text-black' : 'text-black/30 group-hover:text-black' ?>">Akun /
                    User</span>
            </a>
            <?php endif ?>
            <a href="/contests" class="px-4 h-12 flex gap-6 items-center font-semibold hover:text-primary group">
                <img src="<?= base_url('./icons/contest.png') ?>" class="w-5" alt="contest logo">
                <span
                    class=" <?= $path == "contest" ? 'text-black' : 'text-black/30 group-hover:text-black' ?>">Lomba</span>
            </a>
            <a href="/contestants" class="px-4 h-12 flex gap-6 items-center font-semibold hover:text-primary group">
                <img src="<?= base_url('./icons/contestant.png') ?>" class="w-5" alt="contest logo">
                <span
                    class=" <?= $path == "contestant" ? 'text-black' : 'text-black/30 group-hover:text-black' ?>">Peserta</span>
            </a>
        </div>

        <div class="mt-10">
            <a href="/logout" class="btn btn-outline btn-error w-full capitalize">logout</a>
        </div>
    </aside>
    <div class="container p-10">