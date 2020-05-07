<?php
session_start();

if (isset($_SESSION['login'])) {
  header("Location: index.php");
  exit;
}

require 'functions.php';



if (isset($_POST['login'])) {

  $login = login($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?= css(); ?>
  <title>Login</title>
</head>

<body>
  <?php if (isset($login['error'])) : ?>
    <div class="alert alert-danger" role="alert">
      <?= $login['pesan']; ?>
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
                <input type="text" class="form-control" name="username" placeholder="Username" autofocus autocomplete="off" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:90px;">Password</span>
                </div>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
              </div>
              <!-- <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
              </div> -->
              <p><a href="registrasi.php">Tambah user baru</a></p>

              <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
            </form>
          </div>
        </div>
        <a class="btn btn-secondary mt-3" href="index.php">&laquo; kembali</a>

      </div>
    </div>
  </div>

</body>

</html>