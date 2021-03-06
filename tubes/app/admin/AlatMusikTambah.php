<?php
require "app/Database.php";

$jenis_alat_musik = query("SELECT jam.id, jam.jenis, jam.deskripsi FROM jenis_alat_musik jam");
if (isset($_POST['tambah'])) {
  if (tambahAlatMusik($_POST) > 0) {
    echo '<script>
            alert("data berhasil ditambahkan!");
            document.location.href = "admin.php";
          </script>';
  } else {
    echo '<script>
            alert("data gagal ditambahkan!");
          </script>';
  }
}
?>

<div id="app">
  <div class="container is-fluid">
    <div class="columns">
      <div class="column is-2">
        <section class="section">
          <?php require "app/admin/components/Sidebar.php"; ?>
        </section>
      </div>
      <div class="column">

        <section class="section">
          <div class="container is-fluid has-text-centered">
            <div class="columns is-centered">
              <div class="column is-8 is-12-mobile">
                <div class="box has-text-left">
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="field">
                      <label class="label">Nama alat musik</label>
                      <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Nama alat musik" name="nama" value="">
                        <span class="icon is-small is-left">
                          <i class="fas fa-music"></i>
                        </span>
                        <!-- <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                      </span> -->
                      </div>
                      <!-- <p class="help is-success">This username is available</p> -->
                    </div>

                    <div class="field">
                      <label class="label">Merk</label>
                      <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Merk alat musik" name="merk" value="">
                        <span class="icon is-small is-left">
                          <i class="fas fa-tag"></i>
                        </span>
                        <!-- <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                      </span> -->
                      </div>
                      <!-- <p class="help is-success">This username is available</p> -->
                    </div>

                    <div class="field">
                      <label class="label">Gambar</label>
                      <figure class="image is-128x128">
                        <img class="img-preview" src="storage/img/alat-musik/nophoto.png">
                      </figure>
                      <br>
                      <div class="control has-icons-left has-icons-right">
                        <input class="input input-gambar" type="file" placeholder="Merk alat musik" name="gambar" onchange="previewImage()">
                        <span class="icon is-small is-left">
                          <i class="fas fa-image"></i>
                        </span>
                        <!-- <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                      </span> -->
                      </div>
                      <!-- <p class="help is-success">This username is available</p> -->
                    </div>


                    <div class="field">
                      <label class="label">Jenis</label>
                      <div class="control">
                        <div class="select">
                          <select name="jenis">
                            <option disabled selected>-- Pilih Jenis --</option>
                            <?php foreach ($jenis_alat_musik as $jam) : ?>
                              <option value="<?= $jam['id']; ?>"><?= $jam['jenis']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="field">
                      <label class="label">Deskripsi</label>
                      <div class="control">
                        <textarea class="textarea" placeholder="Deskripsi alat musik" name="deskripsi"></textarea>
                      </div>
                    </div>

                    <div class="field is-grouped">
                      <div class="control">
                        <button class="button is-link" type="submit" name="tambah">Tambah</button>
                      </div>
                      <div class="control">
                        <a class="button is-link is-light" href="admin.php">Kembali</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>

      </div>
    </div>


  </div>
</div>

<script src="assets/js/bulma.js"></script>
<script src="assets/js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>