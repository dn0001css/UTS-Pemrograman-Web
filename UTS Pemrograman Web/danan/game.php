<?php
session_start();
require_once "app.php";

$g = getAllData($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
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
    <h1>Daftar Game</h1>

    <a href="/">Kembali ke home</a>

    <br>

    <a href="game-tambah.php">Tambah</a>
    </center>
    <br>
    <br>

    <?php if (isset($_SESSION['BERHASIL_TAMBAH_GAME'])) : ?>
        <p><?= htmlspecialchars($_SESSION['BERHASIL_TAMBAH_GAME']) ?></p>
        <?php unset($_SESSION['BERHASIL_TAMBAH_GAME']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['BERHASIL_UPDATE_GAME'])) : ?>
        <p><?= htmlspecialchars($_SESSION['BERHASIL_UPDATE_GAME']) ?></p>
        <?php unset($_SESSION['BERHASIL_UPDATE_GAME']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['BERHASIL_DELETE_GAME'])) : ?>
        <p><?= htmlspecialchars($_SESSION['BERHASIL_DELETE_GAME']) ?></p>
        <?php unset($_SESSION['BERHASIL_DELETE_GAME']); ?>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>Game</th>
                <th>Genre</th>
                <th>Developer</th>
                <th>Rilis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($g as $v) : ?>
                <tr>
                    <td><?= htmlspecialchars($v['nama_game']) ?></td>
                    <td><?= htmlspecialchars($v['genre']) ?></td>
                    <td><?= htmlspecialchars($v['developer']) ?></td>
                    <td><?= htmlspecialchars($v['tahun_rilis']) ?></td>
                    <td>
                        <a href="<?= "game-detail.php?id=" . htmlspecialchars($v['id_game']) ?>">Detail</a>
                        <a href="<?= "game-edit.php?id=" . htmlspecialchars($v['id_game']) ?>">Edit</a>
                        <a href="<?= "game-delete.php?id=" . htmlspecialchars($v['id_game']) ?>" onclick="return confirm('Are you sure you want to delete this game?');">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>

<?php
mysqli_close($conn);
?>
