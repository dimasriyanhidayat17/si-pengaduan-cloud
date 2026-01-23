<?php
$url = getenv("DATABASE_URL");

if (!$url) {
    die("❌ DATABASE_URL belum kebaca");
}

$db = parse_url($url);

$conn = new mysqli(
    $db["host"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/"),
    $db["port"]
);

if ($conn->connect_error) {
    die("❌ DB gagal: " . $conn->connect_error);
}

echo "✅ PHP + DATABASE Railway aman!";
?>
