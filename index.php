<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: tampilan/login.php");
        exit();
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="./css/custom/style.css">
    </head>
    <body>
        <div class="az-header">
            <div class="container">
                <div class="az-header-left">
                    <a href="index.html" class="az-logo">Tatang Playstation</a>
                    <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
                </div>
                <div class="az-header-menu">
                    <div class="az-header-menu-header">
                        <a href="index.html" class="az-logo"><span></span> azia</a>
                        <a href="" class="close">&times;</a>
                    </div>
                    <ul class="nav">
                        <li class="nav-item active">
                        <a href="index.html" class="nav-link"><i class="typcn typcn-chart-area-outline"></i>Dashboard</a>
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
                        <a href="proses/proses_logout.php" class="nav-link">Logout</a>
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
                                Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!
                            </h2>
                        </div>
                        <div class="az-content-header-right">
                            <!-- <div class="media">
                                <div class="media-body">
                                    <label>Start Date</label>
                                    <h6>-</h6>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                    <label>End Date</label>
                                    <h6>-</h6>
                                </div>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                    <label>Order Category</label>
                                    <h6>All Categories</h6> 
                                </div>
                            </div> -->
                            <a href="tampilan/form_order.php" class="btn btn-purple">+ SEWA</a>
                        </div>
                    </div>


                    <div class="row row-sm mg-b-20 mg-lg-b-0">
                        <div class="col-lg-5 col-xl-4">
                            <div class="row row-sm">
                                <div class="col-md-6 col-lg-12 mg-b-20 mg-md-b-0 mg-lg-b-20">
                                    <div class="card card-dashboard-five">
                                        <div class="card-header">
                                            <h6 class="card-title">Playstation Tersedia</h6>
                                        </div>
                                        <div class="card-body row row-sm">
                                            <div class="col-6 d-sm-flex align-items-center">
                                                <div>
                                                    <h2>15</h2>
                                                    <label>Playstation</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 mg-b-20 mg-md-b-0 mg-lg-b-20">
                                    <div class="card card-dashboard-five">
                                        <div class="card-header">
                                            <h6 class="card-title">Playstation Disewa</h6>
                                        </div>
                                        <div class="card-body row row-sm">
                                            <div class="col-6 d-sm-flex align-items-center">
                                                <div>
                                                    <h2>8</h2>
                                                    <label>Playstation</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- CARD PLAYSTATION TERSEDIA & DISEWA -->


                        <div class="col-lg-7 col-xl-8 mg-t-20 mg-lg-t-0">
                            <div class="card card-table-one">
                                <h6 class="card-title">List Sewa</h6>
                                <br>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Total Payment</th>
                                            <th>Tanggal Pengembalian</th>
                                            <td>Status</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><i class="flag-icon flag-icon-us flag-icon-squared"></i></td>
                                            <td>Ferdian Syahputra</td>
                                            <td>Rp. 200.000</td>
                                            <td>22/12/2024</td>
                                            <td>Belum Dikembalikan</td>
                                        </tr>
                                        <tr>
                                            <td><i class="flag-icon flag-icon-us flag-icon-squared"></i></td>
                                            <td>Adam Inzaghi</td>
                                            <td>Rp. 400.000</td>
                                            <td>21/12/2024</td>
                                            <td>Belum Dikembalikan</td>
                                        </tr>
                                        <tr>
                                            <td><i class="flag-icon flag-icon-us flag-icon-squared"></i></td>
                                            <td>Martin Marunung</td>
                                            <td>Rp. 350.000</td>
                                            <td>20/12/2024</td>
                                            <td>Belum Dikembalikan</td>
                                        </tr>
                                        <tr>
                                            <td><i class="flag-icon flag-icon-us flag-icon-squared"></i></td>
                                            <td>Tatang Patudin</td>
                                            <td>Rp. 100.000</td>
                                            <td>19/12/2024</td>
                                            <td>Belum Dikembalikan</td>
                                        </tr>
                                        <tr>
                                            <td><i class="flag-icon flag-icon-us flag-icon-squared"></i></td>
                                            <td>Arya Fadhil Sagitarisandy</td>
                                            <td>Rp. 200.000</td>
                                            <td>18/12/2024</td>
                                            <td>Belum Dikembalikan</td>
                                        </tr>
                                        <tr>
                                            <td><i class="flag-icon flag-icon-us flag-icon-squared"></i></td>
                                            <td>Agus Lore</td>
                                            <td>Rp. 100.000</td>
                                            <td>17/12/2024</td>
                                            <td>Belum Dikembalikan</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <h2>
            Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!
        </h2> -->
<!-- 
        <a href="tampilan/form_barang.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">
            Tambah Barang
        </a>

        <a href="tampilan/form_member.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">
            Tambah Member
        </a>

        <a href="tampilan/member.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">
            Data Member
        </a>

        <a href="tampilan/form_order.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">
            Tambah Orderan
        </a>

        <a href="tampilan/barang.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">
            Data Barang
        </a> -->
        
        <!-- <p>
            <a href="proses/proses_logout.php">
                Logout
            </a>
        </p> -->
    </body>
</html>