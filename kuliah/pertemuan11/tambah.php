<?php
require 'functions.php';
if (isset($_POST['tambah'])) {

  if (tambah($_POST) > 0) {
    echo '<script>
            alert("data berhasil ditambahkan!");
            document.location.href = "index.php";
          </script>';
  } else {
    echo '<div class="alert alert-danger" role="alert">
            Data gagal ditambahkan!
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
  <title>Tambah Data Mahasiswa</title>
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-md-center">
      <div class="col-md-6">
        <div class="card d-flex justify-content-center">
          <div class="card-header">
            <h3>Form Tambah Data Mahasiswa</h3>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;" id="namaD">Nama</span>
                </div>
                <input type="text" class="form-control" name="nama" placeholder="Nama" aria-describedby="namaD" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;" id="nrpD">NRP</span>
                </div>
                <input type="text" class="form-control" name="nrp" placeholder="NRP" aria-describedby="nrpD" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;" id="emailD">Email</span>
                </div>
                <input type="text" class="form-control" name="email" placeholder="Email" aria-describedby="emailD" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;" id="jurusanD">Jurusan</span>
                </div>
                <input type="text" class="form-control" name="jurusan" placeholder="Jurusan" aria-describedby="jurusanD" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;" id="gambarD">Gambar</span>
                </div>
                <input type="text" class="form-control" name="gambar" placeholder="Gambar" aria-describedby="gambarD" required>
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
              <button type="submit" class="btn btn-primary btn-block" name="tambah">Tambah Data</button>
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