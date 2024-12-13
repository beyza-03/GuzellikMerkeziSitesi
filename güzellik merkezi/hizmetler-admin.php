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

// Hizmet ekleme
if (isset($_POST['add'])) {
    $baslik = $conn->real_escape_string($_POST['baslik']);
    $aciklama = $conn->real_escape_string($_POST['aciklama']);
    $fiyat = floatval($_POST['fiyat']);
    $resim = $conn->real_escape_string($_POST['resim']);

    $sql = "INSERT INTO hizmetler (baslik, aciklama, fiyat, resim) VALUES ('$baslik', '$aciklama', '$fiyat', '$resim')";
    if ($conn->query($sql) === TRUE) {
        header("Location: hizmetler-admin.php");
        exit();
    } else {
        echo "Hata: " . $conn->error;
    }
}

// Hizmet silme
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']); // Güvenlik için integer'a çeviriyoruz
    $sql = "DELETE FROM hizmetler WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: hizmetler-admin.php");
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
    <title>Hizmetler Yönetimi</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <h1>Hizmetler Yönetimi</h1>
</header>

<section>
    <h2>Hizmetler Listesi</h2>
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
                echo "<td><img src='" . htmlspecialchars($row['resim']) . "' alt='Hizmet Resmi' style='max-width:100px;'></td>";
                echo '<td>
                        <a href="hizmetler-admin.php?delete=' . $row['id'] . '" onclick="return confirm(\'Bu hizmeti silmek istediğinize emin misiniz?\')">Sil</a>
                      </td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Hizmet bulunmamaktadır.</td></tr>";
        }
        ?>
    </table>

    <h3>Hizmet Ekle</h3>
    <form method="POST">
        <label for="baslik">Başlık:</label>
        <input type="text" name="baslik" id="baslik" required>
        <label for="aciklama">Açıklama:</label>
        <textarea name="aciklama" id="aciklama" rows="4" required></textarea>
        <label for="fiyat">Fiyat:</label>
        <input type="number" step="0.01" name="fiyat" id="fiyat" required>
        <label for="resim">Resim URL:</label>
        <input type="text" name="resim" id="resim" required>
        <button type="submit" name="add">Ekle</button>
    </form>
</section>
</body>
</html>
