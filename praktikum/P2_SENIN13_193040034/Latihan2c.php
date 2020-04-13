<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>193040034</title>
    <style>
    .lingkaran{
        width: 40px;
        height: 40px;
        background-color : salmon;
        text-align: center;
        line-height: 40px;
        border-radius: 50%; 
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
     $batas = 3; 
    ?>
    <!-- looping untuk baris -->
    <?php for($baris=1;$baris<=$batas;$baris++): ?>
    <!-- looping untuk kolom -->
      <?php for($kolom=1;$kolom<=$baris;$kolom++): ?>
        <div class="lingkaran"><?=$baris;?></div>
      <?php endfor; ?>
      <div class="clear"></div>
    <?php endfor; ?>
</body>
</html>