<?php
session_start();

/* ✅ Proteksi halaman: hanya admin boleh lihat data */
if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

require_once "config/database.php";

/* ✅ Ambil semua pengaduan */
$stmt = $pdo->query("SELECT * FROM pengaduan ORDER BY id DESC");
$data = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Pengaduan</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="navbar">
    <h1>SI PENGADUAN</h1>
    <div>
        <a href="list.php">Data Pengaduan</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="container">
    <h2>Daftar Pengaduan Masuk</h2>

    <table border="1" width="100%" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Isi Pengaduan</th>
        </tr>

        <?php if (count($data) > 0): ?>
            <?php $no = 1; foreach ($data as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['isi']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" align="center">Belum ada pengaduan masuk</td>
            </tr>
        <?php endif; ?>
    </table>

</div>

</body>
</html>
