<!-- Header -->
<header class="pb-10 border-b-2 flex justify-between gap-3">
    <div class="prose ">
        <h1 class="text-2xl font-extrabold my-0">Kategori Penilaian</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione porro quas magni, nam perspiciatis
            voluptatum!</p>
    </div>

    <!-- Breadcrumbs -->
    <div class="text-sm breadcrumbs flex-shrink-0 self-end">
        <ul>
            <li><a href="/" class="text-primary">Dashboard</a></li>
            <li><a href="/contests" class="text-primary">Lomba</a></li>
            <li><a href="/contest/1" class="text-primary">Adzan Senior</a></li>
            <li><span class="badge badge-neutral rounded-full">Kategori Penilaian</span></li>
        </ul>
    </div>
</header>

<div class="my-10">
    <div class="flex gap-3 justify-between mb-6">
        <div class="join">
            <input type="radio" name="view-edit" class="view-edit-btn btn btn-sm capitalize" aria-label="edit" />
            <input type="radio" name="view-edit" class="view-edit-btn btn btn-sm capitalize" aria-label="preview"
                checked />
        </div>

        <div class="tabs tabs-boxed w-fit self-start">
            <button type="button" id="select-tab-1" class="tab">PBB & Danton</button>
            <button type="button" id="select-tab-2" class="tab tab-active">Kostum</button>
            <button type="button" id="select-tab-3" class="tab">Makeup</button>
        </div>
    </div>

    <div id="edit-mode" class="my-6 hidden">
        <button type="button" id="add-sub-category" class="btn btn-sm btn-primary capitalize btn-outline">tambah sub
            kategori</button>

        <div id="sub-category-container" class="my-6">
            <p>Belum ada sub kategori dan aspek penilaian ...</p>
        </div>

        <div class="text-right">
            <button id="save-eval-aspect" class="btn btn-warning capitalize hidden">simpan perubahan</button>
        </div>
    </div>

    <div id="preview-mode" class="my-6">
        <div id="aspect-val-container" class="my-6">
            <p>Belum ada sub kategori dan aspek penilaian ...</p>
        </div>
    </div>



</div>

<script src="<?= base_url('./js/manageAspectEval.js') ?>"></script>