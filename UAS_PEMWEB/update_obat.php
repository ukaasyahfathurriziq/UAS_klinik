<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $conn = new mysqli('localhost', 'root', '', 'klinik');

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $jumlah = mysqli_real_escape_string($conn, $_POST['jumlah']);
    $tanggal_kadaluarsa = mysqli_real_escape_string($conn, $_POST['tanggal_kadaluarsa']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);
    $keterangan = mysqli_real_escape_string($conn, $_POST['keterangan']);

    $query = "UPDATE obat SET 
                nama_obat = '$nama', 
                jumlah = '$jumlah', 
                tanggal_kadaluarsa = '$tanggal_kadaluarsa', 
                harga = '$harga', 
                keterangan = '$keterangan' 
              WHERE id_obat = $id";

    $result = $conn->query($query);

    if ($result === true) {
        // var_dump($query);
        header("Location: stok_obat.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Akses tidak valid.";
}
?>
