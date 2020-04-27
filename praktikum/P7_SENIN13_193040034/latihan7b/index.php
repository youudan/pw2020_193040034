<?php
// require functions
require 'php/functions.php';
// Query
if (isset($_GET['cari'])) {
  $keyword = $_GET['keyword'];
  $query = "SELECT * FROM alat_musik WHERE
          nama LIKE '%$keyword%' OR
          merk LIKE '%$keyword%' OR
          jenis LIKE '%$keyword%' 
          ";
  if ($alat_musik = query($query)) {
    echo '<div class="alert alert-success" role="alert">
          Data berhasil ditemukan!
        </div>';
  } else {
    echo '<div class="alert alert-warning" role="alert">
            Data tidak ditemukan!
          </div>';
  }
} else {
  $query = "SELECT * FROM alat_musik";
  $alat_musik = query($query);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>193040034</title>
</head>

<body>
  <div class="container">
    <div class="row mt-5 mb-3">
      <div class="col-md">
        <h3>Daftar Alat Musik - Tugas</h3>
      </div>
      <div class="col-md">
        <a class="btn btn-primary float-right" href="php/login.php">Login</a>
      </div>
    </div>
    <form action="" method="get">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Pencarian" aria-label="Pencarian" name="keyword" aria-describedby="button-addon2" value="<?= isset($_GET['cari']) ? $_GET['keyword'] : '' ?>">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="cari" value="true">Cari</button>
        </div>
      </div>
    </form>
    <ul class="list-unstyled">
      <?php if (!$alat_musik) : ?>
        <li class="media">
          <div class="media-body">
            <h5 class="mt-0 mb-1">Data tidak ditemukan!</h5>
            <hr>
          </div>
        </li>
      <?php endif; ?>
      <?php
      $no = 1;
      foreach ($alat_musik as $row) :
      ?>
        <li class="media">
          <img src="assets\img\alat-musik\<?= $row['gambar']; ?>" class="mr-3 mb-2" width="64px">
          <div class="media-body">
            <h5 class="mt-0 mb-1"><?= $row['nama']; ?></h5>
            <?= $row['merk']; ?>
            <a class="btn btn-success float-right" href="php/detail.php?id=<?= $row['id']; ?>&slug=<?= $row['slug']; ?>">Detail-> </a>

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