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
            <li><a href="/contest/<?= $contest['contest_id'] ?>" class="text-primary"><?= $contest['contest_name'] ?></a></li>
            <li><span class="badge badge-neutral rounded-full">Kategori Penilaian</span></li>
        </ul>
    </div>
</header>

<div class="my-10">
    <div class="flex gap-3 justify-between items-center mb-10">
        <div class="flex gap-5 items-center">
            <div class="join">
                <input type="radio" name="view-edit" class="view-edit-btn btn capitalize" aria-label="edit" />
                <input type="radio" name="view-edit" class="view-edit-btn btn capitalize" aria-label="view" checked />
            </div>
            <button type="button" class="btn btn-primary btn-outline capitalize" onclick="add_modal.showModal()">tambah
                kategori</button>
        </div>

        <div class="tabs bg-white border-2 tabs-boxed w-fit self-start">
            <?php foreach ($categories as $index => $category) : ?>
                <button type="button" id="select-tab-<?= $category['eval_category_id'] ?>-<?= $index ?>" class="tab <?= $index == 0 ? "tab-active" : "" ?>"><?= $category['category_name'] ?></button>
            <?php endforeach ?>
        </div>

    </div>

    <?php foreach ($categories as $index => $category) : ?>
        <div id="category-container-<?= $category['eval_category_id'] ?>" class="category-container <?= $index == 0 ? "" : "hidden" ?>">
            <div class="view-mode">
                <div id="aspect-val-container" class="my-6">
                    <div class="my-6">
                        <p class="mb-3 text-black/50"><span class="text-black">Keterangan :</span> Berikut merupakan
                            simulasi atau tampilan penilaian peserta dari lomba ini</p>
                        <div class="overflow-x-auto" id="sub-category-container-view-<?= $category['eval_category_id'] ?>">
                            <p>Belum ada sub kategori dan aspek penilaian ...</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="edit-mode hidden">
                <div class="flex gap-5 justify-between">

                    <div class="flex gap-5">
                        <div class="flex flex-col gap-1">
                            <label for="category-name-<?= $category['eval_category_id'] ?>" class="text-sm font-semibold">Ubah Nama
                                Kategori</label>
                            <input type="text" id="category-name-<?= $category['eval_category_id'] ?>" name="category-name-<?= $category['eval_category_id'] ?>" class="input input-bordered" placeholder="Isikan Nama Kategori" value="<?= $category['category_name'] ?>" required />
                        </div>

                        <button type="button" id="add-sub-category-<?= $category['eval_category_id'] ?>" class="add-sub-category btn btn-primary capitalize btn-outline self-end">tambah sub
                            kategori</button>
                    </div>


                    <button type="button" id="delete-category-<?= $category['eval_category_id'] ?>-<?= $category['category_name'] ?>" class="delete-category-btn btn btn-error btn-outline capitalize self-end">hapus kategori
                        <?= $category['category_name'] ?></button>
                </div>

                <div id="sub-category-container-<?= $category['eval_category_id'] ?>" class="my-6">
                    <p>Belum ada sub kategori dan aspek penilaian ...</p>
                </div>

                <?php $category_id = $category['eval_category_id'] ?>

                <input type="number" name="category-id" value="<?= $category_id ?>" class="hidden" />

                <div class="text-right">
                    <button type="submit" id="save-eval-aspect-<?= $category_id ?>" class="save-eval-aspect-btn btn btn-warning capitalize <?= $total_sub_categories[$category_id] > 0 ? "" : "hidden" ?>">simpan
                        perubahan</button>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<!-- Modal Add Category -->
<dialog id="add_modal" class="modal">
    <form id="form-add-category" action="/contest/evaluation-aspect/add" method="post" class="modal-box p-8 relative">
        <h3 class="badge badge-lg badge-neutral mb-3">Form Tambah</h3>
        <p class="mb-6">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est, rem.</p>

        <!-- contest-id -->
        <input type="number" id="contest-id" name="contest-id" value="<?= $contest['contest_id'] ?>" class="hidden" />

        <hr class="mb-6">

        <div class="grid grid-flow-row grid-cols-2 gap-6">
            <!-- Category -->
            <div class="flex flex-col gap-1 w-full col-span-2">
                <label for="category-add-name" class="text-sm font-semibold">Nama Kategori</label>
                <input type="text" id="category-add-name" name="category-name" class="input input-bordered" placeholder="Isikan Nama Kategori" required />
            </div>

            <hr class="col-span-2">

            <button type="submit" class="btn btn-primary capitalize w-full col-span-2">submit</button>
        </div>

        <div class="modal-action my-0">
            <button type="button" id="close-edit-modal" onclick="add_modal.close()" class="absolute top-0 right-0 m-8 btn btn-sm btn-square btn-outline">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </form>
