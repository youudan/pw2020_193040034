<?php
require 'functions.php';

// ambil nrp dari URL
$id = $_GET['id'];

// query mahasiswa berdasarkan nrp
$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?= css(); ?>
  <title>Detail Mahasiswa</title>
</head>

<body>
  <h3>Detail Mahasiswa</h3>
  <ul>
    <li><img src="img/<?= $mahasiswa['gambar']; ?>" alt=""></li>
    <li>NRP : <?= $mahasiswa['nrp']; ?></li>
    <li>Nama : <?= $mahasiswa['nama']; ?></li>
    <li>Email : <?= $mahasiswa['email']; ?></li>
    <li>Jurusan : <?= $mahasiswa['jurusan']; ?></li>
    <li><a href="">ubah</a> | <a href="">hapus</a`>
    </li>
    <li><a href="latihan3.php">kembali</a></li>
  </ul>
  <script>
    import 'bootstrap/dist/css/bootstrap.min.css';
  </script>
</body>

</html>