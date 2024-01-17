<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $conn = new mysqli('localhost', 'root', '', 'klinik');

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $no_kontak = $_POST['no_kontak'];
        $gender_id = $_POST['gender_id'];

        $query = "INSERT INTO data1 (nama, alamat, tanggal_lahir, no_hp, jenis_kelamin) VALUES ('$nama', '$alamat', '$tanggal_lahir', '$no_kontak', '$gender_id')";

        if ($conn->query($query) === TRUE) {
            header('Location: index.php');
            exit();
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        $conn->close();
    }
?>
