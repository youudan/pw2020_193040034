<?php
require 'functions.php';

$kategori = query("SELECT kategori.id, kategori.nama FROM kategori");
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
  <link rel="stylesheet" href="../../assets/css/style.css">
  <title>Tambah Data Buku</title>
</head>

<body>
  <div class="container mt-5">
    <div class="row justify-content-md-center">
      <div class="col-md-6">
        <div class="card d-flex justify-content-center">
          <div class="card-header">
            <h3>Tambah Data Buku</h3>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;" id="judulD">Judul</span>
                </div>
                <input type="text" class="form-control" name="judul" placeholder="Judul" aria-describedby="judulD" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;" id="authorD">Author</span>
                </div>
                <input type="text" class="form-control" name="author" placeholder="Author" aria-describedby="authorD" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;" id="penerbitD">Penerbit</span>
                </div>
                <input type="text" class="form-control" name="penerbit" placeholder="Penerbit" aria-describedby="emailpenerbitDD" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;" id="coverD">Cover</span>
                </div>
                <input type="text" class="form-control" name="cover" placeholder="Cover" aria-describedby="coverD" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;" id="kategoriD">Kategori</span>
                </div>
                <select class="form-control" name="kategori" aria-describedby="kategoriD" required>
                  <option value="" disabled selected>Pilih Kategori</option>
                  <?php foreach ($kategori as $k) : ?>
                    <option value="<?= $k['id']; ?>"><?= $k['nama']; ?></option>
                  <?php endforeach; ?>
                </select>
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

  <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
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