<?php
session_start();
if (!isset($_SESSION['adminID'])) {
    header("Location: admin-login.php");
    exit();
}

// Veritabanı bağlantısı
$conn = new mysqli('localhost', 'root', '', 'kuafor_vt');
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Kampanya ekleme
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_campaign'])) {
    $baslik = $conn->real_escape_string($_POST['baslik']);
    $aciklama = $conn->real_escape_string($_POST['aciklama']);
    $resim = $conn->real_escape_string($_POST['resim']);

    $sql = "INSERT INTO kampanyalar (baslik, aciklama, resim) VALUES ('$baslik', '$aciklama', '$resim')";
    if ($conn->query($sql) === TRUE) {
        header("Location: panel.php");
        exit();
    } else {
        echo "Hata: " . $conn->error;
    }
}

// Kampanya silme
if (isset($_GET['delete_campaign'])) {
    $id = intval($_GET['delete_campaign']); // ID'yi güvenli bir şekilde alıyoruz
    if ($id > 0) { // ID'nin geçerli bir değer olup olmadığını kontrol ediyoruz
        $sql = "DELETE FROM kampanyalar WHERE kampanyaID = $id"; // Kampanya silme sorgusu
        if ($conn->query($sql) === TRUE) {
            header("Location: panel.php"); // Başarılıysa yeniden yönlendirme
            exit();
        } else {
            echo "Hata: " . $conn->error; // Hata mesajı göster
        }
    } else {
        echo "Geçersiz kampanya ID'si.";
    }
}




// Hizmet ekleme
if (isset($_POST['add_service'])) {
    $baslik = $conn->real_escape_string($_POST['baslik']);
    $aciklama = $conn->real_escape_string($_POST['aciklama']);
    $fiyat = floatval($_POST['fiyat']);
    $resim = $conn->real_escape_string($_POST['resim']);

    $sql = "INSERT INTO hizmetler (baslik, aciklama, fiyat, resim) VALUES ('$baslik', '$aciklama', $fiyat, '$resim')";
    if ($conn->query($sql) === TRUE) {
        header("Location: panel.php");
        exit();
    } else {
        echo "Hata: " . $conn->error;
    }
}

// Hizmet silme
if (isset($_GET['delete_service'])) {
    $id = intval($_GET['delete_service']);
    $sql = "DELETE FROM hizmetler WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: panel.php");
        exit();
    } else {
        echo "Hata: " . $conn->error;
    }
}

// Ekip üyesi ekleme
if (isset($_POST['add_member'])) {
    $isim = $conn->real_escape_string($_POST['isim']);
    $unvan = $conn->real_escape_string($_POST['unvan']);
    $aciklama = $conn->real_escape_string($_POST['aciklama']);
    $resim = $conn->real_escape_string($_POST['resim']);
    $instagram = $conn->real_escape_string($_POST['instagram']);
    $facebook = $conn->real_escape_string($_POST['facebook']);
    $twitter = $conn->real_escape_string($_POST['twitter']);

    $sql = "INSERT INTO ekip (isim, unvan, aciklama, resim, sosyal_instagram, sosyal_facebook, sosyal_twitter) 
            VALUES ('$isim', '$unvan', '$aciklama', '$resim', '$instagram', '$facebook', '$twitter')";
    if ($conn->query($sql) === TRUE) {
        header("Location: panel.php");
        exit();
    } else {
        echo "Hata: " . $conn->error;
    }
}

