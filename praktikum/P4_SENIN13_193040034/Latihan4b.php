<?php
  $players = [ "Mohammad Salah","Cristiano Ronaldo", "Lionel Messi", "Zlatan Ibrahimovic", "Neymar Jr"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }
    .new-push {
      color: blue;
    }
  </style>
  <title>193040034</title>
</head>
<body>
  <h3>Daftar pemain bola terkenal</h3>
  <ol>
    <?php foreach($players as $value): ?>
      <li><?= $value; ?></li>
    <?php endforeach; ?>
  </ol>

  <?php
    array_push($players, "Sadio Mane", "Luca Modric");
    asort($players)
  ?>
  <h3>Daftar pemain bola terkenal baru</h3>
  <ol>
    <?php foreach($players as $key=>$value): ?>
      <li class="<?= $key > 4 ? 'new-push':'' ?>"><?= $value; ?></li>
    <?php endforeach; ?>
  </ol>
</body>
</html>