<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Obat</title>
</head>
<body>
    <h2>Edit Obat</h2>
    <form action="tambah_data.php" method="post">
        <input type="hidden" name="id" value="">

        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="">

        <label for="jumlah">Jumlah:</label>
        <input type="text" name="jumlah" value="">

        <label for="tanggal_kadaluarsa">Tanggal Kadaluarsa:</label>
        <input type="date" name="tanggal_kadaluarsa" value="">

        <label for="harga">Harga:</label>
        <input type="text" name="harga" value="">

        <label for="keterangan">Keterangan:</label>
        <input type="text" name="keterangan" value="">

        <button type="submit">Update Data</button>
    </form>
</body>
</html>
