<?php
function koneksi()
{
  return mysqli_connect('localhost', 'root', 'root', 'tubes_193040034');
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

function tambahAlatMusik($data, $file)
{

  $conn = koneksi();

  $nama      = htmlspecialchars($data['nama']);
  $slug      = slugify($data['nama'] . date("-Y-m-d"));
  $merk      = htmlspecialchars($data['merk']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $jenis_id  = htmlspecialchars($data['jenis']);
  $user_id   = $_SESSION['user_id'];
  $file['gambarLama'] = '';
  $gambar    = upload($file);
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

function ubahAlatMusik($data, $file)
{

  $conn = koneksi();
  $id        = $data['id'];
  $nama      = htmlspecialchars($data['nama']);
  $slug      = slugify($data['nama'] . date("-Y-m-d"));
  $merk      = htmlspecialchars($data['merk']);
  $deskripsi = htmlspecialchars(str_replace("'", "\'", $data['deskripsi']));
  $jenis_id  = htmlspecialchars($data['jenis']);

  $user_id   = $_SESSION['user_id'];
  // check pilih gambar baru / tidak
  $gambarLama  = htmlspecialchars($data['gambarLama']);
  if ($file['gambar']['error']  === 4) {
    $gambar = $gambarLama;
  } else {
    $file['gambarLama'] =  $gambarLama;
    $gambar = upload($file);
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

  if ($result['gambar'] > 0) {
    unlink('storage/img/alat-musik/' . $result['gambar']);
  }

  $query = "DELETE FROM alat_musik WHERE slug='$slug'";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function upload($file)
{
  $namaFile   = $file['gambar']['name'];
  $ukuranFile = $file['gambar']['size'];
  $error      = $file['gambar']['error'];
  $tmpName    = $file['gambar']['tmp_name'];
  $namaFileLama = $file['gambarLama'];

  // check apabila tidak ada gambar yang di upload

  if ($error === 4) {
    echo '<script>
            alert("pilih gambar terlebih dahulu!");
          </script>';
    return false;
  }

  // check file yang diupload gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));

  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo '<script>
            alert("yang anda upload bukan gambar!");
          </script>';
    return false;
  }

  // Check ukuran gambar
  if ($ukuranFile > 1000000) {
    echo '<script>
            alert("ukuran gambar terlalu besar!");
          </script>';
    return false;
  }
  if ($namaFileLama > 0) {
    unlink('storage/img/alat-musik/' . $namaFileLama);
  }
  //lolos pengecekan
  $namaFileBaru = uniqid() . '.' . $ekstensiGambar;
  move_uploaded_file($tmpName, 'storage/img/alat-musik/' . $namaFileBaru);

  return $namaFileBaru;
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
  }

  // jika username sudah ada
  if (query("SELECT * FROM users WHERE email='$email' ")) {
    echo '<script>
          alert("email sudah terdaftar!");
          document.location.href = "index.php?site=signup";
        </script>';
  }

  // jika konfirmasi password tidak sesuai
  if ($password1 !== $password2) {
    echo '<script>
        alert("konfirmasi password tidak sesuai!");
        document.location.href = "index.php?site=signup";
      </script>';
  }

  // jika password < 5 digit
  if (strlen($password1) < 5) {
    echo '<script>
        alert("password terlalu pendek!");
        document.location.href = "index.php?site=signup";
      </script>';
  }

  // jika username dan password sudah sesuai
  // enkripsi password
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  // insert ke tabel user
  $query = "INSERT INTO users VALUE (null, '$nama', 'user.png', '$email', '$password_baru', 'user', NOW())";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
