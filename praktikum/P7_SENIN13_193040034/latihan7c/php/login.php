<?php
session_start();
require 'functions.php';

if (isset($_COOKIE['username']) && isset($_COOKIE['hash'])) {
  $username = $_COOKIE['username'];
  $hash = $_COOKIE['hash'];

  $result = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");
  $row = mysqli_fetch_assoc($result);

  if ($hash === hash('sha256', $row['id'], false)) {
    $_SESSION['username'] = $row['username'];
    header("Location: admin.php");
    exit;
  }
}


if (isset($_SESSION['username'])) {
  header("Location: admin.php");
  exit;
}

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $cek_user = mysqli_query(koneksi(), "SELECT * FROM user WHERE username = '$username'");

  if (mysqli_num_rows($cek_user) > 0) {
    $row  = mysqli_fetch_assoc($cek_user);
    if (password_verify($password, $row['password'])) {
      $_SESSION['username'] = $_POST['username'];
      $_SESSION['hash'] = $row['id'];
      // if remember
      if (isset($_POST['remember'])) {
        setcookie('username', $row['username'], time() + 60 * 60 * 24);
        $hash = hash('sha256', $row['id']);
        setcookie('hash', $hash, time() + 60 * 60 * 24);
      }
    }
    if ($row['id'] == $_SESSION['hash']) {
      header("Location: admin.php");
      die;
    }
    header("Location: login.php");
    die;
  }
  $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Login</title>
</head>

<body>
  <?php if (isset($error)) : ?>
    <div class="alert alert-danger" role="alert">
      Usernama atau Password salah!
    </div>
  <?php endif; ?>
  <div class="container mt-5">
    <div class="row justify-content-md-center">
      <div class="col-md-6">
        <div class="card d-flex justify-content-center">
          <div class="card-header">
            <h3>Login</h3>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:90px;">username</span>
                </div>
                <input type="text" class="form-control" name="username" placeholder="Username" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:90px;">Password</span>
                </div>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
              </div>
              <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
              <p>Belum punya akun? Registrasi <a href="registrasi.php">Disini</a></p>
            </form>
          </div>
        </div>
        <a class="btn btn-secondary mt-3" href="index.php">&laquo; kembali</a>

      </div>
    </div>
  </div>

</body>

</html>