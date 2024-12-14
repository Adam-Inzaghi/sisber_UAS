<?php
// Create database connection using config file
// include_once("../proses/koneksi.php");
require_once '../proses/koneksi.php';
 
// Fetch all users data from database
$result = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY id_pelanggan DESC");
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<!-- <a href="add.php">Add New User</a><br/><br/> -->
 
    <table width='80%' border=1>
 
    <tr>
        <th>id pelanggan</th> 
        <th>nama</th> 
        <th>nomor hp</th> 
        <th>action</th> 
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id_pelanggan']."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['no_hp']."</td>";  
        echo "<td><a href='edit.php?id=$user_data[id_pelanggan]'>Edit</a> | <a href='delete.php?id=$user_data[id_pelanggan]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>