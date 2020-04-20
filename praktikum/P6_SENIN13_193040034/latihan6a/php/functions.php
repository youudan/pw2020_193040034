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
