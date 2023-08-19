<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <style>
    *,
    *::after,
    *::before {
        font-family: Arial, Helvetica, sans-serif;
    }

    main {
        text-align: center;
        padding: 1rem;
    }

    table.blueTable {
        margin: 1rem auto;
        font-family: Arial, Helvetica, sans-serif;
        border: 1px solid #2f44a4;
        background-color: #eeeeee;
        text-align: left;
        width: 70%;
        border-collapse: collapse;
    }

    table.blueTable td,
    table.blueTable th {
        border: 1px solid #aaaaaa;
        padding: 8px 2px;
        padding: 0.6rem;
        text-transform: uppercase;
    }

    table.blueTable tbody td {
        font-size: 13px;
    }

    table.blueTable tr:nth-child(even) {
        background: #d0e4f5;
    }

    table.blueTable thead {
        background: rgb(69, 69, 149);
        border-bottom: 2px solid #444444;
    }

    table.blueTable thead th {
        font-size: 15px;
        font-weight: bold;
        color: #ffffff;
        text-align: center;
        border-left: 2px solid #d0e4f5;
        padding: 1rem;
    }

    table.blueTable thead th:first-child {
        border-left: none;
    }

    .page-break-after {
        page-break-after: always;
    }

    .page-break-before {
        page-break-before: always;
    }

    .text-center {
        text-align: center;
    }

    .uppercase {
        text-transform: uppercase;
    }
    </style>
</head>

<body>
    <main class="page-break-after">
        <h4 class="uppercase">REKAP KESELURUHAN PESERTA <?= $contest['contest_name'] ?> 2023 - TINGKAT
            <?= $contest['category'] ?></h4>
        <!-- <h3 class="title">PASKIBRA SMK 1 YADIKA JAKARTA BARAT , 27 MAY 2023</h3> -->
        <table class="blueTable">
            <thead>
                <tr>
                    <th>Juara</th>
                    <th>Instansi / Sekolah</th>
                    <th>Nilai Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $champ_name = "" ?>
                <?php $number_champ = 1 ?>
                <?php foreach ($main_table_eval as $index => $contestant_eval) : ?>
                <?php switch (true) {
                        case ($index >= 0 && $index < 3):
                            $champ_name = "UTAMA";
                            break;
                        case ($index >= 3 && $index < 6):
                            $champ_name = "HARAPAN";
                            break;
                        case ($index >= 6 && $index < 9):
                            $champ_name = "MADYA";
                            break;
                        case ($index >= 9 && $index < 12):
                            $champ_name = "BINA";
                            break;
                        case ($index >= 12 && $index < 14):
                            $champ_name = "MULA";
                            break;
                        case ($index >= 14 && $index < 17):
                            $champ_name = "PURWA";
                            break;
                        case ($index >= 17 && $index < 20):
                            $champ_name = "CARAKA";
                            break;
                        default:
                            $champ_name = "";
                            $number_champ = $index + 1;
                    } ?>
                <?php if ($index < 20 && $number_champ == 4) {
                        $number_champ = 1;
                    } ?>
                <tr>
                    <th><?= $champ_name ?> <?= $number_champ ?></th>
                    <td><?= $contestant_eval['school'] ?></td>
                    <td><?= $contestant_eval['total_eval'] ?></td>
                </tr>
                <?php $number_champ++ ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>
    <div class="table">
        <?php foreach ($categories as $index => $category) : ?>
        <div class="<?= $index != 0  ? 'page-break-before' : '' ?>">
            <h3 class="text-center uppercase"><?= $category['category_name'] ?> Terbaik</h3>
            <table class="blueTable">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Instansi / Sekolah</th>
                        <th>Nilai Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $rank = 1 ?>
                    <?php foreach ($category_table_eval as $category_eval) : ?>
                    <?php if ($category['eval_category_id'] == $category_eval['category_id']) : ?>
                    <tr>
                        <th><?= $rank ?></th>
                        <td><?= $category_eval['school'] ?></td>
                        <td><?= $category_eval['total_eval'] ?></td>
                    </tr>
                    <?php $rank++ ?>
                    <?php endif ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <?php endforeach ?>
    </div>
</body>

</html>