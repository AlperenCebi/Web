<?php
session_start();

$kullanici = $_POST['username'];
$sifre = $_POST['password'];

// Örnek kontrol (gerçek veritabanı yoksa)
if ($kullanici === "g231210084@sakarya.edu.tr" && $sifre === "g231210084") {
    $_SESSION['login_message'] = "Giriş başarılı. Hoş geldiniz $kullanici!";
    $_SESSION['login_success'] = true;
    header("Location: login.php");
    exit;
} else {
    $_SESSION['login_message'] = "Hatalı kullanıcı adı veya şifre!";
    $_SESSION['login_success'] = false;
    header("Location: login.php");
    exit;
}
