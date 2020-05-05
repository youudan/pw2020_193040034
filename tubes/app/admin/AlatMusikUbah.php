<?php
require "app/Database.php";
if (!isset($_GET['slug'])) {
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php">';
}

$slug = $_GET['slug'];
$am = query("SELECT * FROM alat_musik WHERE slug='$slug'");
$jenis_alat_musik = query("SELECT jam.id, jam.jenis, jam.deskripsi FROM jenis_alat_musik jam");

if (isset($_POST['ubah'])) {
  if (ubahAlatMusik($_POST, $_FILES) > 0) {
    echo '<script>
            alert("data berhasil diubah!");
            document.location.href = "admin.php";
          </script>';
  } else {
    echo '<script>
            alert("data gagal diubah!");
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
                    <input type="hidden" name="id" value="<?= $am['id']; ?>">
                    <input type="hidden" name="gambarLama" value="<?= $am['gambar']; ?>">
                    <div class="field">
                      <label class="label">Nama alat musik</label>
                      <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Nama alat musik" name="nama" value="<?= $am['nama']; ?>">
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
                        <input class="input" type="text" placeholder="Merk alat musik" name="merk" value="<?= $am['merk']; ?>">
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
                      <figure class="image is-64x64">
                        <img src="storage/img/alat-musik/<?= $am['gambar']; ?>" alt="Image">
                      </figure>
                    </div>
                    <div class="field">
                      <label class="label">Gambar</label>
                      <div class="control has-icons-left has-icons-right">
                        <input class="input" type="file" placeholder="Merk alat musik" name="gambar" value="">
                        <span class="icon is-small is-left">
                          <i class="fas fa-image"></i>
                        </span>
                        <!-- <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                      </span> -->
                      </div>
                      <p class="help is-secondary">Kosongkan apabila tidak ingin mengubah gambar!</p>
                    </div>


                    <div class="field">
                      <label class="label">Jenis</label>
                      <div class="control">
                        <div class="select">
                          <select name="jenis">
                            <option disabled selected>-- Pilih Jenis --</option>
                            <?php foreach ($jenis_alat_musik as $jam) : ?>
                              <option value="<?= $jam['id']; ?>" <?= $jam['id'] == $am['jenis_id'] ? 'selected' : ''; ?>><?= $jam['jenis']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="field">
                      <label class="label">Deskripsi</label>
                      <div class="control">
                        <textarea class="textarea" placeholder="Deskripsi alat musik" name="deskripsi"><?= $am['deskripsi']; ?></textarea>
                      </div>
                    </div>

                    <div class="field is-grouped">
                      <div class="control">
                        <button class="button is-link" type="submit" name="ubah">Ubah</button>
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
<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>