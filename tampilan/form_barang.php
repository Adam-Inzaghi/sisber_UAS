<html>
    <head>
        <title>Form Barang</title>
    </head>
    <body>

        <h1>Tambah Data Barang</h1>

        <form action="../proses/proses_barang.php" method="POST">
            <label for="tipe">Tipe Barang:</label><br>
            <input type="text" id="tipe" name="tipe" required><br><br>

            <label for="quantity">Quantity:</label><br>
            <input type="number" id="quantity" name="quantity" required><br><br>

            <label for="harga">Harga:</label><br>
            <input type="number" id="harga" name="harga" required><br><br>

            <button type="submit">Simpan</button>
            <a href="../index.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">Menu Utama</a>
        </form>
        
    </body>
</html>
