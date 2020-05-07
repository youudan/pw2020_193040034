<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>193040034</title>
  <link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
  <style>
    body {
      font-family: 'Heebo', sans-serif;
      font-size: 1.4rem;
    }

    .title-home {
      font-size: 3.6rem;
    }

    .title-profile {
      font-size: 2.9rem;
    }

    @media (min-width: 992px) {
      .title-home {
        margin-top: 100px;
      }
    }
  </style>
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body>
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="container">
      <div class="navbar-brand">
        <a class="navbar-item has-text-black has-text-weight-bold" href="https://bulma.io">
          193040034
        </a>
        <!-- <a class="navbar-item" href="https://bulma.io">
          <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
        </a> -->

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>

      <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
          <a class="navbar-item" href="#home">
            Home
          </a>

          <a class="navbar-item" href="#profile">
            Profile
          </a>

          <a class="navbar-item" href="#kuliah">
            Kuliah
          </a>

          <a class="navbar-item" href="#praktikum">
            Praktikum
          </a>

          <a class="navbar-item" href="#tubes">
            Tugas Besar
          </a>
        </div>

        <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              <a class="button is-primary">
                <strong>Sign up</strong>
              </a>
              <a class="button is-light">
                Log in
              </a>
            </div>
          </div>
        </div>
      </div>
  </nav>
  <section class="section is-medium">
    <div class="container">
      <div class="columns">
        <div class="column is-5">
          <h1 class="title has-text-black title-home">
            Selamat datang, di tugas wijdan
          </h1>
          <p class="">
            Ini adalah halaman untuk menampilkan <strong>Profile</strong> dan menu menuju seluruh tugas <strong>Kuliah</strong>, <strong>Praktikum</strong> juga <strong>Tubes</strong> !
          </p>
        </div>
        <div class="column">
          <figure class="image is-pulled-right">
            <img src="assets/img/img-header.png">
          </figure>
        </div>
      </div>

    </div>
    </div>
  </section>

  <section id="profile" class="section has-background-light">
    <div class="container">
      <h3 class="title is-3 has-text-centered"></h3>
      <div class="columns">
        <div class="column">
          <figure class="image" style="width:300px;">
            <img src="assets/img/193040034.png">
          </figure>
        </div>
        <div class="column">
          <h3 class="title title-profile">Wijdan Muhammad Ridwanulloh</h3>
          <p>Saya adalah seorang mahasiswa <strong>Teknik Informatika</strong> yang sedang menempuh pendidikan di <strong>Universitas Pasundan</strong>. Saya juga adalah seorang <strong>Tech Entusiast</strong> yang suka mengikuti perkembangan teknologi saat ini.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="kuliah" class="section">
    <div class="container">
      <h3 class="title is-3 has-text-centered"></h3>
      <div class="columns">
        <div class="column">
          <h3 class="title title-profile">Tugas Kuliah</h3>
          <nav class="panel is-primary">
            <p class="panel-heading">
              Repositories
            </p>


            <?php for ($no = 9; $no <= 13; $no++) : ?>
              <a class="panel-block is-active" href="kuliah/pertemuan<?= $no; ?>" target="_blank">
                <span class="panel-icon">
                  <i class="fas fa-book" aria-hidden="true"></i>
                </span>
                Petemuan <?= $no; ?>
              </a>
            <?php endfor; ?>
          </nav>
        </div>
        <div class="column">
          <figure class="image" style="width:400px;">
            <img src="assets/img/img-1.png">
          </figure>
        </div>
      </div>
    </div>
  </section>

  <section id="praktikum" class="section has-background-light">
    <div class="container">
      <h3 class="title is-3 has-text-centered"></h3>
      <div class="columns">
        <div class="column">
          <figure class="image">
            <img src="assets/img/img-2.png" style="width:400px;">
          </figure>
        </div>
        <div class="column">
          <h3 class="title title-profile">Tugas Praktikum</h3>
          <nav class="panel is-primary">
            <p class="panel-heading">
              Repositories
            </p>


            <?php for ($no = 1; $no <= 7; $no++) : ?>
              <a class="panel-block is-active" href="praktikum/P<?= $no; ?>_SENIN13_193040034" target="_blank">
                <span class="panel-icon">
                  <i class="fas fa-book" aria-hidden="true"></i>
                </span>
                P<?= $no; ?>_SENIN13_193040034
              </a>
            <?php endfor; ?>
          </nav>
        </div>
      </div>
    </div>
  </section>

  <section id="tubes" class="section">
    <div class="container">
      <h3 class="title is-3 has-text-centered"></h3>
      <div class="columns">
        <div class="column">
          <h3 class="title title-profile">Tugas Besar</h3>
          <p>Tekan tombol dibawah untuk menuju <strong>Tugas Besar</strong>.</p>
          <a class="button is-primary" href="tubes/" target="_blank">
            <strong>Tugas Besar</strong>
          </a>
        </div>
        <div class="column">
          <figure class="image" style="width:400px;">
            <img src="assets/img/img-3.png">
          </figure>
        </div>
      </div>
    </div>
  </section>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Get all "navbar-burger" elements
      const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

      // Check if there are any navbar burgers
      if ($navbarBurgers.length > 0) {

        // Add a click event on each of them
        $navbarBurgers.forEach(el => {
          el.addEventListener('click', () => {

            // Get the target from the "data-target" attribute
            const target = el.dataset.target;
            const $target = document.getElementById(target);

            // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
            el.classList.toggle('is-active');
            $target.classList.toggle('is-active');

          });
        });
      }

    });
  </script>
</body>

</html>