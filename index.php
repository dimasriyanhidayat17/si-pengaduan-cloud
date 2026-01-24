require_once "config/database.php";

if (isset($_POST['kirim'])) {

    $nama   = $_POST['nama'];
    $isi    = $_POST['isi'];

    $stmt = $pdo->prepare("INSERT INTO pengaduan (nama, isi) VALUES (?, ?)");
    $stmt->execute([$nama, $isi]);

    echo "✅ Pengaduan berhasil dikirim!";
}


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

