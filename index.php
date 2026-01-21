<?php
include "config/database.php";

if (isset($_POST['nama'])) {
    $nama = $_POST['nama'];
    $isi  = $_POST['isi'];
    mysqli_query($conn, "INSERT INTO pengaduan (nama, isi) VALUES ('$nama', '$isi')");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Input Pengaduan</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="navbar">
    <h1>SI PENGADUAN</h1>
    <div>
        <a href="index.php">Input</a>
        <a href="list.php">Data</a>
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="container">
    <h2>Input Pengaduan</h2>

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
