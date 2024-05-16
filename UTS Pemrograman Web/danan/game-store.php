<?php
session_start();
require_once "app.php";

// Validasi dan sanitasi input dari form
$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$nama_game = isset($_POST['nama_game']) ? htmlspecialchars(trim($_POST['nama_game'])) : '';
$genre = isset($_POST['genre']) ? htmlspecialchars(trim($_POST['genre'])) : '';
$developer = isset($_POST['developer']) ? htmlspecialchars(trim($_POST['developer'])) : '';
$tahun_rilis = isset($_POST['tahun_rilis']) ? htmlspecialchars(trim($_POST['tahun_rilis'])) : '';

if ($nama_game && $genre && $developer && $tahun_rilis) {
    if ($id > 0) { // Jika ID game terdefinisi, lakukan update
        $stmt = $conn->prepare("UPDATE game SET nama_game = ?, genre = ?, developer = ?, tahun_rilis = ? WHERE id_game = ?");
        $stmt->bind_param('ssssi', $nama_game, $genre, $developer, $tahun_rilis, $id);

        if ($stmt->execute()) {
            $_SESSION['BERHASIL_UPDATE_GAME'] = "Game updated successfully.";
        } else {
            $_SESSION['GAGAL_UPDATE_GAME'] = "Error updating game: " . $conn->error;
        }
    } else { // Jika ID game tidak terdefinisi, lakukan penambahan
        $stmt = $conn->prepare("INSERT INTO game (nama_game, genre, developer, tahun_rilis) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $nama_game, $genre, $developer, $tahun_rilis);

        if ($stmt->execute()) {
            $_SESSION['BERHASIL_TAMBAH_GAME'] = "Game added successfully.";
        } else {
            $_SESSION['GAGAL_TAMBAH_GAME'] = "Error adding game: " . $conn->error;
        }
    }
    header("Location: game.php");
    exit();
} else {
    echo "Invalid input. Please fill all fields.";
}

$conn->close();
?>
