<?php
// include database connection file
require_once '../proses/koneksi.php';

// Check if form is submitted for user update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $tipe = $_POST['tipe'];
    $quantity = $_POST['quantity'];
    $harga = $_POST['harga'];

    // Validate inputs (optional)
    if (!empty($tipe) && !empty($quantity) && !empty($harga)) {
        // Update user data
        $stmt = $conn->prepare("UPDATE `barang` SET tipe = ?, quantity = ?, harga = ? WHERE id_barang = ?");
        $stmt->bind_param("siii", $tipe, $quantity, $harga, $id);

        if ($stmt->execute()) {
            // Redirect to homepage to display updated user in list
            header("Location: barang.php");
        } else {
            echo "Gagal mengupdate data: " . $conn->error;
        }
    } else {
        echo "Harap isi semua field.";
    }
}
?>



<?php
require_once '../proses/koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM `barang` where id_barang=$id");
while ($user_data = mysqli_fetch_array($result)) {
    $tipe = $user_data['tipe'];
    $quantity = $user_data['quantity'];
    $harga = $user_data['harga'];
}
?>

<html>

<head>
    <link rel="stylesheet" href="../css/custom/style.css">

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
                    <li class="nav-item active">
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
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title">
                            Edit Barang
                        </h2>
                    </div>
                </div>

                <form name="update_user" method="post" action="edit_barang.php">
                    <label for="tipe">Tipe Barang:</label><br>
                    <input class="form-control select2" placeholder="<?php echo $tipe; ?>" value="<?php echo $tipe; ?>"  type="text" id="tipe" name="tipe" ><br><br>

                    <label for="quantity">Quantity:</label><br>
                    <input class="form-control select2" placeholder="<?php echo $quantity; ?>" value="<?php echo $quantity; ?>" type="number" id="quantity" name="quantity" ><br><br>

                    <label for="harga">Harga:</label><br>
                    <input class="form-control select2" placeholder="<?php echo $harga; ?>" value="<?php echo $harga; ?>" type="number" id="harga" name="harga" ><br><br>
                    <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </form>

                <div class="az-dashboard-one-title">
                </div>
            </div>
        </div>

</body>

</html>