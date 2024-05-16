<?php
require_once "data.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
    <h1>Halo Saya <?= $dataDiri['nama'] ?></h1>
    <a href="game.php">Daftar Game Saya</a>
    <br>
    <a href="tournamen.php">Riwayat tournamen Game</a>
    </center>
</body>

</html>