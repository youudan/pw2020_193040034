<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="container">
    <div class="navbar-brand">
      <a class="navbar-item" href="#">
        <img src="assets/img/youudan-logo.png">
      </a>
      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>


    <div id="navbarBasicExample" class="navbar-menu">
      <?php if (!isset($halaman)) : ?>
        <div class="navbar-start">
          <a class="navbar-item" href="?">
            Home
          </a>

          <a class="navbar-item" href="index.php?site=alat-musik">
            Alat Musik
          </a>
        </div>
      <?php endif; ?>



      <?php if (isset($_SESSION['login'])) : ?>
        <div class="navbar-end">
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              <figure class="image is-24x24">
                <img class="is-rounded" src="storage/img/profile/<?= $_SESSION['profile']; ?>">
              </figure>
              &nbsp;<?= $_SESSION['nama']; ?>
            </a>

            <div class="navbar-dropdown is-right">

              <?php if (isset($halaman)) : ?>
                <a class="navbar-item" href="index.php">
                  Halaman Depan
                </a>
              <?php else : ?>
                <a class="navbar-item" href="admin.php">
                  Halaman <?= ucfirst($_SESSION['role']); ?>
                </a>
              <?php endif; ?>
              <a class="navbar-item" href="admin.php?site=profile">
                Profile
              </a>
              <a class="navbar-item" href="admin.php?site=logout">
                Logout
              </a>
            </div>
          </div>
        </div>
      <?php else : ?>
        <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              <a class="button is-dark" href="?site=signup">
                <strong>Sign up</strong>
              </a>
              <a class="button is-light" href="?site=login">
                Log in
              </a>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
  </div>
</nav>