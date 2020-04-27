<?php

// Koneksi database
function koneksi()
{
  $host     = 'localhost';
  $username = 'root';
  $password = 'root';
  $db       = 'pw1_193040034';

  $conn = mysqli_connect($host, $username, $password) or die("koneksi DB gagal");
  mysqli_select_db($conn, $db) or die("database tidak ditemukan");
  return $conn;
}
// Query
function query($sql)
{
  $result = mysqli_query(koneksi(), "$sql");

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}
function slugify($string)
{
  return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
}
// fungsi untuk menambah data
function tambah($data)
{
  $conn = koneksi();

  $nama        = htmlspecialchars($data['nama']);
  $slug        = slugify($nama);
  $merk        = htmlspecialchars($data['merk']);
  $jenis       = htmlspecialchars($data['jenis']);
  $deskripsi   = htmlspecialchars($data['deskripsi']);
  $gambar      = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO 
               alat_musik
              VALUES 
              (null, '$nama', '$slug', '$merk', '$gambar', '$deskripsi', '$jenis', NOW(), null)
             ";
  mysqli_query($conn, $query);

  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM alat_musik WHERE id = '$id'");

  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $id          = htmlspecialchars($data['id']);
  $nama        = htmlspecialchars($data['nama']);
  $slug        = slugify($nama);
  $merk        = htmlspecialchars($data['merk']);
  $jenis       = htmlspecialchars($data['jenis']);
  $deskripsi   = htmlspecialchars($data['deskripsi']);
  $gambar      = htmlspecialchars($data['gambar']);

  $query = "UPDATE alat_musik SET
            nama = '$nama',
            slug = '$slug',
            merk = '$merk',
            jenis = '$jenis',
            deskripsi = '$deskripsi',
            gambar = '$gambar',
            updated_at = NOW()
            WHERE id='$id'
           ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows($conn);
}
