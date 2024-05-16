<?php
require_once "app.php";

// Validasi dan sanitasi id parameter
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Cek apakah game dengan id tersebut ada di database
$p = listgamedimainkan($conn, $id);

if (!$p) {
    die("Game not found or invalid ID.");
}

function editgame($v, $d)
{
    return $v == $d ? 'selected' : '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Riwayat Game</title>
    <style>
        select {
            width: 100%;
            padding: 5px;
            border: 1px solid;
        }

        input[type=text] {
            width: 100%;
            border: 1px solid;
            padding: 5px;
        }

        .content {
            padding: 20px;
        }
    </style>
</head>

<body>
    <center>
    <h1>Edit Riwayat Game</h1>
    <a href="game.php">Kembali ke Game</a>
    </center>
    <div class="content">

        <form action="game-store.php" method="post">
            <div>
                <label>Genre</label>
                <select name="genre">
                    <option <?= editgame("RPG", htmlspecialchars($p['genre'])) ?> value="RPG">RPG</option>
                    <option <?= editgame("Action-Adventure", htmlspecialchars($p['genre'])) ?> value="Action-Adventure">Action-Adventure</option>
                    <option <?= editgame("Action RPG", htmlspecialchars($p['genre'])) ?> value="Action RPG">Action RPG</option>
                    <option <?= editgame("MOBA", htmlspecialchars($p['genre'])) ?> value="MOBA">MOBA</option>
                    <option <?= editgame("FPS", htmlspecialchars($p['genre'])) ?> value="FPS">FPS</option>
                    <option <?= editgame("Horor", htmlspecialchars($p['genre'])) ?> value="Horor">Horor</option>
                </select>
            </div>
            <div>
                <label>Nama Game</label>
                <input type="text" name="nama_game" value="<?= htmlspecialchars($p['nama_game']) ?>">
            </div>
            <div>
                <label>Developer</label>
                <input type="text" name="developer" value="<?= htmlspecialchars($p['developer']) ?>">
            </div>
            <div>
                <label>Tahun Rilis</label>
                <input type="text" name="tahun_rilis" value="<?= htmlspecialchars($p['tahun_rilis']) ?>">
            </div>
            <div style="margin-top: 20px;">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="submit" value="Simpan">
            </div>
        </form>
    </div>

</body>

</html>
