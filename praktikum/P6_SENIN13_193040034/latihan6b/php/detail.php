<?php
  // Cek apbila ada id yang dikirim
  // Jiak tidak kembalikan ke index.php
  if(!isset($_GET['id'])){
    header('location: ../index.php');
    exit;
  }

  require 'functions.php';

  $id = $_GET['id'];
  $query = "SELECT b.id, b.cover, b.judul, b.author, b.penerbit, k.nama as kategori FROM buku_kategori bk JOIN buku b ON bk.buku_id = b.id JOIN kategori k ON bk.kategori_id = k.id where b.id = ${id}";
  $buku = query($query)[0];
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
  <h3 class="mt-5">Detail Buku</h3>
    <div class="media">
      <div class="media-body">
        <div class="row">
          <div class=" col-md-4">
            <img src="../../<?= $buku['cover']; ?>" class="mr-3" width="320px">
          </div>
          <div class="col-md-8">
          <h5 class="mt-3"><?= $buku['judul']; ?></h5>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Author : <?= $buku['author']; ?></li>
              <li class="list-group-item">Kategori : <?= $buku['kategori']; ?></li>
              <li class="list-group-item">Penerbit : <?= $buku['penerbit']; ?></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
      <a class="btn btn-primary mt-5 float-right" href="../index.php">Kembali</a>
  </div>
</body>
</html>