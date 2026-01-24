<?php
session_start();
require_once "config/database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM admin WHERE username=?");
    $stmt->execute([$username]);

    $admin = $stmt->fetch();

    if ($admin && password_verify($password, $admin['password'])) {

        $_SESSION['admin'] = $admin['username'];

        header("Location: dashboard.php");
        exit;

    } else {
        $error = "❌ Username atau Password salah!";
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

    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
