<?php

session_start();

// Redirect to login.php if the user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: tampilan/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script> -->
<!-- <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-90680653-2');
</script> -->

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-ti-fit=no">

<!-- <link href="../lib/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="../lib/typicons.font/typicons.css" rel="stylesheet">
<link href="../lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet"> -->

<link rel="stylesheet" href="./css/custom/style.css">
</head>

<body>

    <!-- az-header left -->
    <div class="az-header">
        <div class="container">
            <div class="az-header-left">
                <a href="index.html" class="az-logo"><span></span>Logo</a>
                <a href="" id="azMenuShow" class="az-header-menu-icon d-lg-none"><span></span></a>
            </div>
        </div>
    </div>
    <!-- az-header-left -->

    <!-- az-header-menu-header -->
    <div class="az-header-menu">
        <div class="az-header-menu-header">
            <a href="az-header-menu-header" class="az-logo"><span></span>Logo</a>
            <a href="" class="close">&times;</a>
        </div>
    </div>
    <!-- az-header-menu-header -->

    <h2>Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <a href="./tampilan/form_barang.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; 
    border-radius: 5px;">Tambah Barang</a>
     <a href="./tampilan/form_member.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; 
    border-radius: 5px;">Tambah Member</a>
    <a href="./tampilan/member.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; 
    border-radius: 5px;">Data Member</a>
    <a href="./tampilan/form_order.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; 
    border-radius: 5px;">Tambah Orderan</a>
    <p><a href="proses/proses_logout.php">Logout</a></p>
    <!-- <script src="../js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
</body>

</html>