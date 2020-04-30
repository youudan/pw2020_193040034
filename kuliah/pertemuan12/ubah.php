<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

require 'functions.php';

if (!isset($_GET['id'])) {
  header("Location: index.php");
}

$id = $_GET['id'];
$m = query("SELECT * FROM mahasiswa where id=$id");

if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo '<script>
            alert("data berhasil diubah!");
            document.location.href = "index.php";
          </script>';
  } else {
    echo '<div class="alert alert-danger" role="alert">
            Data gagal diubah!
          </div>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?= css(); ?>
  <title>Ubah Data Mahasiswa</title>
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-md-center">
      <div class="col-md-6">
        <div class="card d-flex justify-content-center">
          <div class="card-header">
            <h3>Form Ubah Data Mahasiswa</h3>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <input type="hidden" name="id" value="<?= $m['id'] ?>" required>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;" id="namaD">Nama</span>
                </div>

                <input type="text" class="form-control" name="nama" placeholder="Nama" aria-describedby="namaD" value="<?= $m['nama'] ?>" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;" id="nrpD">NRP</span>
                </div>
                <input type="text" class="form-control" name="nrp" placeholder="NRP" aria-describedby="nrpD" value="<?= $m['nrp'] ?>" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;" id="emailD">Email</span>
                </div>
                <input type="text" class="form-control" name="email" placeholder="Email" aria-describedby="emailD" value="<?= $m['email'] ?>" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;" id="jurusanD">Jurusan</span>
                </div>
                <input type="text" class="form-control" name="jurusan" placeholder="Jurusan" aria-describedby="jurusanD" value="<?= $m['jurusan'] ?>" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;" id="gambarD">Gambar</span>
                </div>
                <input type="text" class="form-control" name="gambar" placeholder="Gambar" aria-describedby="gambarD" value="<?= $m['gambar'] ?>" required>
              </div>
              <!-- <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="gambarAddon">Gambar</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="gambar" aria-describedby="gambarAddon">
                  <label class="custom-file-label" for="gambar">Choose file</label>
                </div>
              </div> -->
              <button type="submit" class="btn btn-primary btn-block" name="ubah">Ubah Data</button>
            </form>
          </div>
        </div>
        <a class="btn btn-secondary mt-3" href="index.php">&laquo; kembali</a>
      </div>
    </div>
  </div>

  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      console.log("ready!");
      $('.custom-file input').change(function(e) {
        if (e.target.files.length) {
          $(this).next('.custom-file-label').html(e.target.files[0].name);
        }
      });
    });
  </script>
</body>

</html>