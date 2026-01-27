<?php
session_start();

/* ✅ Proteksi halaman: hanya mahasiswa boleh input */
if (!isset($_SESSION['login']) || $_SESSION['role'] != 'mahasiswa') {
    header("Location: login.php");
    exit;
}

require_once "config/database.php";

$success = "";

/* ✅ Proses kirim pengaduan */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nama = $_POST['nama'];
    $isi  = $_POST['isi'];

    $stmt = $pdo->prepare("INSERT INTO pengaduan (nama, isi) VALUES (?, ?)");
    $stmt->execute([$nama, $isi]);

    $success = "✅ Pengaduan berhasil dikirim!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Input Pengaduan</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<?php include "navbar.php"; ?>

    <div>
        <a href="index.php">Input</a>
        <a href="list.php">Data</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="container">
    <h2>Input Pengaduan</h2>

    <?php if (!empty($success)) : ?>
        <p style="color:lime;"><?= $success ?></p>
    <?php endif; ?>

    <form method="post">
        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>Isi Pengaduan</label>
        <textarea name="isi" rows="4" required></textarea>

        <button type="submit">Kirim</button>
    </form>
</div>

</body>
</html>

