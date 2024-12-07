<?php 

$host = "127.0.0.1"; 
$username = "root"; 
$password = "password"; 
$database = "example"; 

$conn = new mysqli($host, $username, $password, $database, 3308); 

if ($conn->connect_error) { 
    die("Koneksi gagal: " . $conn->connect_error); 
} 

?>