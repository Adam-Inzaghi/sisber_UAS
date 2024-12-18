<?php
    require_once '../proses/koneksi.php';
    $result = mysqli_query($conn, "SELECT * FROM barang ORDER BY id_barang ASC");
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
                        <a href="index.html" class="az-logo"><span></span> azia</a>
                        <a href="" class="close">&times;</a>
                    </div>
                    <ul class="nav">
                        <li class="nnav-item">
                        <a href="../index.html" class="nav-link"><i class="typcn typcn-chart-area-outline"></i>Dashboard</a>
                        </li>
                        <li class="nav-item ">
                            <a href="/tampilan/barang.php" class="nav-link"><i class="typcn typcn-document"></i>List Barang</a>
                        </li>
                        <li class="nav-item active">
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
                                    <!-- <th>ID Barang</th> -->
                                    <th>ID Sewa</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Quantity</th>
                                    <th>Total Payment</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php  
                                    while($user_data = mysqli_fetch_array($result)) {         
                                        echo "<tr>";
                                        // echo "<td>".$user_data['id_barang']."</td>";
                                        echo "<td>".$user_data['tipe']."</td>";
                                        echo "<td>".$user_data['quantity']."</td>";    
                                        echo "<td>".$user_data['harga']."</td>";  
                                        echo "<td><a href='edit.php?id=$user_data[id_barang]'>Edit</a> | <a href='../proses/delete_barang.php?id=$user_data[id_barang]'>Delete</a></td>";        
                                        echo "</tr>";
                                    }
                                ?> -->
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