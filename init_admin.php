<?php
require_once "config/database.php";

$stmt = $pdo->prepare(
    "INSERT INTO admin (username, password) VALUES (?, ?)"
);
$stmt->execute(["admin", "admin123"]);

echo "ADMIN BERHASIL DIBUAT";
