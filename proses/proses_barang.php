<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipe = $_POST['tipe'];
    $quantity = $_POST['quantity'];
    $harga = $_POST['harga'];

    $stmt = $conn->prepare("INSERT INTO barang (tipe, quantity, harga, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())");
    $stmt->bind_param("sii", $tipe, $quantity, $harga);

    if ($stmt->execute()) {
        header("Location: ../tampilan/barang.php");
    } else {
        echo "Gagal menyimpan data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Metode request tidak valid!";
}
?>
