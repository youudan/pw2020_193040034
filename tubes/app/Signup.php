<?php
require "Database.php";


if (isset($_SESSION['login'])) {
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php">';
  exit;
}

if (isset($_POST['signUpSubmit'])) {
  if (signUp($_POST) > 0) {
    echo '<script>
            alert("Pendaftaran berhasil. silagkan login!");
            document.location.href = "index.php?site=login";
          </script>';
  } else {
    'Pendaftaran gagal!';
  }
}
?>
<?php if (isset($error)) : ?>
  <div class="notification is-danger is-light">
    <button class="delete"></button>
    <strong>Email</strong> / <strong>Password</strong> salah!
  </div>
<?php endif; ?>
<div id="app">
  <section class="section is-medium">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-4">
          <div class="box has-text-dark has-text-centered">
            <span class="icon" style="margin-bottom: 2rem">
              <i class="fas fa-user is-size-1"></i>
            </span>
            <form action="" method="post">
              <div class="field">
                <p class="control has-icons-left has-icons-right">
                  <input class="input" type="text" placeholder="Nama" name="nama" autofocus required>
                  <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                  </span>
                </p>
              </div>
              <div class="field">
                <p class="control has-icons-left has-icons-right">
                  <input class="input" type="email" placeholder="Email" name="email" required>
                  <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                  </span>
                </p>
              </div>
              <div class="field">
                <p class="control has-icons-left">
                  <input class="input" type="password" placeholder="Password" name="password" required>
                  <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                  </span>
                </p>
              </div>
              <div class="field">
                <p class="control has-icons-left">
                  <input class="input" type="password" placeholder="Password Konfirmasi" name="password_confirm" required>
                  <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                  </span>
                </p>
              </div>
              <div class="field">
                <p class="control">
                  <button class="button is-dark is-fullwidth" name="signUpSubmit" value="true">
                    Sign Up
                  </button>
                </p>
              </div>
              <p class="has-text-left">Sudah mempunyai akun? login <a href="index.php?site=login">disini</a></p>
            </form>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>

<?php require "components/Footer.php"; ?>

<script src="assets/js/bulma.js"></script>