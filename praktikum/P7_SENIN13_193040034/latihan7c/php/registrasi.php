<?php
require 'functions.php';


if (isset($_POST['register'])) {

  if (registrasi($_POST) > 0) {
    echo '<script>
          alert("Registrasi berhasil!");
          document.location.href = "login.php";
        </script>';
  } else {
    echo '<script>
          alert("Registrasi gagal!");
        </script>';
  }
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
              <button type="submit" class="btn btn-success btn-block" name="register">Register</button>
            </form>
          </div>
        </div>
        <a class="btn btn-secondary mt-3" href="../index.php">&laquo; kembali</a>
      </div>
    </div>
  </div>

</body>

</html>