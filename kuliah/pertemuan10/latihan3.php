<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?= css(); ?>
  <title>Daftar Mahasiswa</title>
</head>

<body>
  <div class="container">
    <h3>Daftar Mahasiswa</h3>
    <a class="btn btn-primary float-right" href="tambah.php">Tambah Data Mahasiswa</a>
    <ul class="list-unstyled mt-5">
      <?php
      $no = 1;
      foreach ($mahasiswa as $m) :
      ?>
        <li class="media">
          <img src="img/<?= $m['gambar']; ?>" class="mr-3 mb-2" width="64px">
          <div class="media-body">
            <h5 class="mt-0 mb-1"><?= $m['nama']; ?></h5>
            <?= $m['jurusan']; ?>
            <a class="btn btn-success float-right" href="detail.php?id=<?= $m['id']; ?>">Detail</a>

            <hr>
          </div>
        </li>
      <?php
        $no++;
      endforeach;
      ?>
    </ul>
  </div>
</body>

</html>