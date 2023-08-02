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
            <input type="radio" name="view-edit" class="view-edit-btn btn btn-sm capitalize" aria-label="view"
                checked />
        </div>

        <div class="tabs bg-white border-2 tabs-boxed w-fit self-start">
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

    <div id="view-mode" class="my-6">
        <div id="aspect-val-container" class="my-6">
            <div class="overflow-x-auto my-6">
                <table class="table table-lg bg-white border-2">
                    <thead>
                        <tr class="text-base text-center">
                            <th class="border-2">A</th>
                            <th class="text-left border-2">
                                <h3 class="font-bold text-xl">Gerakan Ditempat</h3>
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
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">1</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">2</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">3</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">4</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">5</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">6</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">7</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">8</span>
                                </label>
                            </td>
                        </tr>
                        <tr id="tr-aspect-2-1" class="text-xl font-semibold ">
                            <td class="border-2">1</td>
                            <td class="border-2">
                                <h4>Sikap Sempurna</h4>
                            </td>
                            <td class="border-2 p-2" class="btn">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">1</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">2</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">3</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">4</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">5</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">6</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">7</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">8</span>
                                </label>
                            </td>
                        </tr>
                        <tr id="tr-aspect-1-1" class="text-xl font-semibold ">
                            <td class="border-2">1</td>
                            <td class="border-2">
                                <h4>Sikap Sempurna</h4>
                            </td>
                            <td class="border-2 p-2" class="btn">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">1</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">2</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">3</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">4</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">5</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">6</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">7</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">8</span>
                                </label>
                            </td>
                        </tr>
                        <tr id="tr-aspect-1-1" class="text-xl font-semibold ">
                            <td class="border-2">1</td>
                            <td class="border-2">
                                <h4>Sikap Sempurna</h4>
                            </td>
                            <td class="border-2 p-2" class="btn">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">1</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">2</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">3</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">4</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">5</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">6</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">7</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">8</span>
                                </label>
                            </td>
                        </tr>
                        <tr id="tr-aspect-1-1" class="text-xl font-semibold ">
                            <td class="border-2">1</td>
                            <td class="border-2">
                                <h4>Sikap Sempurna</h4>
                            </td>
                            <td class="border-2 p-2" class="btn">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">1</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">2</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">3</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">4</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">5</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">6</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">7</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">8</span>
                                </label>
                            </td>
                        </tr>
                        <tr id="tr-aspect-1-1" class="text-xl font-semibold ">
                            <td class="border-2">1</td>
                            <td class="border-2">
                                <h4>Sikap Sempurna</h4>
                            </td>
                            <td class="border-2 p-2" class="btn">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">1</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">2</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">3</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">4</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">5</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">6</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">7</span>
                                </label>
                            </td>
                            <td class="border-2 p-2">
                                <label>
                                    <input type="radio" class="hidden peer" name="options" />
                                    <span class="btn w-full peer-checked:btn-primary">8</span>
                                </label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>

<script src="<?= base_url('./js/manageAspectEval.js') ?>"></script>