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
                    <a href="index.html" class="az-logo">Logo</a>
                    <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
                </div>
            </div>
        </div>

        <div class="az-header-menu">
            <div class="az-header-menu-header">
                <a href="az-header-menu-header" class="az-logo">Logo</a>
                <a href="" class="close">&times;</a>
            </div>
        </div>

        <h2>
            Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!
        </h2>

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
        </a>
        
        <p>
            <a href="proses/proses_logout.php">
                Logout
            </a>
        </p>
    </body>
</html>