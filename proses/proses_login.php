<?php 

session_start();

include("koneksi.php"); 

$username = $_POST['username']; 
$password = $_POST['password']; 

$sql = "SELECT * FROM user WHERE username = ?"; 
$stmt = $conn->prepare($sql); 
$stmt->bind_param("s", $username); 
$stmt->execute(); 
$result = $stmt->get_result(); 

if ($result->num_rows > 0) { 
    $user = $result->fetch_assoc(); 
    if (password_verify($password, $user['password'])) { 
        $_SESSION['username'] = $username; 
        header("Location: ../index.php"); 
        exit; 
    } else { 
        header("Location: ../tampilan/login.php?error=password_salah"); 
        exit; 
    } 
} else { 
    header("Location: ../tampilan/login.php?error=username_tidak_ditemukan"); 
    exit; 
} 

$conn->close(); 

?>
