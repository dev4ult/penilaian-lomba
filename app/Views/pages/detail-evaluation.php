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
            <li><a href="/contest/<?= $contest['contest_id'] ?>"
                    class="text-primary"><?= $contest['contest_name'] ?></a></li>
            <li><span class="badge badge-neutral rounded-full">Kategori Penilaian</span></li>
        </ul>
    </div>
</header>

<div class="my-10">

    <!-- contest-id -->
    <input type="number" id="contest-id" name="contest-id" value="<?= $contest['contest_id'] ?>" class="hidden" />


    <div class="flex gap-3 justify-between mb-6">
        <div class="join">
            <input type="radio" name="view-edit" class="view-edit-btn btn btn-sm capitalize" aria-label="edit" />
            <input type="radio" name="view-edit" class="view-edit-btn btn btn-sm capitalize" aria-label="view"
                checked />
        </div>

        <div class="tabs bg-white border-2 tabs-boxed w-fit self-start">
            <?php foreach ($categories as $index => $category) : ?>
            <button type="button" id="select-tab-<?= $category['eval_category_id'] ?>"
                class="tab <?= $index == 0 ? "tab-active" : "" ?>"><?= $category['category_name'] ?></button>
            <?php endforeach ?>
        </div>
    </div>

    <?php foreach ($categories as $index => $category) : ?>
    <div id="category-container-<?= $category['eval_category_id'] ?>"
        class="category-container <?= $index == 0 ? "" : "hidden" ?>">
        <div class="view-mode">
            <div id="aspect-val-container" class="my-6">
                <div class="overflow-x-auto my-6">
                    <p class="mb-3 text-black/50"><span class="text-black">Keterangan :</span> Lorem ipsum dolor, sit
                        amet
                        consectetur adipisicing elit. Eos, tempore!</p>
                    <table class="table table-lg bg-white border-2">
                        <thead>
                            <tr class="text-base text-center">
                                <th class="border-2">A</th>
                                <th class="text-left border-2">
                                    <h3 class="font-semibold text-lg">Gerakan Ditempat</h3>
                                </th>
                                <th colspan="2" class="border-2">Kurang</th>
                                <th colspan="2" class="border-2">Cukup</th>
                                <th colspan="2" class="border-2">Baik</th>
                                <th colspan="2" class="border-2">Sangat Baik</th>
                            </tr>
                        </thead>
                        <tbody id="aspect-container-1">
                            <tr id="tr-aspect-1-1" class="text-xl font-semibold ">
                                <td class="border-2">1</td>
                                <td class="border-2">
                                    <h4>Sikap Sempurna</h4>
                                </td>
                                <td class="border-2 p-2" class="btn">
                                    <label>
                                        <input type="radio" class="hidden peer" name="options-1" />
                                        <span class="btn w-full peer-checked:btn-primary">1</span>
                                    </label>
                                </td>
                                <td class="border-2 p-2">
                                    <label>
                                        <input type="radio" class="hidden peer" name="options-1" />
                                        <span class="btn w-full peer-checked:btn-primary">2</span>
                                    </label>
                                </td>
                                <td class="border-2 p-2">
                                    <label>
                                        <input type="radio" class="hidden peer" name="options-1" />
                                        <span class="btn w-full peer-checked:btn-primary">3</span>
                                    </label>
                                </td>
                                <td class="border-2 p-2">
                                    <label>
                                        <input type="radio" class="hidden peer" name="options-1" />
                                        <span class="btn w-full peer-checked:btn-primary">4</span>
                                    </label>
                                </td>
                                <td class="border-2 p-2">
                                    <label>
                                        <input type="radio" class="hidden peer" name="options-1" />
                                        <span class="btn w-full peer-checked:btn-primary">5</span>
                                    </label>
                                </td>
                                <td class="border-2 p-2">
                                    <label>
                                        <input type="radio" class="hidden peer" name="options-1" />
                                        <span class="btn w-full peer-checked:btn-primary">6</span>
                                    </label>
                                </td>
                                <td class="border-2 p-2">
                                    <label>
                                        <input type="radio" class="hidden peer" name="options-1" />
                                        <span class="btn w-full peer-checked:btn-primary">7</span>
                                    </label>
                                </td>
                                <td class="border-2 p-2">
                                    <label>
                                        <input type="radio" class="hidden peer" name="options-1" />
                                        <span class="btn w-full peer-checked:btn-primary">8</span>
                                    </label>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="edit-mode hidden">
            <div class="flex gap-5 justify-between">

                <div class="flex gap-5">
                    <div class="flex flex-col gap-1">
                        <label for="category-name-<?= $category['eval_category_id'] ?>"
                            class="text-sm font-semibold">Ubah Nama
                            Kategori</label>
                        <input type="text" id="category-name-<?= $category['eval_category_id'] ?>"
                            name="category-name-<?= $category['eval_category_id'] ?>" class="input input-bordered"
                            placeholder="Isikan Nama Kategori" value="<?= $category['category_name'] ?>" required />
                    </div>

                    <button type="button" id="add-sub-category-<?= $category['eval_category_id'] ?>"
                        class="add-sub-category btn btn-primary capitalize btn-outline self-end">tambah sub
                        kategori</button>
                </div>


                <a class="btn btn-error btn-outline capitalize self-end">hapus kategori
                    <?= $category['category_name'] ?></a>
            </div>

            <div id="sub-category-container-<?= $category['eval_category_id'] ?>" class="my-6">
                <p>Belum ada sub kategori dan aspek penilaian ...</p>
            </div>

            <?php $category_id = $category['eval_category_id'] ?>

            <input type="number" name="category-id" value="<?= $category_id ?>" class="hidden" />

            <div class="text-right">
                <button type="submit" id="save-eval-aspect-<?= $category_id ?>"
                    class="save-eval-aspect-btn btn btn-warning capitalize <?= $total_sub_categories[$category_id] > 0 ? "" : "hidden" ?>">simpan
                    perubahan</button>
            </div>
        </div>
    </div>
    <?php endforeach ?>
