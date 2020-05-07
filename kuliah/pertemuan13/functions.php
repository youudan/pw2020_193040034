<?php
function koneksi()
{
  return mysqli_connect('localhost', 'pw19034', '#Akun#193040034#', 'pw19034_pw_193040034');
  // return mysqli_connect('localhost', 'root', 'root', 'pw_193040034');
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

function upload()
{
  $nama_file  = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];

  // ketika tidak ada gamabr yang dipilih
  if ($error === 4) {
    // echo '<script>
    //         alert("pilih gambar terlebih dahulu!");
    //       </script>';
    return 'nophoto.jpg';
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
  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);
  return $nama_file_baru;
}

function tambah($data)
{
  $conn = koneksi();

  $nama    = htmlspecialchars($data['nama']);
  $nrp     = htmlspecialchars($data['nrp']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $email   = htmlspecialchars($data['email']);
  // $gambar  = htmlspecialchars($data['gambar']);

  // uplaod gambar 
  $gambar = upload();
  if (!$gambar) {
    return false;
  }
  $query = "INSERT INTO 
             mahasiswa
            VALUES 
            (null, '$nama', '$nrp', '$email', '$jurusan', '$gambar')
           ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();

  // menghapus gambar di folder img
  $mhs = query("SELECT * FROM mahasiswa WHERE id=$id");
  if ($mhs['gambar'] != 'nophoto.jpg') {
    unlink('img/' . $mhs['gambar']);
  }

  mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $id      = htmlspecialchars($data['id']);

  $nama    = htmlspecialchars($data['nama']);
  $nrp     = htmlspecialchars($data['nrp']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $email   = htmlspecialchars($data['email']);
  $gambar_lama  = htmlspecialchars($data['gambar_lama']);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  if ($gambar == 'nophoto.jpg') {
    $gambar = $gambar_lama;
  }

  $query = "UPDATE mahasiswa SET
              nama = '$nama', 
              nrp = '$nrp', 
              email = '$email', 
              jurusan = '$jurusan',
              gambar = '$gambar'
            WHERE id = $id";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = koneksi();
  $query = "SELECT * FROM mahasiswa
            WHERE 
            nama LIKE '%$keyword%' OR
            nrp LIKE '%$keyword%' OR
            email LIKE '%$keyword%' 
           ";
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function login($data)
{
  $conn = koneksi();
  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  if ($user = query("SELECT * FROM user WHERE username = '$username'")) {
    // cek password
    if (password_verify($password, $user['password'])) {
      // set session
      $_SESSION['login'] = true;

      header("Location: index.php");
      exit;
    }

    return [
      'error' => true,
      'pesan' => 'Username atau Password salah!'
    ];
  }
}

function registrasi($data)
{
  $conn = koneksi();
  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  // jika form tidak diisi
  if (empty($username) || empty($password1) || empty($password2)) {
    echo '<script>
          alert("username / password tidak boleh kosong!");
          document.location.href = "registrasi.php";
        </script>';
  }

  // jika username sudah ada
  if (query("SELECT * FROM user WHERE username='$username' ")) {
    echo '<script>
          alert("username sudah terdaftar!");
          document.location.href = "registrasi.php";
        </script>';
  }

  // jika konfirmasi password tidak sesuai
  if ($password1 !== $password2) {
    echo '<script>
        alert("konfirmasi password tidak sesuai!");
        document.location.href = "registrasi.php";
      </script>';
  }

  // jika password < 5 digit
  if (strlen($password1) < 5) {
    echo '<script>
        alert("password terlalu pendek!");
        document.location.href = "registrasi.php";
      </script>';
  }

  // jika username dan password sudah sesuai
  // enkripsi password
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  // insert ke tabel user
  $query = "INSERT INTO user VALUE (null, '$username', '$password_baru')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
function css()
{
  echo ' <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">';
}
