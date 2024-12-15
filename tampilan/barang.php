<?php
    require_once '../proses/koneksi.php';
    $result = mysqli_query($conn, "SELECT * FROM barang ORDER BY id_barang DESC");
?>
 
<html>
    <head>    
        <title>Homepage</title>
    </head>
 
    <body>
        <table width='80%'>
            <tr>
                <th>id_barang</th> 
                <th>tipe</th> 
                <th>quantity</th> 
                <th>harga</th> 
                <th>action</th> 
            </tr>
            <?php  
                while($user_data = mysqli_fetch_array($result)) {         
                    echo "<tr>";
                    echo "<td>".$user_data['id_barang']."</td>";
                    echo "<td>".$user_data['tipe']."</td>";
                    echo "<td>".$user_data['quantity']."</td>";    
                    echo "<td>".$user_data['harga']."</td>";  
                    echo "<td><a href='edit.php?id=$user_data[id_barang]'>Edit</a> | <a href='../proses/delete_barang.php?id=$user_data[id_barang]'>Delete</a></td></tr>";        
                }
            ?>
        </table>

        <br>

        <a href="../index.php" class="btn btn-primary" style="text-decoration: none; padding: 10px 20px; background-color: #007bff; color: white; border-radius: 5px;">Menu Utama</a>
    </body>
</html>