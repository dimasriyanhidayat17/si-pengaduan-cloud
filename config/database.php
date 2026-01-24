<?php
$url = getenv("DATABASE_URL");

$db = parse_url($url);

$host = $db["host"];
$user = $db["user"];
$pass = $db["pass"];
$port = $db["port"];
$name = ltrim($db["path"], "/");

try {
    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$name",
        $user,
        $pass
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("DB Error: " . $e->getMessage());
}
?>
