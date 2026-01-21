<?php
include "config/database.php";

mysqli_query($conn, "
CREATE TABLE IF NOT EXISTS pengaduan (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100),
  isi TEXT,
  tanggal DATETIME DEFAULT CURRENT_TIMESTAMP
)");

mysqli_query($conn, "
CREATE TABLE IF NOT EXISTS admin (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(255)
)");

mysqli_query($conn, "
INSERT INTO admin (username, password)
SELECT 'admin', MD5('admin')
WHERE NOT EXISTS (SELECT 1 FROM admin WHERE username='admin')
");

echo "OK DATABASE SUDAH JADI";
