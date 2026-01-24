<?php
require_once "config/database.php";

$sql = "CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

$pdo->exec($sql);

$username = "admin";
$password = password_hash("admin123", PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT IGNORE INTO admin (username, password) VALUES (?, ?)");
$stmt->execute([$username, $password]);

echo "✅ Tabel admin berhasil dibuat! <br>";
echo "Username: admin <br>";
echo "Password: admin123 <br>";
?>
