<?php
$sql = "SELECT id_obat, nama_obat, jumlah, tanggal_kadaluarsa, harga, keterangan FROM obat";
$conn = new mysqli('localhost', 'root', '', 'klinik');
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID Obat</th><th>Nama Obat</th><th>Jumlah</th><th>Tanggal Kadaluarsa</th><th>Harga</th><th>Keterangan</th></tr>";
    // Output data setiap baris
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id_obat"]."</td><td>".$row["nama_obat"]."</td><td>".$row["jumlah"]."</td><td>".$row["tanggal_kadaluarsa"]."</td><td>".$row["harga"]."</td><td>".$row["keterangan"]."</td>.                <td>
        <a href='edit_obat.php?id=" . $row["id_obat"] . "'>Edit</a>
        <a href='delete_obat.php?id=" . $row["id_obat"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
    </td></tr>";
    }
    echo "</table>";
    echo "<a href='tambah_obat.php'>Tambah obat</a>";
} else {
    echo "0 hasil";
}

$conn->close();
?>