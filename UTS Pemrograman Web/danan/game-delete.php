<?php
session_start();
require_once "app.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    $stmt = $conn->prepare("DELETE FROM game WHERE id_game = ?");
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        $_SESSION['BERHASIL_DELETE_GAME'] = "Game deleted successfully.";
    } else {
        $_SESSION['BERHASIL_DELETE_GAME'] = "Error deleting game: " . $conn->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: game.php");
    exit();
} else {
    $_SESSION['BERHASIL_DELETE_GAME'] = "Invalid game ID.";
    header("Location: game.php");
    exit();
}
?>
