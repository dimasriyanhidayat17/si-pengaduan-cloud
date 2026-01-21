<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include "config/database.php";
$data = mysqli_query($conn, "SELECT * FROM pengaduan ORDER BY tanggal DESC");
?>


<!DOCTYPE html>
<html>
<head>
    <title>Data Pengaduan</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="navbar">
    <h1>ADMIN PANEL</h1>
    <div>
        <a href="index.php">Input</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Isi Pengaduan</th>
        <th>Tanggal</th>
    </tr>

    <?php $no=1; while($row=mysqli_fetch_assoc($data)) { ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama'] ?></td>
        <td><?= $row['isi'] ?></td>
        <td><?= $row['tanggal'] ?></td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
