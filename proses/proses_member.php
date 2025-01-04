<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];


    $stmt = $conn->prepare("INSERT INTO pelanggan (nama, no_hp, created_at, updated_at) VALUES (?, ?, NOW(), NOW())");
    $stmt->bind_param("ss", $nama, $no_hp);

    if ($stmt->execute()) {
        header("Location: ../tampilan/member.php");
    } else {
        echo "Gagal menyimpan data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Metode request tidak valid!";
}
?>
