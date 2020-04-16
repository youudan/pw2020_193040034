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
  if (mysqli_num_rows($result)) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
