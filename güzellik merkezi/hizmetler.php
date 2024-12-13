<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serenity Beauty</title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <style>
        /* Genel stil düzenlemeleri */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

      /* Menü alanı */
#menu {
    background-color: #333;
    color: #fff;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 30px; /* Kalınlığı artırmak için padding'i artırdım */
    position: sticky;
    top: 0;
    z-index: 1000;
}

#menu .logo h1 {
    font-size: 28px; /* Font boyutunu artırdım */
    font-weight: bold;
    color: #fff;
}

#menu nav ul {
    list-style: none;
    display: flex;
}

#menu nav ul li {
    margin: 0 20px; /* Boşlukları artırdım */
}

#menu nav ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 18px; /* Font boyutunu artırdım */
    transition: color 0.3s;
    padding: 10px 15px; /* Daha kalın görünmesi için padding'i artırdım */
    border-radius: 4px;
}

#menu nav ul li a:hover {
    background-color: #ff4b5c;
    color: #fff;
}

        section#hizmetler .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        section#hizmetler h3 {
            text-align: center;
            font-size: 30px;
            color: #333;
            margin-bottom: 50px;
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr); /* Her satırda 4 kart olacak şekilde ayarlıyoruz */
            gap: 20px; /* Kartlar arasındaki boşluk */
            justify-items: center; /* Kartları ortala */
            margin-top: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            width: 250px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .card h5 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .card .cardp {
            font-size: 16px;
            color: #ff7f50;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
        }

        footer p {
            margin: 5px 0;
        }

        footer a {
            color: #ff7f50;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Responsive düzenlemeler */
        @media (max-width: 1200px) {
            .card-container {
                grid-template-columns: repeat(3, 1fr); /* 3 kart */
            }
        }

        @media (max-width: 768px) {
            .card-container {
                grid-template-columns: repeat(2, 1fr); /* 2 kart */
            }
        }

        @media (max-width: 480px) {
            .card-container {
                grid-template-columns: 1fr; /* 1 kart */
            }
        }
    </style>
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
            </ul>
        </nav>
    </header>

    <section id="hizmetler">
        <div class="container">
            <h3>HİZMETLER</h3>

            <!-- Dinamik Hizmetler (Veritabanından) -->
            <div class="card-container">
                <?php
                // Veritabanı bağlantısı
                $conn = new mysqli('localhost', 'root', '', 'kuafor_vt');
                if ($conn->connect_error) {
                    die("Bağlantı hatası: " . $conn->connect_error);
                }

                $result = $conn->query("SELECT * FROM hizmetler");
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="card">';
                        echo '<img src="' . htmlspecialchars($row['resim']) . '" alt="" class="img-fluid">';
                        echo '<h5 class="baslikcard">' . htmlspecialchars($row['baslik']) . '</h5>';
                        echo '<p class="cardp">' . htmlspecialchars($row['fiyat']) . ' TL</p>';
                        echo '</div>';
                    }
                } else {
                    echo "<p>Henüz hizmet eklenmemiş.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Serenity Beauty | All Rights Reserved</p>
        <p>Follow us: 
            <a href="#">Instagram</a> | 
            <a href="#">Facebook</a> | 
            <a href="#">Twitter</a>
        </p>
    </footer>
</body>
</html>