// Ekip üyesi silme
if (isset($_GET['delete_member'])) {
    $id = intval($_GET['delete_member']);
    $sql = "DELETE FROM ekip WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: panel.php");
        exit();
    } else {
        echo "Hata: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Paneli - Serenity Beauty</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        header {
            background-color: #f4f4f4;
            padding: 15px;
            text-align: center;
            border-bottom: 2px solid #ccc;
        }

        h1, h2, h3 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f4f4f4;
        }

        form {
            margin: 20px 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        form label {
            font-weight: bold;
        }

        form input, form textarea, form button {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        form button:hover {
            background-color: #45a049;
        }

        .action-links a {
            color: red;
            text-decoration: none;
        }

        .action-links a:hover {
            text-decoration: underline;
        }

        .tab-buttons {
            display: flex;
            cursor: pointer;
            margin-bottom: 20px;
        }

        .tab-button {
            padding: 10px;
            margin-right: 10px;
            background-color: #f4f4f4;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .tab-button.active {
            background-color: #4CAF50;
            color: white;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .back-button {
            margin-top: 20px;
        }

        .back-button a {
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
        }

        .back-button a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<header>
    <h1>Admin Paneli</h1>
    <div class="back-button"><a href="anasayfa.php">Anasayfaya Dön</a></div>
</header>

<div class="tab-buttons">
    <div class="tab-button active" data-tab="kampanyalar">Kampanyalar</div>
    <div class="tab-button" data-tab="hizmetler">Hizmetler</div>
    <div class="tab-button" data-tab="ekip">Ekip</div>
</div>

<section id="kampanyalar" class="tab-content active">
    <h2>Kampanyalar</h2>
    <table>
        <tr>
            <th>Başlık</th>
            <th>Açıklama</th>
            <th>Resim</th>
            <th>İşlem</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM kampanyalar");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['baslik']) . "</td>";
                echo "<td>" . htmlspecialchars($row['aciklama']) . "</td>";
                echo "<td><img src='" . htmlspecialchars($row['resim']) . "' alt='Kampanya Resmi' style='max-width: 100px;'></td>";
                echo "<td class='action-links'><a href='panel.php?delete_campaign=" . $row['kampanyaID'] . "' onclick=\"return confirm('Bu kampanyayı silmek istediğinizden emin misiniz?')\">Sil</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Henüz kampanya bulunmamaktadır.</td></tr>";
        }
        ?>
    </table>

    <h3>Kampanya Ekle</h3>
    <form method="POST">
        <label for="baslik">Başlık:</label>
        <input type="text" name="baslik" id="baslik" required>
        <label for="aciklama">Açıklama:</label>
        <textarea name="aciklama" id="aciklama" required></textarea>
        <label for="resim">Resim URL:</label>
        <input type="text" name="resim" id="resim" required>
        <button type="submit" name="add_campaign">Kampanya Ekle</button>
    </form>
</section>

<section id="hizmetler" class="tab-content">
    <h2>Hizmetler</h2>
    <table>
        <tr>
            <th>Başlık</th>
            <th>Açıklama</th>
            <th>Fiyat</th>
            <th>Resim</th>
            <th>İşlem</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM hizmetler");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['baslik']) . "</td>";
                echo "<td>" . htmlspecialchars($row['aciklama']) . "</td>";
                echo "<td>" . htmlspecialchars($row['fiyat']) . " TL</td>";
                echo "<td><img src='" . htmlspecialchars($row['resim']) . "' alt='Hizmet Resmi' style='max-width: 100px;'></td>";
                echo "<td class='action-links'><a href='panel.php?delete_service=" . $row['id'] . "' onclick=\"return confirm('Bu hizmeti silmek istediğinizden emin misiniz?')\">Sil</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Henüz hizmet bulunmamaktadır.</td></tr>";
        }
        ?>
    </table>

    <h3>Hizmet Ekle</h3>
    <form method="POST">
        <label for="baslik">Başlık:</label>
        <input type="text" name="baslik" id="baslik" required>
        <label for="aciklama">Açıklama:</label>
        <textarea name="aciklama" id="aciklama" required></textarea>
        <label for="fiyat">Fiyat:</label>
        <input type="text" name="fiyat" id="fiyat" required>
        <label for="resim">Resim URL:</label>
        <input type="text" name="resim" id="resim" required>
        <button type="submit" name="add_service">Hizmet Ekle</button>
    </form>
</section>

<section id="ekip" class="tab-content">
    <h2>Ekip Üyeleri</h2>
    <table>
        <tr>
            <th>İsim</th>
            <th>Ünvan</th>
            <th>Açıklama</th>
            <th>Resim</th>
            <th>Sosyal Medya</th>
            <th>İşlem</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM ekip");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['isim']) . "</td>";
                echo "<td>" . htmlspecialchars($row['unvan']) . "</td>";
                echo "<td>" . htmlspecialchars($row['aciklama']) . "</td>";
                echo "<td><img src='" . htmlspecialchars($row['resim']) . "' alt='Ekip Resmi' style='max-width: 100px;'></td>";
                echo "<td><a href='" . htmlspecialchars($row['sosyal_instagram']) . "'>Instagram</a> | <a href='" . htmlspecialchars($row['sosyal_facebook']) . "'>Facebook</a> | <a href='" . htmlspecialchars($row['sosyal_twitter']) . "'>Twitter</a></td>";
                echo "<td class='action-links'><a href='panel.php?delete_member=" . $row['id'] . "' onclick=\"return confirm('Bu ekip üyesini silmek istediğinizden emin misiniz?')\">Sil</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Henüz ekip üyesi bulunmamaktadır.</td></tr>";
        }
        ?>
    </table>

    <h3>Ekip Üyesi Ekle</h3>
    <form method="POST">
        <label for="isim">İsim:</label>
        <input type="text" name="isim" id="isim" required>
        <label for="unvan">Ünvan:</label>
        <input type="text" name="unvan" id="unvan" required>
        <label for="aciklama">Açıklama:</label>
        <textarea name="aciklama" id="aciklama" required></textarea>
        <label for="resim">Resim URL:</label>
        <input type="text" name="resim" id="resim" required>
        <label for="instagram">Instagram:</label>
        <input type="text" name="instagram" id="instagram" required>
        <label for="facebook">Facebook:</label>
        <input type="text" name="facebook" id="facebook" required>
        <label for="twitter">Twitter:</label>
        <input type="text" name="twitter" id="twitter" required>
        <button type="submit" name="add_member">Ekip Üyesi Ekle</button>
    </form>
</section>

<script>
    document.querySelectorAll('.tab-button').forEach(button => {
        button.addEventListener('click', function () {
            document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

            this.classList.add('active');
            document.getElementById(this.getAttribute('data-tab')).classList.add('active');
        });
    });
</script>
</body>
</html>
