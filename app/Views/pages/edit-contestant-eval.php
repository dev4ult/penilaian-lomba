<!-- Header -->
<header class="pb-10 border-b-2 flex justify-between">
    <div class="prose ">
        <h1 class="text-2xl font-extrabold my-0">Penilaian Peserta</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ratione porro quas magni, nam perspiciatis
            voluptatum!</p>
    </div>

    <!-- Breadcrumbs -->
    <div class="text-sm breadcrumbs self-end">
        <ul>
            <li><a href="/" class="text-primary">Dashboard</a></li>
            <li><a href="/contests" class="text-primary">Lomba</a></li>
            <li><a href="/contest/<?= $contest['contest_id'] ?>"
                    class="text-primary"><?= $contest['contest_name'] ?></a></li>
            <li><span class="badge badge-neutral rounded-full">Penilaian</span></li>
        </ul>
    </div>
</header>

<div class="my-10">
    <div class="flex gap-3 justify-between">
        <div class="p-3 rounded bg-white border-2">
            <p><span class="badge badge-neutral">Tim / Peserta</span> : <?= $contestant['team_name'] ?> /
                <?= $contestant['leader'] ?></p>
        </div>

        <div class="tabs bg-white border-2 tabs-boxed w-fit self-start">
            <?php foreach ($categories as $index => $category) : ?>
            <button type="button" id="select-tab-<?= $category['eval_category_id'] ?>-<?= $index ?>"
                class="tab <?= $index == 0 ? "tab-active" : "" ?>"><?= $category['category_name'] ?></button>
            <?php endforeach ?>
        </div>
    </div>

    <input type="number" id="total-categories" name="total-categories" value="<?= count($categories) ?>"
        class="hidden" />

    <form action="/contest/contestant-evaluation/put" method="post">
        <input type="number" id="contest-id" name="contest-id" value="<?= $contest['contest_id'] ?>" class="hidden" />
        <input type="number" id="contestant-id" name="contestant-id" value="<?= $contestant['contestant_id'] ?>"
            class="hidden" />
        <?php foreach ($categories as $index_category => $category) : ?>
        <?php $index = 0 ?>
        <?php $category_id = $category['eval_category_id']  ?>

        <!-- Category Container -->
        <div id="category-container-<?= $category_id  ?>"
            class="my-6 category-container <?= $index_category != 0 ? 'hidden' : '' ?>">
            <?php $index_sub = 0 ?>
            <?php foreach ($sub_categories as $sub_category) : ?>
            <?php $sub_category_id = $sub_category['eval_sub_category_id']  ?>

            <?php if ($sub_category['eval_category_id'] == $category_id) : ?>
            <div id="sub-category-<?= $sub_category_id ?>" class="overflow-x-auto my-6">
                <table class="table table-lg bg-white border-2">
                    <thead>
                        <tr class="text-base text-center">
                            <th class="border-2"><?= chr($index + $index_sub + 65) ?></th>
                            <th class="text-left border-2">
                                <h3 class="font-semibold text-lg"><?= $sub_category['sub_category_name'] ?></h3>
                            </th>
                            <th colspan="2" class="border-2">Kurang</th>
                            <th colspan="2" class="border-2">Cukup</th>
                            <th colspan="2" class="border-2">Baik</th>
                            <th colspan="2" class="border-2">Sangat Baik</th>
                        </tr>
                    </thead>
                    <tbody id="aspect-container-<?= $category_id ?>-<?= $sub_category_id ?>">
                        <?php $index_aspect = 0 ?>
                        <?php foreach ($evaluation_aspects as $aspect) : ?>
                        <?php $aspect_id = $aspect['aspect_id'] ?>

                        <?php if ($aspect['eval_sub_category_id'] == $sub_category_id) : ?>
                        <tr id="tr-aspect-1-1" class="text-xl font-semibold ">
                            <td class="border-2 text-center"><?= $index_aspect + 1 ?></td>
                            <td class="border-2">
                                <h4><?= $aspect['aspect_name'] ?></h4>
                            </td>

                            <?php for ($i = 0; $i < 8; $i++) : ?>
                            <td class="border-2 p-2" class="btn">
                                <label>
                                    <input type="radio" class="hidden peer" name="options-<?= $aspect_id ?>"
                                        value="<?= $aspect['aspect_range_id'] + $i ?>" required />
                                    <span
                                        class="btn w-full peer-checked:btn-primary"><?= $aspect['aspect_range_id'] + $i ?></span>
                                </label>
                            </td>
                            <?php endfor ?>

                        </tr>
                        <?php $index_aspect = $index_aspect + 1 ?>
                        <?php endif ?>

                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <?php $index_sub = $index_sub + 1 ?>
            <?php endif ?>

            <?php endforeach ?>
        </div>

        <?php $index = $index + 1 ?>
        <?php endforeach ?>


        <div class="flex gap-3 justify-between">
            <button type="button" id="prev-btn" class="btn btn-primary capitalize hidden">sebelumnya</button>
            <button type="button" id="next-btn" class="btn btn-primary capitalize ml-auto">selanjutnya</button>
            <button type="submit" id="submit-btn" class="btn btn-warning capitalize hidden">submit / simpan
                penilaian</button>
        </div>
    </form>
</div>

<script>
let totalCategories = $('#total-categories').val()
</script>

<script src="<?= base_url("./js/changeTabEval.js") ?>"></script>
<script src="<?= base_url("./js/evalPageNextAndPrevChange.js") ?>"></script>