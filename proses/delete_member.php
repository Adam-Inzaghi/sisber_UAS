<?php

// include database connection file

include_once("koneksi.php");

 

// Get id from URL to delete that user

$id_pelanggan = $_GET['id'];

 

// Delete user row from table based on given id

$result = mysqli_query($conn, "DELETE FROM pelanggan WHERE id_pelanggan=$id_pelanggan");

 

// After delete redirect to Home, so that latest user list will be displayed.

header("Location:../tampilan/member.php");

?>

