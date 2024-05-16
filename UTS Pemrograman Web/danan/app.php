<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "game";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Gagal konek ke database: " . $conn->connect_error);
}

function getAllData($conn)
{
    $sql = "SELECT * FROM game";
    $result = $conn->query($sql);

    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

function listgamedimainkan($conn, $id)
{
    $stmt = $conn->prepare("SELECT * FROM game WHERE id_game = ? LIMIT 1");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    }

    return null;
}

function gamedimainkan($conn, $data)
{
    $stmt = $conn->prepare("INSERT INTO game (nama_game, genre, developer, tahun_rilis) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $data["nama_game"], $data["genre"], $data["developer"], $data["tahun_rilis"]);

    if ($stmt->execute()) {
        return $conn->insert_id;
    }

    return null;
}

?>
