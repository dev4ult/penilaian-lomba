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
            padding: 1rem;
            text-transform: uppercase;
        }

        table.blueTable tbody td {
            font-size: 1rem;
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
            text-align: left;
            border-left: 2px solid #d0e4f5;
            padding: 1rem;
        }

        table.blueTable thead th:first-child {
            border-left: none;
        }
    </style>
</head>

<body>
    <main class="overflow-x-auto">
        <h4>REKAP KESELURUHAN PESERTA PBB 2 2023 - TINGKAT SMP</h4>
        <h3 class="title">PASKIBRA SMK 1 YADIKA JAKARTA BARAT , 27 MAY 2023</h3>
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
                    } ?>
                    <tr>
                        <td><?= $champ_name ?> <?= $index + 1 ?></td>
                        <td><?= $contestant_eval['school'] ?></td>
                        <td><?= $contestant_eval['total_eval'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>
</body>

</html>