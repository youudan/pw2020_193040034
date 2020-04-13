<?php
  // require functions
  require 'php/functions.php';
  // Query
  $query = "SELECT b.id, b.cover, b.judul, b.author, b.penerbit, k.nama as kategori FROM buku_kategori bk JOIN buku b ON bk.buku_id = b.id JOIN kategori k ON bk.kategori_id = k.id";
  $buku = query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>193040034</title>
</head>
<body>
  <div class="container">
    <h3>Daftar Buku - Latihan5c</h3>
    <ul class="list-unstyled">
      <?php 
        $no = 1; 
        foreach($buku as $row):
      ?>
      <li class="media">
        <img src="../<?=$row['cover'];?>" class="mr-3 mb-2" width="64px">
        <div class="media-body">
          <h5 class="mt-0 mb-1"><?=$row['judul'];?></h5>
          <?=$row['author'];?>
          <a class="btn btn-success float-right" href="php/detail.php?id=<?=$row['id'];?>">Detail</a>

          <hr>
        </div>
      </li>
      <?php 
        $no++; 
        endforeach;
      ?>
    </ul>
  </div>
</body>
</html>