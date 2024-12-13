<?php
// Oturumu başlatın
session_start();

// Hata raporlamayı etkinleştirin (geliştirme sırasında kullanışlıdır)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Header dosyasını dahil edin
include_once './header.php';
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Randevu Sistemi</title>
    <link rel="stylesheet" href="css/style5.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>Serenity Beauty</h1>
        </div>
        <nav>
            <ul>
                <li><a href="anasayfa.php">Ana Sayfa</a></li>
                <li><a href="hizmetler.php">Hizmetler</a></li>
                <li><a href="ekip.php">Ekip</a></li>
                <li><a href="index.php">Randevu Al</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1 class="fw-bold mt-5 p-3 pt-5 fs-1"> Randevu Sistemi</h1>
        <ul class="navigation mx-auto shadow-lg border rounded-4">
            <li class="rounded p-3"><a href="./appts.php">Randevular</a></li>
            <li class="rounded p-3"><a href="./makeAppt.php">Randevu Oluştur</a></li>
            <?php
            if (!(isset($_SESSION["userID"]) || isset($_SESSION["adminID"]))) {
                echo '<li class="rounded p-3"><a href="signin.php">Giriş Yap/Kaydol</a></li>';
            } else {
                echo '<li class="rounded p-3"><a href="./includes/signout-inc.php">Çıkış</a></li>';
            }
            ?>
        </ul>

        <?php
        // Hataları göstermek için
        if (isset($_GET["error"])) {
            if ($_GET["error"] === 'stmtfail') {
                echo '<div class="m-5"><span class="p-4 bg-danger card fs-1 d-inline text-dark fw-bold">Veritabanına bağlanılamadı!</span></div>';
            }
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2024 Serenity Beauty | Tüm Hakları Saklıdır</p>
        <p>Follow us: 
            <a href="#">Instagram</a> | 
            <a href="#">Facebook</a> | 
            <a href="#">Twitter</a>
        </p>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>

<?php
// Footer dosyasını dahil edin
include_once './footer.php';
?>
