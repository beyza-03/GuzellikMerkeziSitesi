<?php
session_start();
include_once 'db.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM yoneticiler WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['sifre'])) {
            $_SESSION['adminID'] = $row['yoneticiID'];
            header("Location: ../anasayfa.php");
            exit();
        } else {
            header("Location: ../admin-login.php?error=wrongpassword");
            exit();
        }
    } else {
        header("Location: ../admin-login.php?error=nosuchuser");
        exit();
    }
}
?>
