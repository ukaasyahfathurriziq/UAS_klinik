<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $conn = new mysqli('localhost', 'root', '', 'klinik');

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $id = mysqli_real_escape_string($conn, $_GET['id']); // Hindari injeksi SQL
    $query = "SELECT * FROM obat WHERE id_obat = $id";

    $result = $conn->query($query);

    if ($result === false) {
        die("Error: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $obat = $result->fetch_assoc();
    } else {
        echo "Data tidak ditemukan";
        exit();
    }
} else {
    echo "Akses tidak valid";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Obat</title>
</head>
<body>
    <h2>Edit Obat</h2>
    <form action="update_obat.php" method="post">
        <input type="hidden" name="id" value="<?= $obat['id_obat']; ?>">

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($obat['nama_obat']); ?>" required>

        <label for="jumlah">Jumlah:</label>
        <input type="text" name="jumlah" value="<?= htmlspecialchars($obat['jumlah']); ?>" required>

        <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa:</label>
        <input type="date" name="tanggal_kadaluarsa" value="<?= $obat['tanggal_kadaluarsa']; ?>" required>

        <label for="harga">Harga:</label>
        <input type="text" name="harga" value="<?= htmlspecialchars($obat['harga']); ?>" required>

        <label for="keterangan">Keterangan:</label>
        <input type="text" name="keterangan" value="<?= htmlspecialchars($obat['keterangan']); ?>" required>

        <button type="submit">Update Data</button>
    </form>
</body>
</html>
