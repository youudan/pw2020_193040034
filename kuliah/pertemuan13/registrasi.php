<?php
require 'functions.php';


if (isset($_POST['registrasi'])) {


  if (registrasi($_POST) > 0) {
    echo '<script>
            alert("user baru berhasil ditambahkan. silagkan login!");
            document.location.href = "login.php";
          </script>';
  } else {
    'user gagal ditambahkan!';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?= css(); ?>
  <title>Registrasi</title>
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-md-center">
      <div class="col-md-6">
        <div class="card d-flex justify-content-center">
          <div class="card-header">
            <h3>Registrasi</h3>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:180px;">username</span>
                </div>
                <input type="text" class="form-control" name="username" placeholder="Username" autofocus autocomplete="off" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:180px;">Password</span>
                </div>
                <input type="password" class="form-control" name="password1" placeholder="Password" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:180px;">Konfirmasi Password</span>
                </div>
                <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password" required>
              </div>
              <button type="submit" class="btn btn-success btn-block" name="registrasi">Registrasi</button>
            </form>
          </div>
        </div>
        <a class="btn btn-secondary mt-3" href="login.php">&laquo; kembali</a>
      </div>
    </div>
  </div>

</body>

</html>