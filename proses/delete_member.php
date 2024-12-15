<?php
include_once("koneksi.php");

$id_pelanggan = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan=$id_pelanggan");

header("Location:../tampilan/member.php");

?>

