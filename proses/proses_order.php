<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];


    $stmt = $conn->prepare("INSERT INTO pelanggan (nama, no_hp, created_at, updated_at) VALUES (?, ?, NOW(), NOW())");
    $stmt->bind_param("ss", $nama, $no_hp);

    if ($stmt->execute()) {
        echo "Data berhasil disimpan!<br>";
        echo "<a href='../tampilan/form_member.php'>Tambah Barang Lagi</a>";
    } else {
        echo "Gagal menyimpan data: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Metode request tidak valid!";
}
?>