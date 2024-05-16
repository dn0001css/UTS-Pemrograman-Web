<?php
require_once "app.php";

// Validasi dan sanitasi id parameter
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$d = null;
if ($id > 0) {
    $d = listgamedimainkan($conn, $id);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
</head>

<body>
    <center>
    <h1>Riwayat Game Detail</h1>

    <a href="game.php">Kembali ke Game</a>
    </center>
    <br>
    <br>

    <?php if ($d): ?>
        <p>Nama Game : <?= htmlspecialchars($d['nama_game']) ?></p>
        <p>Genre : <?= htmlspecialchars($d['genre']) ?></p>
        <p>Developer : <?= htmlspecialchars($d['developer']) ?></p>
        <p>Tahun Rilis : <?= htmlspecialchars($d['tahun_rilis']) ?></p>
    <?php else: ?>
        <p>Game not found.</p>
    <?php endif; ?>

</body>

</html>

<?php
$conn->close();
?>
