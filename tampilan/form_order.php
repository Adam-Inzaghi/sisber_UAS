<?php
    require_once '../proses/koneksi.php';
    $result = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY nama DESC");
    $ps = mysqli_query($conn, "SELECT * FROM barang ORDER BY tipe DESC");
?>
<html>
    <head>
        <title>Form Order</title>
        <script>
            function calculateTotal() {
                var quantity = document.getElementById("quantity").value;
                var price = document.getElementById("harga_barang").value;
                var total = quantity * price;
                document.getElementById("total_payment").value = total;
            }
        </script>
        <link rel="stylesheet" href="../css/custom/style.css">
    </head>
    <body>

        <div class="az-header">
            <div class="container">
                <div class="az-header-left">
                    <a href="../index.php" class="az-logo">Tatang Playstation</a>
                    <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
                </div>
                <div class="az-header-menu">
                    <div class="az-header-menu-header">
                        <a href="index.php" class="az-logo"><span></span> azia</a>
                        <a href="" class="close">&times;</a>
                    </div>
                    <ul class="nav">
                        <li class="nnav-item">
                        <a href="../index.php" class="nav-link"><i class="typcn typcn-chart-area-outline"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="barang.php" class="nav-link"><i class="typcn typcn-document"></i>List Barang</a>
                        </li>
                        <li class="nav-item">
                            <a href="list_order.php" class="nav-link"><i class="typcn typcn-document"></i>List Sewa</a>
                        </li>
                        <li class="nav-item">
                            <a href="member.php" class="nav-link"><i class="typcn typcn-document"></i>List Member</a>
                        </li>
                    </ul>
                </div>
                <div class="az-header-right">
                    <li class="nav-item">
                        <a href="../proses/proses_logout.php" class="nav-link"><i class="typcn typcn-document"></i>Logout</a>
                    </li>
                </div>
            </div>
        </div>

        <div class="az-content az-content-dashboard">
            <div class="container">
                <div class="az-content-body">
                    <form action="../proses/proses_order.php" method="POST">
                        <label>Nama Peminjam</label>
                        <select class="form-control select2" name="id_pelanggan">
                            <option selected disabled>Pilih Peminjam</option>
                            <?php 
                                while ($data_peminjam = mysqli_fetch_array($result,MYSQLI_ASSOC)):; 
                            ?>
                                <option value="<?php echo $data_peminjam["id_pelanggan"];?>">
                                    <?php echo $data_peminjam["nama"];?>
                                </option>
                            <?php 
                                endwhile; 
                            ?>
                        </select>
                        <br>
                        <a href="form_member.php" class="btn btn-purple">+ Tambah Peminjam Baru</a>
                        
                        <br>
                        <br>
            
                        <label>Playstation</label>
                        <select class="form-control select2" name="id_barang" id="id_barang" onclick="updatePrice()">
                            <option selected disabled>Pilih Barang</option>
                            <?php 
                                while ($data_ps= mysqli_fetch_array($ps,MYSQLI_ASSOC)):; 
                            ?>
                                <option value="<?php echo $data_ps["id_barang"];?>" data-harga="<?php echo $data_ps["harga"];?>">
                                    <?php echo $data_ps["tipe"];?> Harga: <?php echo $data_ps["harga"];?>
                                </option>
                            <?php 
                                endwhile;
                            ?>
                        </select>
                        <br>
                        <a href="barang.php" class="btn btn-purple">List Playstation</a>
                        
                        <br>
                        <br>
            
                        <label for="quantity">Quantity :</label>
                        <input class="form-control" type="number" id="quantity" name="quantity" oninput="calculateTotal()">
            
                        <br>
                        <br>
            
                        <label for="tgl_pengembalian">Tanggal Pengembalian</label>
                        <input class="form-control" type="date" id="tgl_pengembalian" name="tgl_pengembalian">
            
                        <br>
                        <br>
            
                        <label for="total_payment">Total Harga :</label>
                        <input class="form-control" type="number" id="total_payment" name="total_payment" readonly>
            
                        <input type="hidden" id="harga_barang" value="0">
            
                        <br>
                        <br>
            
                        <button class="btn btn-purple" type="submit">Simpan</button>
                    </form>

                    <script>
                        function updatePrice() {
                            var select = document.getElementById("id_barang");
                            var selectedOption = select.options[select.selectedIndex];
                            var price = selectedOption.getAttribute("data-harga");
                            document.getElementById("harga_barang").value = price;
                            calculateTotal(); // Update total when the price changes
                        }
                    </script>
                </div>
            </div>
        </div>
        
    </body>
</html>