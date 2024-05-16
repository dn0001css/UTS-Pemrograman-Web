<?php
require_once "data.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournamen</title>
    <style>
        table,
        th,
        td {
            border: 1px solid;
            padding: 10px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }
    </style>
</head>

<body>
    <center>
    <h1>Riwayat Tournamen Game</h1>

    <a href="/">Kembali ke home</a>
    </center>
    <br>
    <br>

    <table>
        <thead>
            <tr>
                <th>Tahun Tournamen</th>
                <th>Nama Game</th>
                <th>Juara</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tourne as $k => $v) : ?>
                <tr>
                    <td><?= $v['tahun'] ?></td>
                    <td><?= $v['nama_game'] ?></td>
                    <td><?= $v['juara']?></td>
                    <td><a href="<?= "/tournamen-detail.php?id={$k}" ?>">Detail</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>