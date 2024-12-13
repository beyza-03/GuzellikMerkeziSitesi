<?php
session_start();
if (isset($_SESSION['adminID'])) {
    header("Location: anasayfa.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yönetici Giriş</title>
</head>
<body>
<h2>Yönetici Giriş</h2>
<form action="includes/admin-login-inc.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="password">Şifre:</label>
    <input type="password" name="password" required>
    <button type="submit" name="submit">Giriş Yap</button>
</form>
</body>
</html>
