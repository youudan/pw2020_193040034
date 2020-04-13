<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>193040034</title>
</head>
<body>
  <table border="1" cellspacing="0" cellpadding="10">
    <tr>
      <th></th>
      <?php for($i=1;$i<=5;$i++):?>
        <th>kolom <?=$i;?></th>
      <?php endfor;?>
    </tr>
    <!-- Inisialisasi variable -->
    <?php
     $batas = 5; 
    ?>
    <!-- looping untuk baris -->
    <?php for($baris=1;$baris<=$batas;$baris++): ?>
      <tr>
        <th>Baris <?= $baris;?></th>
        <!-- looping untuk kolom -->
        <?php for($kolom=1;$kolom<=$batas;$kolom++):?>
        <td>Baris <?=$baris;?>, Kolom <?=$kolom;?></td>
        <?php endfor;?>
      </tr>
    <?php endfor;?>
  </table>
</body>
</html>