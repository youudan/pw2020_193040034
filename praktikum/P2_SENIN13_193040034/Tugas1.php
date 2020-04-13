<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>193040034</title>
    <style>
    .box-salmon{
        width: 40px;
        height: 40px;
        background-color : salmon;
        text-align: center;
        line-height: 40px;
        border: 2px solid black; 
        float: left;
        margin: 1px;
    }
    .box-lightblue{
        width: 40px;
        height: 40px;
        background-color : lightblue;
        text-align: center;
        line-height: 40px;
        border: 2px solid black; 
        float: left;
        margin: 1px;
    }
    .clear{
        clear: both;
    }
    </style>
</head>
<body>
  <!-- Inisialisasi variable -->
  <?php
    $batas = 6; 
  ?>
  <!-- looping untuk baris -->
  <?php for($baris=1;$baris<=$batas;$baris++): ?>
    <!-- looping untuk kolom -->
    <?php for($kolom=1;$kolom<=$batas;$kolom++): ?>
      <!-- pengkondisian untuk cek hasil dari $baris + $kolom adalah ganjil atau genap  -->
      <?php if(($baris+$kolom)%2 == 0): ?>
        <div class="box-lightblue"></div>
      <?php else: ?>
        <div class="box-salmon"></div>
      <?php endif; ?>
    <?php endfor; ?>
    <div class="clear"></div>
  <?php endfor; ?>
</body>
</html>