<?php

$host = getenv("MYSQLHOST");
$user = getenv("MYSQLUSER");
$pass = getenv("MYSQLPASSWORD");
$dbname = getenv("MYSQLDATABASE");
$port = getenv("MYSQLPORT");

$conn = new mysqli($host, $user, $pass, $dbname, $port);

if ($conn->connect_error) {
    die("❌ Koneksi gagal: " . $conn->connect_error);
}

echo "✅ Database Railway berhasil terkoneksi!";
?>
