<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $conn = new mysqli('localhost', 'root', '', 'klinik');

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
    $tanggal_lahir = mysqli_real_escape_string($conn, $_POST['tanggal_lahir']);
    $no_kontak = mysqli_real_escape_string($conn, $_POST['no_hp']);
    $gender_id = mysqli_real_escape_string($conn, $_POST['jenis_kelamin']);

    $query = "UPDATE data1 SET 
                nama = '$nama', 
                alamat = '$alamat', 
                tanggal_lahir = '$tanggal_lahir', 
                no_hp = '$no_kontak', 
                jenis_kelamin = '$gender_id' 
              WHERE id = $id";

    $result = $conn->query($query);

    if ($result === true) {
        header("Location: simpan_data.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Akses tidak valid.";
}
?>
