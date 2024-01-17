<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $conn = new mysqli('localhost', 'root', '', 'klinik');

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $id = mysqli_real_escape_string($conn, $_GET['id']); // Hindari injeksi SQL
    $query = "SELECT * FROM data1 WHERE id = $id";

    $result = $conn->query($query);

    if ($result === false) {
        die("Error: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $pasien = $result->fetch_assoc();
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
    <title>Edit Data Pasien</title>
</head>
<body>
    <h2>Edit Data Pasien</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $pasien['id']; ?>">

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="<?= htmlspecialchars($pasien['nama']); ?>" required>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" value="<?= htmlspecialchars($pasien['alamat']); ?>" required>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" value="<?= $pasien['tanggal_lahir']; ?>" required>

        <label for="no_hp">No Kontak:</label>
        <input type="text" name="no_hp" value="<?= htmlspecialchars($pasien['no_hp']); ?>" required>

        <label for="jenis_kelamin">Gender:</label>
        <input type="text" name="jenis_kelamin" value="<?= htmlspecialchars($pasien['jenis_kelamin']); ?>" required>

        <button type="submit">Update Data</button>
    </form>
</body>
</html>
