<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            margin: 20px;
        }
    </style>
</head>
<body>
    <?php
        // Koneksi ke database
        $conn = new mysqli('localhost', 'root', '', 'klinik');

        // Periksa koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Fungsi untuk mendapatkan data dari tabel
        function getData() {
            global $conn;
            $query = "SELECT * FROM data_pasien";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                return [];
            }
        }

        // Menampilkan data dalam tabel
        $dataPasien = getData();
    ?>

    <table>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>No Kontak</th>
            <th>Gender</th>
            <th>Action</th>
        </tr>

        <?php foreach ($dataPasien as $pasien): ?>
            <tr>
                <td><?= $pasien['nama']; ?></td>
                <td><?= $pasien['alamat']; ?></td>
                <td><?= $pasien['tanggal_lahir']; ?></td>
                <td><?= $pasien['no_kontak']; ?></td>
                <td><?= $pasien['gender_id']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $pasien['id']; ?>">Edit</a> |
                    <a href="delete.php?id=<?= $pasien['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <form action="add.php" method="post">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" required>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" name="tanggal_lahir" required>

        <label for="no_kontak">No Kontak:</label>
        <input type="text" name="no_kontak" required>

        <label for="gender_id">Gender:</label>
        <input type="text" name="gender_id" required>

        <button type="submit">Tambah Data</button>
        <a href="stok_obat.php">Stok Obat</a>
    </form>
</body>
</html>
