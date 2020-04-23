<?php
function koneksi()
{
  return mysqli_connect('localhost', 'root', 'root', 'pw_193040034');
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

function tambah($data)
{
  $conn = koneksi();

  $nama    = htmlspecialchars($data['nama']);
  $nrp     = htmlspecialchars($data['nrp']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $email   = htmlspecialchars($data['email']);
  $gambar  = htmlspecialchars($data['gambar']);

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
  $gambar  = htmlspecialchars($data['gambar']);

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
function css()
{
  echo ' <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">';
}
