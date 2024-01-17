<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    exit(); // Add an exit after redirecting to prevent further execution
}

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $no_hp = $_POST['no_hp'];
    $gender_id = $_POST['gender_id'];

    $sql = "INSERT INTO data1 (id,nama, alamat, tanggal_lahir, no_hp, jenis_kelamin) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssss",$id, $nama, $alamat, $tanggal_lahir, $no_hp, $gender_id);

        if ($stmt->execute()) {
            header('Location: simpan_data.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Pasien</title>
    <style>
    </style>
</head>
<body>
    <div class="container">
        <h2>Daftar Pasien</h2>
        <form action="" method="post">
         <label for="id">ID:</label><br>
            <input type="text" id="id" name="id" required><br>
            <label for="nama">Nama Pasien:</label><br>
            <input type="text" id="nama" name="nama" required><br>
            <label for="alamat">Alamat:</label><br>
            <input type="text" id="alamat" name="alamat" required><br>
            <label for="tanggal_lahir">Tanggal Lahir:</label><br>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br>
            <label for="no_hp">No. Kontak:</label><br>
            <input type="text" id="no_hp" name="no_hp" required><br>
            <label for="gender_id">Jenis Kelamin:</label><br>
            <input type="radio" id="gender_id" name="gender_id" value="Laki-laki"> Laki-laki
            <input type="radio" id="gender_id" name="gender_id" value="Perempuan"> Perempuan<br><br>
            <input type="submit" value="Tambah Data">
            <a href="stok_obat.php">Stok Obat</a>
        </form>

        <a href="simpan_data.php">Tampilan Data Pasien</a>

        
        
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>