</div>



<script src="<?= base_url('./js/manageAspectEval.js') ?>"></script>

<script>
let charCode;

<?php foreach ($categories as $category) : ?>
<?php $category_id = $category['eval_category_id'] ?>
subCategoryData["<?= $category_id ?>"] = [];
charCode = 65;
<?php foreach ($sub_categories as $index => $sub_category) : ?>
<?php $sub_category_id = $sub_category['eval_sub_category_id'] ?>

<?php if ($sub_category['eval_category_id'] == $category_id) : ?>
subCategoryData["<?= $category_id ?>"].push({
    categoryId: <?= $category_id ?>,
    subCategoryName: '<?= $sub_category['sub_category_name'] ?>',
    charCode,
    aspects: [],
})
charCode++;


<?php foreach ($evaluation_aspects as $aspect) : ?>
<?php if ($aspect['eval_sub_category_id'] == $sub_category_id) : ?>
subCategoryData["<?= $category_id ?>"][<?= $index ?>].aspects.push({
    aspectId: <?= $aspect['aspect_id'] ?>,
    name: '<?= $aspect['aspect_name'] ?>',
    range: <?= $aspect['aspect_range_id'] ?>
})
<?php endif ?>
<?php endforeach ?>
<?php endif ?>

<?php endforeach ?>
$('.sub-category-container').html('');

subCategoryData[<?= $category_id ?>].forEach((data, subCategoryIndex) => {
    $(`#sub-category-container-${<?= $category_id ?>}`).append(subCategoryHtml(String.fromCharCode(data
            .charCode), data
        .subCategoryName, <?= $category_id ?>, subCategoryIndex));

    data.aspects.forEach((item, aIndex) => {
        $(`#aspect-container-${<?= $category_id ?>}-${subCategoryIndex}`).append(aspectRowHtml(aIndex,
            <?= $category_id ?>,
            subCategoryIndex, item['name'], item['range']));
    });
});
<?php endforeach ?>
</script>

<script src="<?= base_url("./js/changeTabEval.js") ?>"></script>