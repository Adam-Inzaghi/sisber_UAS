<html>
    <head>
        <link rel="stylesheet" href="../css/custom/style.css">
    <body>

        <div class="az-header">
            <div class="container">
                <div class="az-header-left">
                    <a href="../index.html" class="az-logo">Tatang Playstation</a>
                    <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
                </div>
                <div class="az-header-menu">
                    <div class="az-header-menu-header">
                        <a href="index.html" class="az-logo"><span></span> azia</a>
                        <a href="" class="close">&times;</a>
                    </div>
                    <ul class="nav">
                        <li class="nnav-item">
                        <a href="../index.html" class="nav-link"><i class="typcn typcn-chart-area-outline"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="/tampilan/barang.php" class="nav-link"><i class="typcn typcn-document"></i>List Barang</a>
                        </li>
                        <li class="nav-item">
                            <a href="/tampilan/list_order.php" class="nav-link"><i class="typcn typcn-document"></i>List Sewa</a>
                        </li>
                        <li class="nav-item">
                            <a href="/tampilan/member.php" class="nav-link"><i class="typcn typcn-document"></i>List Member</a>
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
                    <div class="az-dashboard-one-title">
                        <div>
                            <h2 class="az-dashboard-title">
                                Tambah Member
                            </h2>
                        </div>
                    </div>
                    <form action="../proses/proses_barang.php" method="POST">
                        <label for="tipe">Tipe Barang:</label><br>
                        <input class="form-control select2" type="text" id="tipe" name="tipe" required><br><br>

                        <label for="quantity">Quantity:</label><br>
                        <input class="form-control select2" type="number" id="quantity" name="quantity" required><br><br>

                        <label for="harga">Harga:</label><br>
                        <input class="form-control select2" type="number" id="harga" name="harga" required><br><br>

                        <button class="btn btn-purple" type="submit">Simpan</button>
                    </form>
                    
                <div class="az-dashboard-one-title">
                </div>
            </div>
        </div>
        
    </body>
</html>
