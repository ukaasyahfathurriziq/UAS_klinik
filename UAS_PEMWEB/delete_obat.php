<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data dari database berdasarkan ID
    $sql = "DELETE FROM obat WHERE id_obat = $id";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        // Redirect back to simpan_data.php
        header("Location: stok_obat.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Permintaan tidak valid.";
}

$conn->close();
?>
