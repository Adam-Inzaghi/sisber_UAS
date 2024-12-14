<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_barang = $_POST['id_barang'];
    $quantity = $_POST['quantity'];
    $total_payment = $_POST['total_payment'];
    $tgl_pengembalian = $_POST['tgl_pengembalian'];

    $stmt = $conn->prepare("INSERT INTO `order` (id_pelanggan, id_barang, quantity, total_payment, tgl_pengembalian, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())");
    $stmt->bind_param("iiiis", $id_pelanggan, $id_barang, $quantity, $total_payment, $tgl_pengembalian );

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