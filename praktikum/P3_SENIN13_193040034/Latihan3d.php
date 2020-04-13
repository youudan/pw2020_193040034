<?php
  function hitungDeterminan($p1, $p2, $p3, $p4){
    echo '<h1 class="matrix">';
    echo "<p class='angka'> $p1 $p2 </p>"; ; 
    echo "<p class='angka'> $p3 $p4 </p>"; ; 
    echo "</h1>";
    $determinan = (($p1 * $p4) - ($p2 * $p3));
    echo "<h3>Determinan dari matriks tersebut adalah $determinan </h3>";
  }
  function hitung($angka1, $angka2){
    return $angka1+$angka2;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>193040034</title>
  <style>
    .matrix{
      border-right: solid black 3px;
      border-left: solid black 3px;
      width:60px;
      height: 110px;
      padding:0 10px;
    }
    .matrix .angka{
      letter-spacing: 5px;
    }
  </style>
</head>
<body>
  <p id="text"></p>
  <?php hitungDeterminan(1, 2, 3, 4);?>
</body>
</html>