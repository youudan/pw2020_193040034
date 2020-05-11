<?php
require "app/Database.php";

$id = $_SESSION['user_id'];
$user = query("SELECT * FROM users WHERE id=$id");

if (isset($_POST['profile'])) {
  if (ubahProfile($_POST) > 0) {
    echo '<script>
            alert("data profile berhasil diubah!");
            document.location.href = "admin.php?site=profile";
          </script>';
  } else {
    echo '<script>
            alert("data profile tidak diubah!");
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
                      <label class="label">Nama</label>
                      <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Nama " name="nama" value="<?= $user['nama']; ?>">
                        <span class="icon is-small is-left">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                    </div>

                    <div class="field">
                      <label class="label">Merk</label>
                      <div class="control has-icons-left has-icons-right">
                        <input class="input" type="text" placeholder="Email" name="email" value="<?= $user['email']; ?>">
                        <span class="icon is-small is-left">
                          <i class="fas fa-envelope"></i>
                        </span>
                        <!-- <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                      </span> -->
                      </div>
                      <!-- <p class="help is-success">This username is available</p> -->
                    </div>

                    <div class="field">
                      <input type="hidden" name="gambarLama" value="<?= $user['profile']; ?>">
                      <label class="label">Gambar</label>
                      <figure class="image is-128x128">
                        <img class="img-preview" src="storage/img/profile/<?= $user['profile']; ?>">
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

                    <div class="field is-grouped">
                      <div class="control">
                        <button class="button is-link" type="submit" name="profile">Simpan</button>
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