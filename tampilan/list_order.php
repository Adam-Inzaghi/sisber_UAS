<?php
    require_once '../proses/koneksi.php';
    $result = mysqli_query($conn, "SELECT o.id_order, m.nama, b.tipe, o.quantity, o.total_payment, o.tgl_pengembalian FROM `order` o LEFT JOIN `pelanggan` m ON o.id_pelanggan = m.id_pelanggan LEFT JOIN `barang` b ON o.id_barang = b.id_barang ORDER BY o.id_order ASC");
?>
 
<html>
    <head>
        <link rel="stylesheet" href="../css/custom/style.css">
    </head>

    <body>
        <div class="az-header">
            <div class="container">
                <div class="az-header-left">
                    <a href="../index.html" class="az-logo">Tatang Playstation</a>
                    <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
                </div>
                <div class="az-header-menu">
                    <div class="az-header-menu-header">
                        <a href="index.php" class="az-logo"><span></span> azia</a>
                        <a href="" class="close">&times;</a>
                    </div>
                    <ul class="nav">
                        <li class="nav-item">
                        <a href="../index.php" class="nav-link"><i class="typcn typcn-chart-area-outline"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="barang.php" class="nav-link"><i class="typcn typcn-document"></i>List Barang</a>
                        </li>
                        <li class="nav-item active">
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
                    <div class="az-dashboard-one-title">
                        <div>
                            <h2 class="az-dashboard-title">
                                List Sewa
                            </h2>
                        </div>
                        <div class="az-content-header-right">
                            <a href="form_order.php" class="btn btn-purple">+ SEWA</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0">
                            <thead>
                                <tr>
                                    <th>ID Sewa</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Barang</th>
                                    <th>Quantity</th>
                                    <th>Total Payment</th>
                                    <th>Tanggal Pengembalian</th>
                                    <!-- <th>Status</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                 <?php  
                                    while($user_data = mysqli_fetch_array($result)) {         
                                        echo "<tr>";
                                        echo "<td>".$user_data['id_order']."</td>";
                                        echo "<td>".$user_data['nama']."</td>";
                                        echo "<td>".$user_data['tipe']."</td>";
                                        echo "<td>".$user_data['quantity']."</td>";    
                                        echo "<td>Rp. " . number_format($user_data['total_payment'], 0, ',', '.') . "</td>";
                                        echo "<td>".$user_data['tgl_pengembalian']."</td>";
                                        echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <a href="form_barang.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">Tambah Barang</a> -->
        <!-- <a href="../index.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">Menu Utama</a> -->
    </body>
</html>