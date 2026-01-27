<?php
// navbar.php
?>

<div class="navbar">
    <h1>SI PENGADUAN</h1>

    <div>
        <?php if ($_SESSION['role'] == 'mahasiswa'): ?>
            <!-- Mahasiswa hanya input -->
            <a href="index.php">Input Pengaduan</a>

        <?php elseif ($_SESSION['role'] == 'admin'): ?>
            <!-- Admin hanya data -->
            <a href="list.php">Data Pengaduan</a>

        <?php endif; ?>

        <!-- Semua role bisa logout -->
        <a href="logout.php">Logout</a>
    </div>
</div>
