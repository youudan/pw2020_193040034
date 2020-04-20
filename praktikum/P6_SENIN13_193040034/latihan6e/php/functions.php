<?php

// Koneksi database
function koneksi()
{
  $host     = 'localhost';
  $username = 'root';
  $password = 'root';
  $db       = 'tubes_193040034';

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

// fungsi untuk menambah data
function tambah($data)
{
  $conn = koneksi();

  $judul      = htmlspecialchars($data['judul']);
  $author     = htmlspecialchars($data['author']);
  $penerbit   = htmlspecialchars($data['penerbit']);
  $cover      = htmlspecialchars($data['cover']);
  $kategori_id = htmlspecialchars($data['kategori']);

  $query = "INSERT INTO 
               buku
              VALUES 
              (null, '$judul', '$author', '$penerbit', '$cover', NOW(), null)
             ";
  mysqli_query($conn, $query);

  $buku = query("SELECT buku.id FROM buku ORDER BY buku.id DESC LIMIT 1")[0];
  $buku_id = $buku['id'];
  $query = "INSERT INTO buku_kategori VALUES (null, '$buku_id', '$kategori_id', NOW(), null)";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM buku_kategori WHERE buku_id = '$id'");
  mysqli_query($conn, "DELETE FROM buku WHERE id = '$id'");

  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $buku_id          = htmlspecialchars($data['buku_id']);
  $buku_kategori_id = htmlspecialchars($data['buku_kategori_id']);
  $judul            = htmlspecialchars($data['judul']);
  $author           = htmlspecialchars($data['author']);
  $penerbit         = htmlspecialchars($data['penerbit']);
  $cover            = htmlspecialchars($data['cover']);
  $kategori_id      = htmlspecialchars($data['kategori']);

  $query = "UPDATE buku SET
            judul = '$judul',
            author = '$author',
            penerbit = '$penerbit',
            cover = '$cover',
            updated_at = NOW()
            WHERE id='$buku_id'
           ";
  mysqli_query($conn, $query);

  $query = "UPDATE buku_kategori SET
            kategori_id = '$kategori_id',
            updated_at = NOW()
            WHERE id = '$buku_kategori_id'
           ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
