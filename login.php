<?php
session_start();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Giriş Yap</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .login-container {
      max-width: 400px;
      margin: 100px auto;
      padding: 30px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="index.html">Alperen Çebi</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Menüyü Aç/Kapat">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.html">Hakkımda</a></li>
        <li class="nav-item"><a class="nav-link" href="ozgecmis.html">Özgeçmiş</a></li>
        <li class="nav-item"><a class="nav-link" href="ilgi-alanlarim.html">İlgi Alanlarım</a></li>
        <li class="nav-item"><a class="nav-link" href="mirasimiz.html">Mirasımız</a></li>
        <li class="nav-item"><a class="nav-link" href="sehrim.html">Şehrim</a></li>
        <li class="nav-item"><a class="nav-link" href="iletisim.html">İletişim</a></li>
        <li class="nav-item"><a class="nav-link" href="login.php">Giriş</a></li>
      </ul>
    </div>
  </div>
</nav>

  <!-- Giriş Mesajı -->
  <div class="container mt-3">
    <?php
    if (isset($_SESSION['login_message'])) {
      $color = $_SESSION['login_success'] ? 'success' : 'danger';
      echo "<div class='alert alert-$color text-center'>{$_SESSION['login_message']}</div>";
      session_unset(); // mesajları temizle
      session_destroy();
    }
    ?>
  </div>

  <!-- Giriş Formu -->
  <div class="login-container">
    <h3 class="text-center mb-4">Giriş Yap</h3>
    <?php
if (isset($_SESSION['login_message'])) {
  $color = $_SESSION['login_success'] ? 'success' : 'danger';
  echo "<div class='alert alert-$color text-center'>{$_SESSION['login_message']}</div>";
  unset($_SESSION['login_message']);
  unset($_SESSION['login_success']);
}
?>
    <form action="login_control.php" method="post" onsubmit="return validateForm()">
      <div class="mb-3">
        <label for="username" class="form-label">Kullanıcı Adı (Mail)</label>
        <input type="text" class="form-control" name="username" id="username" placeholder="g231210084@sakarya.edu.tr">
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Şifre</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="g231210084">
      </div>
      <button type="submit" class="btn btn-primary w-100">Giriş Yap</button>
    </form>
  </div>

  <!-- Validasyon -->
  <script>
    function validateForm() {
      const email = document.getElementById("username").value.trim();
      const password = document.getElementById("password").value.trim();
      const emailPattern = /^[a-z]+\d{9}@sakarya\.edu\.tr$/;

      if (email === "" || password === "") {
        alert("Lütfen tüm alanları doldurun.");
        return false;
      }

      if (!emailPattern.test(email)) {
        alert("Geçerli bir Sakarya Üniversitesi e-posta adresi girin.");
        return false;
      }

      return true;
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
