<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pelanggan = $_POST['id_pelanggan'];
    $id_barang = $_POST['id_barang'];
    $quantity = $_POST['quantity'];
    $total_payment = $_POST['total_payment'];
    $tgl_pengembalian = $_POST['tgl_pengembalian'];

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Insert into the `order` table
        $stmt = $conn->prepare("INSERT INTO `order` (id_pelanggan, id_barang, quantity, total_payment, tgl_pengembalian, created_at, updated_at) VALUES (?, ?, ?, ?, ?, NOW(), NOW())");
        $stmt->bind_param("iiiis", $id_pelanggan, $id_barang, $quantity, $total_payment, $tgl_pengembalian);

        if (!$stmt->execute()) {
            throw new Exception("Failed to insert order: " . $stmt->error);
        }

        // Update the `barang` table's quantity
        $stmtUpdate = $conn->prepare("UPDATE barang SET quantity = quantity - ? WHERE id_barang = ?");
        $stmtUpdate->bind_param("ii", $quantity, $id_barang);

        if (!$stmtUpdate->execute()) {
            throw new Exception("Failed to update barang: " . $stmtUpdate->error);
        }

        // Commit the transaction
        $conn->commit();

        // echo "Data berhasil disimpan dan stok barang berhasil diperbarui!<br>";
        // echo "<a href='../tampilan/form_order.php'>Tambah Order Lagi</a><br>";
        // echo "<a href='../index.php'>Kembali ke Menu Utama</a>";

        header("Location: ../tampilan/list_order.php");
    } catch (Exception $e) {
        // Rollback the transaction on error
        $conn->rollback();
        echo "Terjadi kesalahan: " . $e->getMessage();
    }

    $stmt->close();
    $stmtUpdate->close();
    $conn->close();
} else {
    echo "Metode request tidak valid!";
}
?>
