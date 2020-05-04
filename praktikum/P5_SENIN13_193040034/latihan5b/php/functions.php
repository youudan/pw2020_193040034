<?php

  // Koneksi database
  function koneksi(){
    $conn = mysqli_connect('localhost', 'pw19034', '#Akun#193040034#') or die("koneksi DB gagal");
    mysqli_select_db($conn, 'pw19034_pw_193040034' or die("database tidak ditemukan");
    return $conn;
  }
  // Query
  function query($sql){
    $result = mysqli_query(koneksi(), "$sql");   

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }

    return $rows;
  }

?>