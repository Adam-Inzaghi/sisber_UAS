<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Order</title>
</head>
<body>
    <h1>Tambah Order</h1>
    <form action="../proses/proses_order.php" method="POST">
        <label for="nama"></label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="no_hp">Nomor Handphone: </label><br>
        <input type="text" id="no_hp" name="no_hp" required><br><br>

<label>barang</label>
        <select>
        <option value="" disabled selected>PILIH BARANG</option>
            <option value="">a</option>
            <option value="">b</option>
        </select>
        <br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
