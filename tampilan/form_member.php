<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Member</title>
</head>
<body>
    <h1>Tambah Member Baru</h1>
    <form action="../proses/proses_member.php" method="POST">
        <label for="nama">Nama Member:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="no_hp">Nomor Handphone: </label><br>
        <input type="text" id="no_hp" name="no_hp" required><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
