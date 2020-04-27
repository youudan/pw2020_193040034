<?php
require 'functions.php';

if (isset($_POST['tambah'])) {

  if (tambah($_POST) > 0) {
    echo '<script>
          alert("Data berhasil ditambah!");
          document.location.href = "admin.php";
        </script>';
  } else {
    echo '<script>
          alert("Data gagal ditambah!");
          document.location.href = "admin.php";
        </script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Tambah Data Alat Musik</title>
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-md-center">
      <div class="col-md-6">
        <div class="card d-flex justify-content-center">
          <div class="card-header">
            <h3>Tambah Data Alat Musik</h3>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;">Nama</span>
                </div>
                <input type="text" class="form-control" name="nama" placeholder="Nama" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;">Merk</span>
                </div>
                <input type="text" class="form-control" name="merk" placeholder="Merk" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;">Gambar</span>
                </div>
                <input type="text" class="form-control" name="gambar" placeholder="Gambar" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;">Jenis</span>
                </div>
                <input type="text" class="form-control" name="jenis" placeholder="Jenis" required>
              </div>
              <div class=" mb-3">
                <span class="" style="width:80px;">Deskripsi</span>
                <textarea class="form-control" name="deskripsi" placeholder="Deskripsi" rows="5"></textarea>
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
        <a class="btn btn-secondary mt-3" href="admin.php">&laquo; kembali</a>
      </div>
    </div>
  </div>

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