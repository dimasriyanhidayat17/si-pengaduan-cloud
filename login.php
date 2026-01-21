<?php
session_start();
include "config/database.php";

if (isset($_POST['username'])) {
    $u = $_POST['username'];
    $p = md5($_POST['password']);

    $q = mysqli_query($conn, "SELECT * FROM admin WHERE username='$u' AND password='$p'");
    if (mysqli_num_rows($q) > 0) {
        $_SESSION['admin'] = $u;
        header("Location: list.php");
        exit;
    } else {
        $error = "Login gagal";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="navbar">
    <h1>ADMIN LOGIN</h1>
</div>

<div class="container">
    <h2>Login Admin</h2>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
