<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db_name = 'kuafor_vt';

$db = new mysqli($host, $user, $pass, $db_name);

if ($db->connect_error) {
    die("Veritabanı bağlantı hatası: " . $db->connect_error);
}
?>
