<html>
    <head>
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
            <a href="../index.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">Menu Utama</a>
        </form>

    </body>
</html>
