<?php
require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_order = $_POST['id_order'];

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Step 1: Retrieve the id_barang and quantity from the `order` table
        $stmtSelect = $conn->prepare("SELECT id_barang, quantity FROM `order` WHERE id_order = ?");
        $stmtSelect->bind_param("i", $id_order);
        $stmtSelect->execute();
        $stmtSelect->bind_result($id_barang, $quantity);

        if (!$stmtSelect->fetch()) {
            throw new Exception("Order with id_order = $id_order not found.");
        }
        $stmtSelect->close();

        // Step 2: Update tgl_pengembalian in the `order` table
        $stmtUpdateOrder = $conn->prepare("UPDATE `order` SET tgl_pengembalian = CURDATE(), `status` = 1 WHERE id_order = ?");
        $stmtUpdateOrder->bind_param("i", $id_order);
        if (!$stmtUpdateOrder->execute()) {
            throw new Exception("Failed to update tgl_pengembalian: " . $stmtUpdateOrder->error);
        }
        $stmtUpdateOrder->close();

        // Step 3: Update the quantity in the `barang` table
        $stmtUpdateBarang = $conn->prepare("UPDATE barang SET quantity = quantity + ? WHERE id_barang = ?");
        $stmtUpdateBarang->bind_param("ii", $quantity, $id_barang);
        if (!$stmtUpdateBarang->execute()) {
            throw new Exception("Failed to update barang quantity: " . $stmtUpdateBarang->error);
        }
        $stmtUpdateBarang->close();

        // Commit the transaction
        $conn->commit();

        // Redirect to list_order.php with a success message
        header("Location: ../tampilan/list_order.php");
        exit;

    } catch (Exception $e) {
        // Rollback the transaction on error
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    $conn->close();
} else {
    echo "Invalid request!";
}
?>
