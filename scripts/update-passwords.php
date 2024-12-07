<?php
include(__DIR__ . '/../proses/koneksi.php');

// Pastikan argumen tersedia
if ($argc < 3) {
    die("Usage: php update-passwords.php <username> <new_password>\n");
}

// Ambil data dari argumen
$username = $argv[1];
$new_password = $argv[2];

// Hash password baru
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
if (!$hashed_password) {
    die("Error: Gagal melakukan hash pada password.\n");
}

// Update password di database
$sql = "UPDATE user SET password = ? WHERE username = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("ss", $hashed_password, $username);
    if ($stmt->execute()) {
        echo "Password berhasil diperbarui.\n";
    } else {
        echo "Error: Gagal memperbarui password.\n";
    }
    $stmt->close();
} else {
    echo "Error: Gagal menyiapkan query.\n";
}

$conn->close();
?>