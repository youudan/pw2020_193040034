<?php
require "Database.php";
$slug = $_GET['detail'];
$alat_musik = query("SELECT am.nama, am.merk, am.deskripsi, am.gambar, am.created_at, jam.jenis FROM alat_musik am JOIN jenis_alat_musik jam ON jam.id = am.jenis_id  WHERE am.slug='$slug'");
?>



<?php require "components/Navbar.php"; ?>
<div id="app">
  <section class="section  is-medium">
    <div class="container ">
      <div class="columns">
        <div class="column is-3">
          <figure class="image is-square">
            <img src="storage/img/alat-musik/<?= $alat_musik['gambar']; ?>">
          </figure>
        </div>
        <div class="column">
          <h5 class="subtitle is-6 is-size-7">Diposting pada <?= $alat_musik['created_at']; ?></h5>
          <h3 class="title is-3"><?= $alat_musik['nama']; ?></h3>
          <h5 class="subtitle is-5"><?= $alat_musik['merk']; ?></h5>
          <span class="tag is-primary"><?= $alat_musik['jenis']; ?></span>
          <div class="tabs">
            <ul>
              <li class="is-active">
                <a>Deskripsi</a>
              </li>
            </ul>
          </div>
          <?= $alat_musik['deskripsi']; ?>
        </div>
      </div>

    </div>
  </section>
</div>


<?php require "components/Footer.php"; ?>

<script src="assets/js/bulma.js"></script>