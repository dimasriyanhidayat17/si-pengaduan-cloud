<?php
$url = getenv("DATABASE_URL");

if (!$url) {
    die("❌ DATABASE_URL belum kebaca");
}

$db = parse_url($url);

$host = $db["host"];
$user = $db["user"];
$pass = $db["pass"];
$name = ltrim($db["path"], "/");
$port = $db["port"];

$conn = new mysqli($host, $user, $pass, $name, $port);

if ($conn->connect_error) {
    die("❌ Gagal konek DB: " . $conn->connect_error);
}

echo "✅ DATABASE Railway berhasil terhubung!";
?>
