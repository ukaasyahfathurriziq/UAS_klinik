<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $conn = new mysqli('localhost', 'root', '', 'klinik');

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $nama = $_POST['nama'];
        $jumlah = $_POST['jumlah'];
        $tanggal_kadaluarsa = $_POST['tanggal_kadaluarsa'];
        $harga = $_POST['harga'];
        $keterangan = $_POST['keterangan'];

        $query = "INSERT INTO obat (nama_obat, jumlah, tanggal_kadaluarsa, harga, keterangan) VALUES ('$nama', '$jumlah', '$tanggal_kadaluarsa', '$harga', '$keterangan')";

        if ($conn->query($query) === TRUE) {
            header('Location: stok_obat.php');
            exit();
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        $conn->close();
    }
?>