</dialog>

<!-- Modal Delete Confirmation -->
<dialog id="delete_modal" class="modal">
    <form id="form-confirm-delete" method="dialog" class="modal-box p-8">
        <h3 class="badge badge-lg badge-neutral mb-3">Konfirmasi Hapus</h3>
        <p class="mb-6">Apakah anda yakin untuk menghapus Sub Kategori <span id="sub-category-delete" class="font-bold"></span>?
            <span class="text-error">Menghapus Sub Kategori akan menghapus semua Aspek Penilaian yang berada
                dibawahnya</span>
        </p>

        <div class="modal-action my-0">
            <button type="button" id="confirm-delete" class="btn btn-sm btn-outline btn-error capitalize hidden">Iya</button>
            <button type="button" id="confirm-no-delete" onclick="delete_modal.close()" type="button" class="btn btn-sm btn-neutral capitalize">
                Tidak
            </button>
        </div>
    </form>
</dialog>

<!-- Modal Delete Confirmation -->
<dialog id="delete_category_modal" class="modal">
    <form id="form-confirm-delete" method="dialog" class="modal-box p-8">
        <h3 class="badge badge-lg badge-neutral mb-3">Konfirmasi Hapus</h3>
        <p class="mb-6">Apakah anda yakin untuk menghapus Kategori <span id="category-delete" class="font-bold"></span>?
            <span class="text-error">Menghapus Kategori akan menghapus semua Sub Kategori dan Aspek Penilaian yang
                berada
                dibawahnya</span>
        </p>

        <div class="modal-action my-0">
            <a id="confirm-delete-category" class="btn btn-sm btn-outline btn-error capitalize hidden">Iya</a>
            <button type="button" id="confirm-no-delete" onclick="delete_category_modal.close()" type="button" class="btn btn-sm btn-neutral capitalize">
                Tidak
            </button>
        </div>
    </form>
</dialog>

<script src="<?= base_url("./js/changeTabEval.js") ?>"></script>
<script src="<?= base_url('./js/manageAspectEval.js') ?>"></script>

<script>
    let charCode;
    let aspectIndex;

    <?php foreach ($categories as $category) : ?>
        <?php $category_id = $category['eval_category_id'] ?>
        subCategoryData["<?= $category_id ?>"] = [];
        charCode = 65;
        aspectIndex = 0;
        <?php foreach ($sub_categories as $index => $sub_category) : ?>
            <?php $sub_category_id = $sub_category['eval_sub_category_id'] ?>

            <?php if ($sub_category['eval_category_id'] == $category_id) : ?>
                subCategoryData["<?= $category_id ?>"].push({
                    subCategoryId: <?= $sub_category_id ?>,
                    subCategoryName: '<?= $sub_category['sub_category_name'] ?>',
                    charCode,
                    aspects: [],
                })
                charCode++;


                <?php foreach ($evaluation_aspects as $aspect) : ?>
                    <?php if ($aspect['eval_sub_category_id'] == $sub_category_id) : ?>
                        subCategoryData["<?= $category_id ?>"][aspectIndex].aspects.push({
                            aspectId: <?= $aspect['aspect_id'] ?>,
                            name: '<?= $aspect['aspect_name'] ?>',
                            range: <?= $aspect['aspect_range_id'] ?>
                        })
                    <?php endif ?>
                <?php endforeach ?>
                aspectIndex++;
            <?php endif ?>
        <?php endforeach ?>
        $('#sub-category-container-<?= $category_id ?>').html('');
        $('#sub-category-container-view-<?= $category_id ?>').html('');

        subCategoryData[<?= $category_id ?>].forEach((data, subCategoryIndex) => {
            $(`#sub-category-container-${<?= $category_id ?>}`).append(subCategoryHtml(String.fromCharCode(data
                    .charCode), data
                .subCategoryName, <?= $category_id ?>, subCategoryIndex));

            $(`#sub-category-container-view-${<?= $category_id ?>}`).append(subCategoryViewHtml(String.fromCharCode(data
                    .charCode), data
                .subCategoryName, <?= $category_id ?>, subCategoryIndex));

            data.aspects.forEach((item, aIndex) => {
                $(`#aspect-container-${<?= $category_id ?>}-${subCategoryIndex}`).append(aspectRowHtml(aIndex,
                    <?= $category_id ?>,
                    subCategoryIndex, item['name'], item['range']));

                $(`#aspect-container-view-${<?= $category_id ?>}-${subCategoryIndex}`).append(aspectRowViewHtml(
                    aIndex + 1,
                    <?= $category_id ?>,
                    subCategoryIndex, item['name'], item['range']));
            });
        });
    <?php endforeach ?>
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