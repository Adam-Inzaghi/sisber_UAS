<?php
    require_once 'proses/koneksi.php';
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: tampilan/login.php");
        exit();
    }

    // Default bulan dan tahun adalah bulan dan tahun saat ini
    $bulan = isset($_GET['bulan']) ? $_GET['bulan'] : date('m');
    $tahun = isset($_GET['tahun']) ? $_GET['tahun'] : date('Y');

    // Ambil data untuk tabel List Sewa berdasarkan bulan dan tahun
    $result = mysqli_query($conn, 
        "SELECT o.id_order, m.nama, b.tipe, o.quantity, o.total_payment, o.tgl_pengembalian 
         FROM `order` o 
         LEFT JOIN `pelanggan` m ON o.id_pelanggan = m.id_pelanggan 
         LEFT JOIN `barang` b ON o.id_barang = b.id_barang 
         WHERE MONTH(o.tgl_pengembalian) = '$bulan' AND YEAR(o.tgl_pengembalian) = '$tahun' 
         ORDER BY o.id_order ASC"
    );

    // Ambil data untuk Chart.js berdasarkan bulan dan tahun
    $query = "SELECT b.tipe, SUM(o.quantity) as total_sewa 
              FROM `order` o 
              LEFT JOIN `barang` b ON o.id_barang = b.id_barang 
              WHERE MONTH(o.tgl_pengembalian) = '$bulan' AND YEAR(o.tgl_pengembalian) = '$tahun' 
              GROUP BY b.tipe";
    $chart_result = mysqli_query($conn, $query);

    $labels = [];
    $data = [];

    while ($row = mysqli_fetch_assoc($chart_result)) {
        $labels[] = $row['tipe'];
        $data[] = $row['total_sewa'];
    }

    // Ambil total penghasilan
    $income_query = "SELECT SUM(o.total_payment) as total_penghasilan 
                     FROM `order` o 
                     WHERE MONTH(o.tgl_pengembalian) = '$bulan' AND YEAR(o.tgl_pengembalian) = '$tahun'";
    $income_result = mysqli_fetch_assoc(mysqli_query($conn, $income_query));
    $total_penghasilan = $income_result['total_penghasilan'] ?? 0;

    //total barang tersedia
    $barang_tersedia = "SELECT SUM(quantity) AS total_quantity FROM `order` o";
    $result_barang_tersedia = mysqli_fetch_assoc(mysqli_query($conn, $barang_tersedia));
    $total_quantity = $result_barang_tersedia['total_quantity'];
?>
<html>
    <head>
        <link rel="stylesheet" href="./css/custom/style.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>
    <body>
        <div class="az-header">
            <div class="container">
                <div class="az-header-left">
                    <a href="index.php" class="az-logo">Tatang Playstation</a>
                    <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
                </div>
                <div class="az-header-menu">
                    <div class="az-header-menu-header">
                        <a href="index.php" class="az-logo"><span></span> azia</a>
                        <a href="" class="close">&times;</a>
                    </div>
                    <ul class="nav">
                        <li class="nav-item active">
                        <a href="index.php" class="nav-link"><i class="typcn typcn-chart-area-outline"></i>Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="tampilan/barang.php" class="nav-link"><i class="typcn typcn-document"></i>List Barang</a>
                        </li>
                        <li class="nav-item">
                            <a href="tampilan/list_order.php" class="nav-link"><i class="typcn typcn-document"></i>List Sewa</a>
                        </li>
                        <li class="nav-item">
                            <a href="tampilan/member.php" class="nav-link"><i class="typcn typcn-document"></i>List Member</a>
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
                        <!-- <div class="az-content-header-right">
                            <a href="form_order.php" class="btn btn-purple">+ SEWA</a>
                        </div> -->
                    </div>


                    <div class="row row-sm mg-b-20 mg-lg-b-0">
                        <div class="col-lg-5 col-xl-4">
                            <div class="row row-sm">
                                <div class="col-md-6 col-lg-12 mg-b-20 mg-md-b-0 mg-lg-b-20">
                                    <div class="card card-dashboard-five">
                                        <div class="card-header">
                                            <h6 class="card-title">Barang Tersedia</h6>
                                        </div>
                                        <div class="card-body row row-sm">
                                            <div class="col-6 d-sm-flex align-items-center">
                                                <div>
                                                    <h2><?php echo $total_quantity; ?></h2>
                                                    <label>Playstation</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-12 mg-b-20 mg-md-b-0 mg-lg-b-20">
                                    <div class="card card-dashboard-five">
                                        <div class="card-header">
                                            <h6 class="card-title">Barang Disewa</h6>
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
                                <h6 class="card-title">Statistik Penyewaan</h6>
                                <br>
                                
                                <div class="az-content-header-right">
                                    <form method="GET" class="form-inline">
                                        <select name="bulan" class="form-control">
                                            <?php
                                            for ($i = 1; $i <= 12; $i++) {
                                                $selected = ($i == $bulan) ? 'selected' : '';
                                                echo "<option value='$i' $selected>" . date('F', mktime(0, 0, 0, $i, 1)) . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <select name="tahun" class="form-control">
                                            <?php
                                            for ($i = 2020; $i <= date('Y'); $i++) {
                                                $selected = ($i == $tahun) ? 'selected' : '';
                                                echo "<option value='$i' $selected>$i</option>";
                                            }
                                            ?>
                                        </select>
                                        <button type="submit" class="btn btn-purple">Filter</button>
                                    </form>
                                </div>

                                <div class="card-body">
                                    <canvas id="myBarChart"></canvas>
                                </div>
                            </div>

                            

                            <script>
                                const labels = <?php echo json_encode($labels); ?>;
                                const data = <?php echo json_encode($data); ?>;
                                const totalPenghasilan = <?php echo json_encode($total_penghasilan); ?>;

                                const ctx = document.getElementById('myBarChart').getContext('2d');
                                const myBarChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: labels,
                                        datasets: [
                                            {
                                                label: 'Jumlah Sewa',
                                                data: data,
                                                backgroundColor: 'rgba(110, 66, 193, 0.24)',
                                                borderColor: 'rgba(111, 66, 193, 1)',
                                                borderWidth: 1
                                            },
                                            {
                                                label: 'Total Penghasilan',
                                                data: Array(labels.length).fill(totalPenghasilan),
                                                backgroundColor: 'rgba(66, 193, 110, 0.24)',
                                                borderColor: 'rgba(66, 193, 110, 1)',
                                                borderWidth: 1
                                            }
                                        ]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    }
                                });
                            </script>
                        </div>
                </div>
            </div>
        </div>
    </body>
</html>