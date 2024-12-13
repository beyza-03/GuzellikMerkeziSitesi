<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Serenity Beauty</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>Serenity Beauty</h1>
        </div>
        <nav>
            <ul>
                <li><a href="anasayfa.php">AnaSayfa</a></li>
                <li><a href="hizmetler.php">Hizmetler</a></li>
                <li><a href="ekip.php">Ekip</a></li>
                <li><a href="index.php">Randevu Al</a></li>
                <?php
                session_start();
                if (isset($_SESSION['adminID'])) {
                    echo '<li><a href="panel.php">Admin Paneli</a></li>';
                    echo '<li><a href="admin-signout.php">Çıkış Yap</a></li>';
                } else {
                    echo '<li><a href="admin-login.php">Admin Giriş</a></li>';
                }
                ?>
            </ul>
        </nav>
            </header>

    <section class="hero">
        <div class="hero-content">
            <h2>Kendinizi Baştan Yaratın</h2>
            <p>Profesyonel Saç ve Güzellik Hizmetleri</p>
            <a href="index.php" class="btn">Randevu Al</a>
        </div>
    </section>

    <section class="campaigns">
    <h2>Kampanyalarımız</h2>
    <div class="slider-container">
        <div class="slider">
            <?php
            $conn = new mysqli('localhost', 'root', '', 'kuafor_vt');
            if ($conn->connect_error) {
                die("Bağlantı hatası: " . $conn->connect_error);
            }

            $result = $conn->query("SELECT * FROM kampanyalar");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="slide">';
                    echo '<img src="' . htmlspecialchars($row['resim']) . '" alt="' . htmlspecialchars($row['baslik']) . '">';
                    echo '<h3>' . htmlspecialchars($row['baslik']) . '</h3>';
                    echo '<p>' . htmlspecialchars($row['aciklama']) . '</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>Henüz kampanya bulunmamaktadır.</p>';
            }
            $conn->close();
            ?>
        </div>

        <!-- Sağ ve Sol Oklar -->
        <button class="prev" onclick="prevSlide()">&#10094;</button>
        <button class="next" onclick="nextSlide()">&#10095;</button>
    </div>
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
