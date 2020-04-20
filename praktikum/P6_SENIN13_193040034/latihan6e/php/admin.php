<?php
// require functions
require 'functions.php';
// Query


if (isset($_GET['cari'])) {
  $keyword = $_GET['keyword'];
  $query = "SELECT b.id, b.cover, b.judul, b.author, b.penerbit, k.nama as kategori 
          FROM buku_kategori bk 
          JOIN buku b ON bk.buku_id = b.id 
          JOIN kategori k ON bk.kategori_id = k.id WHERE
          b.judul LIKE '%$keyword%' OR
          b.author LIKE '%$keyword%' OR
          b.penerbit LIKE '%$keyword%' 
          ";
  if ($buku = query($query)) {
    echo '<div class="alert alert-success" role="alert">
          Data berhasil ditemukan!
        </div>';
  } else {
    echo '<div class="alert alert-warning" role="alert">
            Data tidak ditemukan!
          </div>';
  }
} else {
  $query = "SELECT b.id, b.cover, b.judul, b.author, b.penerbit, k.nama as kategori 
  FROM buku_kategori bk 
  JOIN buku b ON bk.buku_id = b.id 
  JOIN kategori k ON bk.kategori_id = k.id
  ";
  $buku = query($query);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <title>193040034</title>
</head>

<body>
  <div class="container">
    <h3>Daftar Buku - Latihan6e : Searching</h3>

    <a class="btn btn-warning mb-3" href="tambah.php">Tambah Data</a>
    <form action="" method="get">
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Pencarian" aria-label="Pencarian" name="keyword" aria-describedby="button-addon2">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="cari" value="true">Cari</button>
        </div>
      </div>
    </form>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Cover</th>
          <th scope="col">Judul</th>
          <th scope="col">Kategori</th>
          <th scope="col">Author</th>
          <th scope="col">Penerbit</th>
          <th scope="col" width="180xp">Opsi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($buku as $row) :
        ?>
          <tr>
            <th scope="row"><?= $no; ?></th>
            <td>
              <?php if ($row['cover']) : ?>
                <img src="../../<?= $row['cover']; ?>" class="mr-3 mb-2" width="64px">
              <?php else : ?>
                Cover tidak ditemukan
              <?php endif; ?>
            </td>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['kategori']; ?></td>
            <td><?= $row['author']; ?></td>
            <td><?= $row['penerbit']; ?></td>
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