<?php
require_once "config/database.php";

$sql = "
DROP TABLE IF EXISTS pengaduan;

CREATE TABLE pengaduan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    isi TEXT NOT NULL
);

DROP TABLE IF EXISTS admin;

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO admin (username, password)
VALUES ('admin', '" . password_hash("admin123", PASSWORD_DEFAULT) . "');
";

$pdo->exec($sql);

echo "✅ Database berhasil di-reset dan tabel dibuat ulang!";
?>
