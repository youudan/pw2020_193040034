<?php
require "Database.php";

if (isset($_COOKIE['token'])) {
  $token = $_COOKIE['token'];
  $email = $_COOKIE['email'];

  $result = query("SELECT * FROM users where email='$email' ");

  if ($token === hash('sha256', $result['id'], false)) {
    $_SESSION['login']   = true;
    $_SESSION['user_id'] = $result['id'];
    $_SESSION['nama']    = $result['nama'];
    $_SESSION['profile'] = $result['profile'];
    $_SESSION['email']   = $result['email'];
    $_SESSION['role']    = $result['role'];
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php">';
    exit;
  }
}

if (isset($_SESSION['login'])) {
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php">';
  exit;
}

if (isset($_POST['loginSubmit'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];


  $result = login($email);
  if ($result['check'] === 1) {
    if (password_verify($password, $result['user']['password'])) {
      $_SESSION['login']   = true;
      $_SESSION['user_id'] = $result['user']['id'];
      $_SESSION['nama']    = $result['user']['nama'];
      $_SESSION['profile'] = $result['user']['profile'];
      $_SESSION['email']   = $result['user']['email'];
      $_SESSION['role']    = $result['user']['role'];
      if (isset($_POST['remember'])) {
        setcookie('token', hash('sha256', $result['user']['id']), time() + 60 * 60 * 24);
        setcookie('email', $result['user']['email'], time() + 60 * 60 * 24);
      }
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php">';
      exit;
    }
  }

  $error = true;
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
                  <input class="input" type="email" placeholder="Email" name="email" autofocus>
                  <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                  </span>
                  <!-- <span class="icon is-small is-right">
                    <i class="fas fa-check"></i>
                  </span> -->
                </p>
              </div>
              <div class="field">
                <p class="control has-icons-left">
                  <input class="input" type="password" placeholder="Password" name="password">
                  <span class="icon is-small is-left">
                    <i class="fas fa-lock"></i>
                  </span>
                </p>
              </div>
              <div class="field">
                <div class="control">
                  <label class="checkbox">
                    <input type="checkbox" name="remember">
                    Ingat saya
                  </label>
                </div>
              </div>
              <div class="field">
                <p class="control">
                  <button class="button is-dark is-fullwidth" name="loginSubmit" value="true">
                    Login
                  </button>
                </p>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </section>
</div>

<?php require "components/Footer.php"; ?>

<script src="assets/js/bulma.js"></script>