<?php
$conn = new mysqli('localhost', 'root', '', 'kuafor_vt');
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serenity Beauty - Ekip Arkadaşlarımız</title>
    <link rel="stylesheet" href="css/style3.css">
</head>
<body>
    <section id="menu">
        <div class="logo">
            <h1>Serenity Beauty</h1>
        </div>
        <nav>
            <ul>
                <li><a href="anasayfa.php">AnaSayfa</a></li>
                <li><a href="hizmetler.php">Hizmetler</a></li>
                <li><a href="ekip.php">Ekip</a></li>
                <li><a href="index.php">Randevu Al</a></li>
            </ul>
        </nav>
    </section>
    
    <section id="ekip">
        <h3>EKİP ARKADAŞLARIMIZ</h3>
        <div class="container">
            <!-- Statik Kartlar -->
            
            
            <!-- Dinamik Kartlar -->
            <?php
            $result = $conn->query("SELECT * FROM ekip");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='card'>";
                    echo "<div class='card-inner'>";
                    echo "<div class='card-front'>";
                    echo "<img src='" . $row['resim'] . "' alt='" . $row['isim'] . "'>";
                    echo "<h4>" . $row['isim'] . "</h4>";
                    echo "<p>" . $row['unvan'] . "</p>";
                    echo "</div>";
                    echo "<div class='card-back'>";
                    echo "<h4>" . $row['isim'] . "</h4>";
                    echo "<p>" . $row['aciklama'] . "</p>";
                    echo "<div class='social-media'>";
                    echo "<a href='" . $row['sosyal_facebook'] . "'><i class='fab fa-facebook-f'></i></a>";
                    echo "<a href='" . $row['sosyal_instagram'] . "'><i class='fab fa-instagram'></i></a>";
                    echo "<a href='" . $row['sosyal_twitter'] . "'><i class='fab fa-twitter'></i></a>";
                    echo "</div>";
                    echo "</div></div></div>";
                }
            } else {
                echo "<p>Henüz dinamik ekip üyesi eklenmedi.</p>";
            }
            ?>
        </div>
    </section>
    
    <footer>
        <p>&copy; 2024 Urban Hair Saloon | All Rights Reserved</p>
        <p>Follow us: 
            <a href="#">Instagram</a> | 
            <a href="#">Facebook</a> | 
            <a href="#">Twitter</a>
        </p>
    </footer>

    <script src="script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
</body>
</html>
