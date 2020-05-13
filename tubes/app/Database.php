<?php
function koneksi()
{
  // local
  // return mysqli_connect('localhost', 'root', 'root', 'tubes_193040034');
  // hosting
  return mysqli_connect('localhost', 'pw19034', '#Akun#193040034#', 'pw19034_tubes_193040034');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  // jika hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambahAlatMusik($data)
{

  $conn = koneksi();

  $nama      = htmlspecialchars($data['nama']);
  $slug      = slugify($data['nama'] . date("-Y-m-d-m-s"));
  $merk      = htmlspecialchars($data['merk']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $jenis_id  = htmlspecialchars($data['jenis']);
  $user_id   = $_SESSION['user_id'];
  $gambar    = upload('storage/img/alat-musik/');
  if (!$gambar) {
    return false;
  }
  $query = "INSERT INTO 
             alat_musik
            VALUES 
            (null, '$nama', '$slug', '$merk', '$gambar', '$deskripsi', $jenis_id, $user_id, null, NOW(), null, null)
           ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubahAlatMusik($data)
{

  $conn = koneksi();
  $id        = $data['id'];
  $nama      = htmlspecialchars($data['nama']);
  $slug      = slugify($data['nama'] . date("-Y-m-d-m-s"));
  $merk      = htmlspecialchars($data['merk']);
  $deskripsi = htmlspecialchars(str_replace("'", "\'", $data['deskripsi']));
  $jenis_id  = htmlspecialchars($data['jenis']);

  $user_id   = $_SESSION['user_id'];
  // check pilih gambar baru / tidak
  $gambarLama  = htmlspecialchars($data['gambarLama']);
  $path = 'storage/img/alat-musik/';
  $gambar = upload($path);
  if ($gambar == 'nophoto.png') {
    $gambar = $gambarLama;
  } else {
    unlink($path . $gambarLama);
  }
  $query = "UPDATE alat_musik
            SET 
            nama = '$nama', 
            slug = '$slug', 
            merk = '$merk', 
            gambar = '$gambar', 
            deskripsi = '$deskripsi', 
            jenis_id = $jenis_id, 
            updated_by = $user_id,
            updated_at = NOW()
            WHERE id=$id
           ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapusAlatMusik($slug)
{
  $conn = koneksi();

  $user_id   = $_SESSION['user_id'];

  $query = "UPDATE alat_musik
  SET 
  deleted_at = NOW()
  WHERE slug='$slug'
 ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function kembalikanAlatMusik($slug)
{
  $conn = koneksi();
  $query = "UPDATE alat_musik
  SET 
  deleted_at = null
  WHERE slug='$slug'
 ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapusAlatMusikPermanen($slug)
{
  $conn = koneksi();
  $result = query("SELECT * FROM alat_musik WHERE slug='$slug'");

  if ($result['gambar'] != 'nophoto.png') {
    unlink('storage/img/alat-musik/' . $result['gambar']);
  }

  $query = "DELETE FROM alat_musik WHERE slug='$slug'";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}


function upload($path)
{
  $nama_file   = $_FILES['gambar']['name'];
  $tipe_file   = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error       = $_FILES['gambar']['error'];
  $tmp_file    = $_FILES['gambar']['tmp_name'];

  // ketika tidak ada gamabr yang dipilih
  if ($error === 4) {
    return 'nophoto.png';
  }

  // check file yang diupload gambar
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));

  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo '<script>
            alert("yang anda upload bukan gambar!");
          </script>';
    return false;
  }

  // check tipe file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo '<script>
            alert("yang anda upload bukan gambar!");
          </script>';
    return false;
  }

  // Check ukuran gambar
  // maksimal 5mb
  if ($ukuran_file > 5000000) {
    echo '<script>
              alert("ukuran gambar terlalu besar!");
            </script>';
    return false;
  }

  // lolos pengecekan 
  // siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, $path . $nama_file_baru);
  return $nama_file_baru;
}

function slugify($string)
{
  return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
}

function login($email)
{
  $conn = koneksi();
  $query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $query);
  $data['check'] = mysqli_num_rows($result);
  $data['user'] = mysqli_fetch_assoc($result);
  return $data;
}

function signUp($data)
{
  $conn = koneksi();
  $nama = htmlspecialchars(strtolower($data['nama']));
  $email = htmlspecialchars(strtolower($data['email']));
  $password1 = mysqli_real_escape_string($conn, $data['password']);
  $password2 = mysqli_real_escape_string($conn, $data['password_confirm']);

  // jika form tidak diisi
  if (empty($nama) || empty($email) || empty($password1) || empty($password2)) {
    echo '<script>
          alert("form tidak boleh ada yang kosong!");
          document.location.href = "index.php?site=signup";
        </script>';
    return false;
  }

  // jika email sudah ada
  if (query("SELECT * FROM users WHERE email='$email' ")) {
    echo '<script>
          alert("email sudah terdaftar!");
          document.location.href = "index.php?site=signup";
        </script>';
    return false;
  }

  // jika konfirmasi password tidak sesuai
  if ($password1 !== $password2) {
    echo '<script>
        alert("konfirmasi password tidak sesuai!");
        document.location.href = "index.php?site=signup";
      </script>';
    return false;
  }

  // jika password < 5 digit
  if (strlen($password1) < 5) {
    echo '<script>
        alert("password terlalu pendek!");
        document.location.href = "index.php?site=signup";
      </script>';
    return false;
  }

  // jika username dan password sudah sesuai
  // enkripsi password
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  // insert ke tabel user
  $query = "INSERT INTO users VALUE (null, '$nama', 'nophoto.png', '$email', '$password_baru', 'user', NOW())";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubahProfile($data)
{
  $conn = koneksi();
  $id = $_SESSION['user_id'];
  $nama = htmlspecialchars(strtolower($data['nama']));
  $email = htmlspecialchars(strtolower($data['email']));
  $gambarLama = htmlspecialchars(strtolower($data['gambarLama']));

  // jika form tidak diisi
  if (empty($nama) || empty($email)) {
    echo '<script>
            alert("form tidak boleh ada yang kosong!");
            document.location.href = "admin.php?site=profile";
          </script>';
  }

  // jika email sudah ada
  if (query("SELECT * FROM users WHERE email='$email' ") && $_SESSION['email'] != $email) {
    echo '<script>
          alert("email sudah terdaftar!");
          document.location.href = "admin.php?site=profile";
        </script>';
  }

  $path = 'storage/img/profile/';
  $gambar = upload($path);
  if ($gambar == 'nophoto.png') {
    $gambar = $gambarLama;
  } else {
    $_SESSION['profile'] = $gambar;
    unlink($path . $gambarLama);
  }

  $query = "UPDATE users SET nama='$nama', profile='$gambar', email='$email'";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
