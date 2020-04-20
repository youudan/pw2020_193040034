<?php

// Koneksi database
function koneksi()
{
  $host     = 'localhost';
  $username = 'root';
  $password = '';
  $db       = 'pw_193040034';

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
