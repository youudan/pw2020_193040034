<?php
// require functions
require 'functions.php';
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
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>193040034</title>
</head>

<body>
  <div class="container">
    <h3>Daftar Alat Musik - Latihan7a : Searching</h3>

    <a class="btn btn-warning mb-3" href="tambah.php">Tambah Data</a>
    <a class="btn btn-danger mb-3 float-right" href="logout.php">Logout</a>
    <form action="" method="get">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Pencarian" aria-label="Pencarian" name="keyword" aria-describedby="button-addon2" value="<?= isset($_GET['cari']) ? $_GET['keyword'] : '' ?>">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="cari" value="true">Cari</button>
        </div>
      </div>
    </form>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Gambar</th>
          <th scope="col">Nama</th>
          <th scope="col">Jenis</th>
          <th scope="col">Merk</th>
          <th scope="col" width="180xp">Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!$alat_musik) : ?>
          <tr>
            <th colspan="7" class="text-center">Data tidak ditemukan!</th>
          </tr>
        <?php endif; ?>
        <?php
        $no = 1;
        foreach ($alat_musik as $row) :
        ?>
          <tr>
            <th scope="row"><?= $no; ?></th>
            <td>
              <?php if ($row['gambar']) : ?>
                <img src="../assets/img/alat-musik/<?= $row['gambar']; ?>" class="mr-3 mb-2" width="64px">
              <?php else : ?>
                Cover tidak ditemukan
              <?php endif; ?>
            </td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['jenis']; ?></td>
            <td><?= $row['merk']; ?></td>
            <td>
              <a class="btn btn-primary" href="ubah.php?id=<?= $row['id']; ?>">Ubah</a>
              <a class="btn btn-danger" href="hapus.php?id=<?= $row['id']; ?>">Hapus</a>
            </td>
          </tr>
        <?php
          $no++;
        endforeach;
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>