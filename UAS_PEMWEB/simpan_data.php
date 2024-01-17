<?php
include 'koneksi.php';

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$records_per_page = 10;

$offset = ($page - 1) * $records_per_page;

// Use a prepared statement to prevent SQL injection
$stmt = $conn->prepare("SELECT *, YEAR(CURDATE()) - YEAR(tanggal_lahir) AS usia FROM data1 LIMIT ?, ?");
$stmt->bind_param("ii", $offset, $records_per_page);
$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
    echo "Error: " . $conn->error;
} elseif ($result->num_rows > 0) {
    echo "<h3>Laporan Data Pasien</h3>";
    echo "<table>";
    echo "<thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>No. Kontak</th>
                <th>Jenis Kelamin</th>
                <th>Action</th>
            </tr>
          </thead>";
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nama"] . "</td>
                <td>" . $row["alamat"] . "</td>
                <td>" . $row["tanggal_lahir"] . "</td>
                <td>" . $row["no_hp"] . "</td>
                <td>" . $row["jenis_kelamin"] . "</td>
                <td>
                    <a href='edit.php?id=" . $row["id"] . "'>Edit</a>
                    <a href='hapus.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>
                </td>
              </tr>";
    }
    echo "</tbody>";
    echo "</table>";

    $stmt->close();

    $sql_total = "SELECT COUNT(*) AS total_records FROM data1";
    $result_total = $conn->query($sql_total);
    $row_total = $result_total->fetch_assoc();
    $total_records = $row_total['total_records'];
    $total_pages = ceil($total_records / $records_per_page);

    echo "<div>";
    if ($page > 1) {
        echo "<a href='?page=" . ($page - 1) . "'>Sebelumnya</a>";
    }
    if ($page < $total_pages) {
        echo "<a href='?page=" . ($page + 1) . "'>Selanjutnya</a>";
    }
    echo "</div>";
} else {
    echo "<p>0 hasil</p>";
}

$conn->close();
?>
