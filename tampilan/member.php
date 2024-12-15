<?php
require_once '../proses/koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM pelanggan ORDER BY id_pelanggan ASC");
?>
 
<html>
    <head>    
        <title>Homepage</title>
    </head>
    <body>
        <table width='80%' border='1'>
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
                    echo "<td><a href='edit.php?id=$user_data[id_pelanggan]'>Edit</a> | <a href='../proses/delete_member.php?id=$user_data[id_pelanggan]'>Delete</a></td></tr>";        
                }
            ?>
        </table>
        
        <br>

        <a href="form_member.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">Tambah Member</a>
        <a href="../index.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">Menu Utama</a>
    </body>
</html>