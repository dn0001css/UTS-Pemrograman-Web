<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah List Game</title>
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
    <h1>Tambah List Game</h1>
    <a href="game.php">Kembali ke Game</a>
    </center>
    <div class="content">

        <form action="game-store.php" method="post">
            <div>
                <label>Genre</label>
                <select name="genre">
                    <option value="RPG">RPG</option>
                    <option value="Action-Adventure">Action-Adventure</option>
                    <option value="Action RPG">Action RPG</option>
                    <option value="MOBA">MOBA</option>
                    <option value="FPS">FPS</option>
                    <option value="Horor">Horor</option>
                </select>
            </div>
            <div>
                <label>Nama Game</label>
                <input type="text" name="nama_game">
            </div>
            <div>
                <label>Developer</label>
                <input type="text" name="developer">
            </div>
            <div>
                <label>Tahun Rilis</label>
                <input type="text" name="tahun_rilis">
            </div>
            <div style="margin-top: 20px;">
                <input type="submit" value="Simpan">
            </div>
        </form>
    </div>

</body>

</html>