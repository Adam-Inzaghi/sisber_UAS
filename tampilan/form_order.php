<?php
    require_once '../proses/koneksi.php';
    $result = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY nama DESC");
    $ps = mysqli_query($conn, "SELECT * FROM barang ORDER BY tipe DESC");
?>
<html>
    <head>
        <title>Form Order</title>
    </head>
    <body>

        <h1>Tambah Order</h1>

        <form action="../proses/proses_order.php" method="POST">
            <label>Nama Peminjam</label>
            <select name="id_pelanggan">
                <?php 
                    while ($data_peminjam = mysqli_fetch_array($result,MYSQLI_ASSOC)):; 
                ?>
                    <option value="<?php echo $data_peminjam["id_pelanggan"];?>">
                        <?php echo $data_peminjam["nama"];?>
                <?php 
                    endwhile; 
                ?>
            </select>
            <a href="form_member.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">Tambah Peminjam Baru</a>
            
            <br>
            <br>

            <label>Playstation</label>
            <select name="id_barang">
                <?php 
                    while ($data_ps= mysqli_fetch_array($ps,MYSQLI_ASSOC)):; 
                ?>
                    <option value="<?php echo $data_ps["id_barang"];?>">
                        <?php echo $data_ps["tipe"];?>
                    </option>
                <?php 
                    endwhile;
                ?>
            </select>   
            <a href="barang.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">List Playstation</a>
            
            <br>
            <br>

            <label for="quantity">Quantity :</label>
            <input type="number" id="quantity" name="quantity">

            <br>
            <br>

            <label for="tgl_pengembalian">Tanggal Pengembalian</label>
            <input type="date" id="tgl_pengembalian" name="tgl_pengembalian">

            <br>
            <br>

            <label for="total_payment">Total Harga :</label>
            <input type="number" id="total_payment" name="total_payment">

            <br>
            <br>

            <button type="submit">Simpan</button>
        </form>

        <br>

        <a href="../index.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">Menu Utama</a>
        
    </body>
</html>
