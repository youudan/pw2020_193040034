<?php
  function tumpukanBola($tumpukan){
      for($baris=1;$baris<=$tumpukan;$baris++):
        for($kolom=1;$kolom<=$baris;$kolom++):
          echo '<div class="lingkaran">'. $baris .'</div>';
        endfor;
        echo '<div class="clear"></div>';
      endfor;
  }

?>
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
    <?php tumpukanBola(5);?>
</body>
</html>