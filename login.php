<?php
session_start();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Giriş Yap</title>
  <!--
    Viewport meta tag:
    Mobil cihazlarda sayfanın genişliğini cihaz genişliğine eşitler,
    sayfa ölçeğini 1 olarak ayarlar,
    responsive tasarım için zorunludur.
  -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* Sayfa arka planı için açık renk */
    body {
      background-color: #f8f9fa;
    }

    /* Giriş formunun bulunduğu kutu */
    .login-container {
      max-width: 400px; /* Maksimum genişlik */
      margin: 100px auto; /* Üstten boşluk ve yatayda ortalama */
      padding: 30px;
      background-color: white;
      border-radius: 10px; /* Yuvarlatılmış köşeler */
      box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Hafif gölge */
    }

    /* Responsive küçük ekranlarda margin ve genişlik ayarları */
    @media (max-width: 576px) {
      .login-container {
        margin: 30px 15px; /* Üst ve yandan daha az boşluk */
        padding: 20px;
        width: auto; /* Ekran genişliğine göre */
      }
    }
  </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <!-- Marka logosu veya adı -->
    <a class="navbar-brand" href="index.html">Alperen Çebi</a>

    <!-- Mobil görünüm için menüyü açma butonu -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Menüyü Aç/Kapat">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menü linkleri -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.html">Hakkımda</a></li>
        <li class="nav-item"><a class="nav-link" href="ozgecmis.html">Özgeçmiş</a></li>
        <li class="nav-item"><a class="nav-link" href="ilgi-alanlarim.html">İlgi Alanlarım</a></li>
        <li class="nav-item"><a class="nav-link" href="mirasimiz.html">Mirasımız</a></li>
        <li class="nav-item"><a class="nav-link" href="sehrim.html">Şehrim</a></li>
        <li class="nav-item"><a class="nav-link" href="iletisim.html">İletişim</a></li>
        <li class="nav-item"><a class="nav-link active" href="login.php">Giriş</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Giriş mesajı gösterme alanı -->
<div class="container mt-3">
  <?php
  if (isset($_SESSION['login_message'])) {
    // Mesaj türüne göre renk belirle
    $color = $_SESSION['login_success'] ? 'success' : 'danger';
    echo "<div class='alert alert-$color text-center'>{$_SESSION['login_message']}</div>";
    // Mesajları temizle
    session_unset();
    session_destroy();
  }
  ?>
</div>

<!-- Giriş formu container -->
<div class="login-container">
  <h3 class="text-center mb-4">Giriş Yap</h3>
  
  <?php
  // Eğer oturumda başka mesaj varsa burada da göster
  if (isset($_SESSION['login_message'])) {
    $color = $_SESSION['login_success'] ? 'success' : 'danger';
    echo "<div class='alert alert-$color text-center'>{$_SESSION['login_message']}</div>";
    unset($_SESSION['login_message']);
    unset($_SESSION['login_success']);
  }
  ?>
  
  <!-- Form -->
  <form action="login_control.php" method="post" onsubmit="return validateForm()">
    <!-- Kullanıcı adı (mail) -->
    <div class="mb-3">
      <label for="username" class="form-label">Kullanıcı Adı (Mail)</label>
      <input type="text" class="form-control" name="username" id="username" placeholder="g231210084@sakarya.edu.tr" required>
    </div>

    <!-- Şifre -->
    <div class="mb-3">
      <label for="password" class="form-label">Şifre</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="g231210084" required>
    </div>

    <!-- Gönderme butonu -->
    <button type="submit" class="btn btn-primary w-100">Giriş Yap</button>
  </form>
</div>

<!-- Form validasyon scripti -->
<script>
  function validateForm() {
    // Kullanıcı adı ve şifre alanlarını al
    const email = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();

    // Sakarya Üniversitesi mail formatı regex'i
    const emailPattern = /^[a-z]+\d{9}@sakarya\.edu\.tr$/;

    // Boş alan kontrolü
    if (email === "" || password === "") {
      alert("Lütfen tüm alanları doldurun.");
      return false; // Form gönderimini engelle
    }

    // Email format kontrolü
    if (!emailPattern.test(email)) {
      alert("Geçerli bir Sakarya Üniversitesi e-posta adresi girin.");
      return false; // Form gönderimini engelle
    }

    return true; // Formun gönderilmesine izin ver
  }
</script>

<!-- Bootstrap JS Bundle (Popper.js dahil) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
