<?php
// Çıkış için oturum sonlandırılıyor.
session_start();
session_unset();
session_destroy();
header("Location: ../anasayfa.php");
exit();