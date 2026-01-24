<?php
require_once "config/database.php";

$pdo->exec("
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255)
)");

$user = "admin";
$pass = password_hash("admin123", PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT IGNORE INTO admin(username,password) VALUES (?,?)");
$stmt->execute([$user,$pass]);

echo "✅ Admin dibuat! Login: admin / admin123";
?>
