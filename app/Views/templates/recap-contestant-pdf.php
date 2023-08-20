<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            font-size: 0.9rem;
        }

        h2 {
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td,
        th {
            border-width: 1px;
            border-color: black;
            border-style: solid;
            padding: 10px 7px;
        }

        .table-detail-info {
            margin-bottom: 2rem;
        }

        .table-detail-info th,
        .table-detail-info td {
            text-align: left;
            border: none;
            padding: 5px 0;
        }


        .divider {
            padding: 10px;
            border: none;
        }
    </style>
</head>

<body>
    <div>
        <h2>Rekap Nilai Peserta</h2>
        <table class="table-detail-info">
            <tr>
                <td>Nama Tim</td>
                <td>:</td>
                <th><?= $contestant['team_name'] ?></th>
            </tr>
            <tr>
                <td>Penanggung Jawab</td>
                <td>:</td>
                <th><?= $contestant['leader'] ?></th>
            </tr>
            <tr>
                <td>Asal Sekolah</td>
                <td>:</td>
                <th><?= $contestant['school'] ?></th>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td>:</td>
                <th><?= $contestant['phone_number'] ?></th>
            </tr>
        </table>
    </div>
    <div>
        <table class="table-aspect-evaluation">
            <thead>
                <tr>
                    <th rowspan="2">NO</th>
                    <th rowspan="2">PENILAIAN</th>
                    <th colspan="2">NILAI</th>
                </tr>
                <tr>
                    <?php $judge_evaluation = [] ?>
                    <?php foreach ($judges as $index => $judge) : ?>
                        <th>JURI <?= $index + 1 ?></th>
                        <?php array_push($judge_evaluation, 0) ?>
                    <?php endforeach ?>
                </tr>
            </thead>


            <?php foreach ($contest_categories as $category) : ?>
                <!-- <h4><?= $category['category_name'] ?></h4> -->
                <?php $index = 1 ?>
                <?php foreach ($judges as $indexJudge => $judge) : ?>
                    <?php $judge_evaluation[$indexJudge] = 0 ?>
                <?php endforeach ?>
                <tbody>
                    <tr>
                        <td class="divider" colspan="<?= 2 + count($judges) ?>"></td>
                    </tr>
                    <?php foreach ($contest_aspects as $aspect) : ?>
                        <?php if ($aspect['category_id'] == $category['eval_category_id']) : ?>
                            <tr>
                                <td style="text-align: center"><?= $index ?></td>
                                <td><?= $aspect['aspect_name'] ?></td>
                                <?php foreach ($aspect_evaluations as $eval) : ?>
                                    <?php foreach ($judges as $indexJudge => $judge) : ?>
                                        <?php if ($eval['aspect_id'] == $aspect['aspect_id'] && $eval['user_id'] == $judge['user_id']) : ?>
                                            <?php $judge_evaluation[$indexJudge] += (int) $eval['evaluation'] ?>
                                            <td style="text-align: center"><?= $eval['evaluation'] ?></td>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                <?php endforeach ?>
                            </tr>
                            <?php $index++ ?>
                        <?php endif ?>
                    <?php endforeach ?>

                    <tr>
                        <td class="divider" colspan="<?= 2 + count($judges) ?>"></td>
                    </tr>
                    <tr>
                        <th rowspan="2" style="text-transform: uppercase" colspan="2">TOTAL NILAI
                            <?= $category['category_name'] ?>
                        </th>
                        <?php $totalVal = 0 ?>
                        <?php foreach ($judge_evaluation as $judge_eval) : ?>
                            <th><?= $judge_eval ?></th>
                            <?php $totalVal += $judge_eval ?>
                        <?php endforeach ?>
                    </tr>
                    <tr>

                        <th colspan="<?= count($judges) ?>"><?= $totalVal ?></th>
                    </tr>
                </tbody>

                </tfoot>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>