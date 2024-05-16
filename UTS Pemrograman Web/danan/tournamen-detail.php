<?php
require_once "data.php";

$id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournamen</title>
</head>

<body>
    <center>
    <h1>Riwayat Tournamen Detail</h1>

    <a href="/tournamen.php">Kembali ke Tournamen</a>
    </center>
    <br>
    <br>

    <p>Nama Game : <?= $tourne[$id]['nama_game'] ?></p>
    <p>Tournamen : <?= $tourne[$id]['tournamen'] ?></p>
    <p>Tahun Tournamen : <?= $tourne[$id]['tahun'] ?></p>
    <p>Juara Tournamen : <?= $tourne[$id]['juara'] ?></p>

</body>

</html>