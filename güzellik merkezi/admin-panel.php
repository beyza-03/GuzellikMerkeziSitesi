<?php
session_start();
if (isset($_SESSION['adminID'])) {
    header("Location: admin-panel.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Burada veritabanı kontrolü yapılabilir, bu örnekte sabit bir admin bilgisi kullanalım
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sabit admin bilgisi (bunu veritabanı ile değiştirin)
    if ($username == 'admin' && $password == 'admin123') {
        $_SESSION['adminID'] = $username;
        header("Location: admin-panel.php");
        exit();
    } else {
        $error_message = "Hatalı kullanıcı adı veya şifre.";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Giriş | Serenity Beauty</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>Serenity Beauty - Admin Giriş</h1>
        </div>
    </header>

    <section class="admin-login">
        <h2>Yönetici Girişi</h2>
        <form action="admin-login.php" method="POST">
            <label for="username">Kullanıcı Adı</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Şifre</label>
            <input type="password" name="password" id="password" required>

            <?php
            if (isset($error_message)) {
                echo '<p class="error">'.$error_message.'</p>';
            }
            ?>

            <button type="submit">Giriş Yap</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Serenity Beauty | Tüm Hakları Saklıdır</p>
        <p>Bizi takip edin: 
            <a href="#">Instagram</a> | 
            <a href="#">Facebook</a> | 
            <a href="#">Twitter</a>
        </p>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
