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
  <div class="container mt-5">
    <div class="row justify-content-md-center">
      <div class="col-md-8">
        <div class="card d-flex justify-content-center">
          <div class="card-header">
            <h3>Detail Mahasiswa</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md">
                <img src="img/<?= $mahasiswa['gambar']; ?>" alt="">
              </div>
              <div class="col-md">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">NRP : <?= $mahasiswa['nrp']; ?></li>
                  <li class="list-group-item">Nama : <?= $mahasiswa['nama']; ?></li>
                  <li class="list-group-item">Email : <?= $mahasiswa['email']; ?></li>
                  <li class="list-group-item">Jurusan : <?= $mahasiswa['jurusan']; ?></li>
                  <li class="list-group-item">
                    <a class="btn btn-primary btn-block" href="ubah.php?id=<?= $mahasiswa['id']; ?>">ubah</a>
                    <a class="btn btn-danger btn-block" href="hapus.php?id=<?= $mahasiswa['id']; ?>" onclick="return confirm('apakah anda yakin?')">hapus</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <a class="btn btn-secondary mt-3" href="index.php">&laquo; kembali</a>
      </div>
    </div>
  </div>
</body>

</html>