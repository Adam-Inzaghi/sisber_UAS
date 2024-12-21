<?php
// include database connection file
require_once '../proses/koneksi.php';

// Check if form is submitted for user update
if (isset($_POST['update'])) {
    $id_pelanggan = $_POST['id_pelanggan'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];

    // Validate inputs (optional)
    if (!empty($nama) && !empty($no_hp)) {
        // Update user data
        $stmt = $conn->prepare("UPDATE `pelanggan` SET nama = ?, no_hp = ?  WHERE id_pelanggan = ?");
        $stmt->bind_param("ssi", $nama, $no_hp, $id_pelanggan);

        if ($stmt->execute()) {
            // Redirect to homepage to display updated user in list
            header("Location: member.php");
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
$id_pelanggan = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM `pelanggan` where id_pelanggan=$id_pelanggan");
while ($user_data = mysqli_fetch_array($result)) {
    $nama = $user_data['nama'];
    $no_hp = $user_data['no_hp'];   
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
                            Edit Member
                        </h2>
                    </div>
                </div>

                <form name="update_user" method="post" action="edit_member.php">
                    <label for="nama">Nama :</label><br>
                    <input class="form-control select2" placeholder="<?php echo $nama; ?>" value="<?php echo $nama; ?>"  type="text" id="nama" name="nama" ><br><br>

                    <label for="no_hp">No Handphone </label><br>
                    <input class="form-control select2" placeholder="<?php echo $no_hp; ?>" value="<?php echo $no_hp; ?>" type="text" id="no_hp" name="no_hp" ><br><br>

                    <td><input type="hidden" name="id_pelanggan" value=<?php echo $_GET['id'];?>></td>
                    <td><input type="submit" name="update" value="Update"></td>
                </form>

                <div class="az-dashboard-one-title">
                </div>
            </div>
        </div>

</body>

</html>