<?php
  $players = [
    ['nama'=>"Mohammad Salah", 'club'=>"Liverpool"],
    ['nama'=>"Cristiano Ronaldo", 'club'=>"Juventus"],
    ['nama'=>"Lionel Messi", 'club'=>"Barcelona"],
    ['nama'=>"Zlatan Ibrahimovic", 'club'=>"Ac Milan"],
    ['nama'=>"Neymar Jr", 'club'=>"Paris Saint Germain"]
  ];
  array_push($players, ['nama'=>"Sadio Mane", 'club'=>"Liverpool"], ['nama'=>"Luca Modric", 'club'=>"Real Madrid"]);
  asort($players);
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
    table th {
      text-align: left;
    }
  </style>
  <title>193040034</title>
</head>
<body>

  <h3>Daftar pemain bola terkenal dan clubnya</h3>
  <table>
    <?php foreach($players as $player): ?>
      <tr>
        <th width="160px"><?=  $player['nama']; ?></th>
        <td>:</td>
        <td><?=  $player['club']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>

</body>
</html>