<?php
require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

if (isset($_POST['cari'])) {
  $mahasiswa = cari($_POST['keyword']);
}
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
    <form action="" method="post">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Masukan keyword pencarian" size="40" name="keyword" autocomplete="off" autofocus>
        <div class="input-group-append">
          <button class="btn btn-outline-primary" type="submit" name="cari">Cari</button>
        </div>
      </div>
    </form>
    <a class="btn btn-primary mb-3" href="tambah.php">Tambah Data Mahasiswa</a>

    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Gambar</th>
          <th scope="col">Nama</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php if (empty($mahasiswa)) : ?>
          <tr>
            <td colspan="4">
              <p class="text-center mt-3 text-danger">data mahasiswa tidak ditemukan!</p>
            </td>
          </tr>
        <?php endif; ?>

        <?php
        $no = 1;
        foreach ($mahasiswa as $m) :
        ?>
          <tr>
            <th scope="row"><?= $no; ?></th>
            <td> <img src="img/<?= $m['gambar']; ?>" class="mr-3 mb-2" width="64px"></td>
            <td><?= $m['nama']; ?></td>
            <td>
              <a class="btn btn-success float-right" href="detail.php?id=<?= $m['id']; ?>">Detail</a>
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