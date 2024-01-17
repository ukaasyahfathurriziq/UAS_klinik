<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data dari database berdasarkan ID
    $sql = "DELETE FROM data1 WHERE id = $id";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        // Redirect back to simpan_data.php
        header("Location: simpan_data.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Permintaan tidak valid.";
}

$conn->close();
?>
