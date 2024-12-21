<?php
require_once '../proses/koneksi.php';

// Fetch data from the database
$result = mysqli_query($conn, "SELECT o.id_order, m.id_pelanggan, m.nama, b.id_barang, b.tipe, o.quantity, o.total_payment, o.tgl_pengembalian, o.status, o.created_at, o.updated_at 
FROM `order` o 
LEFT JOIN `pelanggan` m ON o.id_pelanggan = m.id_pelanggan 
LEFT JOIN `barang` b ON o.id_barang = b.id_barang 
ORDER BY o.id_order ASC");
?>

<html>
    <head>
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
                            <h2 class="az-dashboard-title">List Sewa</h2>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php  
                                while ($user_data = mysqli_fetch_array($result)) {         
                                    echo "<tr>";
                                    echo "<td>{$user_data['id_order']}</td>";
                                    echo strtoupper("<td>{$user_data['nama']}</td>");
                                    echo strtoupper("<td>{$user_data['tipe']}</td>");
                                    echo "<td>{$user_data['quantity']}</td>";    
                                    echo "<td>Rp. " . number_format($user_data['total_payment'], 0, ',', '.') . "</td>";
                                    echo "<td>{$user_data['tgl_pengembalian']}</td>";

                                    if ($user_data['status']) {
                                        echo "<td><button class='btn btn-secondary' disabled>Sudah Dikembalikan</button></td>";
                                    } else {
                                        echo "<td>
                                            <form method='POST' action='../proses/proses_kembalikan.php'>
                                                <input type='hidden' name='id_order' value='{$user_data['id_order']}'>
                                                <input type='hidden' name='id_barang' value='{$user_data['id_barang']}'>
                                                <input type='hidden' name='quantity' value='{$user_data['quantity']}'>
                                                <button type='submit' class='btn btn-purple'>Kembalikan</button>
                                            </form>
                                        </td>";
                                    }

                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
