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

        /* tdbody {
            margin-bottom: 2rem;
        } */

        td,
        th {
            border-width: 1px;
            border-color: black;
            border-style: solid;
            padding: 10px 7px;
        }

        /* .table-contestant-info>tr>td,
    .table-contestant-info>tr>th {
        border: none;
    } */


        .table-detail-info {
            border: 1px solid black;
            width: fit-content;
            padding: 10px;
            display: table-cell;
        }


        .table-detail-info th,
        .table-detail-info td {
            text-align: left;
            border: none;
            padding: 5px 3px;
        }


        .divider {
            padding: 1rem;
            border: none;
        }
    </style>
</head>

<body>
    <h2>Rekap Nilai Peserta</h2>
    <table class="table-contestant-info" style="margin-bottom: 2rem">
        <tr>
            <td class="table-detail-info">
                <table>
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
                </table>
            </td>
            <td class="table-detail-info" style="height: fit-content">
                <table>
                    <tr>
                        <td>Lomba / Event</td>
                        <td>:</td>
                        <th><?= $contest['contest_name'] ?></th>
                    </tr>
                    <tr>
                        <td>Nomor Urut</td>
                        <td>:</td>
                        <th><?= $queue ?></th>
                    </tr>
                    <tr>
                        <td>Durasi</td>
                        <td>:</td>
                        <th><?= $duration ?></th>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <div>
        <table class="table-aspect-evaluation">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>PENILAIAN</th>
                    <th colspan="<?= count($judges) ?>">NILAI</th>
                </tr>

            </thead>


            <?php foreach ($contest_sub_categories as $indexSub => $sub_category) : ?>
                <?php $index = 1 ?>
                <?php foreach ($judges as $indexJudge => $judge) : ?>
                    <?php $judge_evaluation[$indexJudge] = 0 ?>
                <?php endforeach ?>
                <tbody>
                    <tr>
                        <td class="divider" colspan="<?= 2 + count($judges) ?>"></td>
                    </tr>
                    <tr>
                        <th><?= chr($indexSub + 65) ?></th>
                        <th style="text-align: left"><?= $sub_category['sub_category_name'] ?></th>
                        <?php foreach ($judges as $index => $judge) : ?>
                            <th>JURI <?= $index + 1 ?></th>
                        <?php endforeach ?>
                    </tr>
                    <?php foreach ($contest_aspects as $aspect) : ?>
                        <?php if ($aspect['sub_category_id'] == $sub_category['eval_sub_category_id']) : ?>
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
                        <th style="border: none"></th>
                        <th style="text-transform: uppercase" rowspan="2">TOTAL NILAI
                            <?= $sub_category['sub_category_name'] ?>
                        </th>
                        <?php $totalVal = 0 ?>
                        <?php foreach ($judge_evaluation as $judge_eval) : ?>
                            <th><?= $judge_eval ?></th>
                            <?php $totalVal += $judge_eval ?>
                        <?php endforeach ?>
                    </tr>
                    <tr>
                        <th style="border: none"></th>
                        <th colspan="<?= count($judges) ?>"><?= $totalVal ?></th>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</body>

</html>