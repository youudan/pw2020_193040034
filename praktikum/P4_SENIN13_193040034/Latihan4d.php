<?php
  $players = [
    ['nama'=> "Mohammad Salah", 'club'=> "Liverpool", 'main'=> 90, 'gol'=> 103, 'assist'=> 8],
    ['nama'=> "Cristiano Ronaldo", 'club'=> "Juventus", 'main'=> 100, 'gol'=> 76, 'assist'=> 30],
    ['nama'=> "Lionel Messi", 'club'=> "Barcelona", 'main'=> 120, 'gol'=> 80, 'assist'=> 12],
    ['nama'=> "Zlatan Ibrahimovic", 'club'=> "Ac Milan", 'main'=> 100, 'gol'=> 10, 'assist'=> 12],
    ['nama'=> "Neymar Jr", 'club'=> "Paris Saint Germain", 'main'=> 109, 'gol'=> 56, 'assist'=> 15]
  ];
  array_push($players, ['nama'=>"Sadio Mane", 'club'=>"Liverpool", 'main'=> 63, 'gol'=> 30, 'assist'=> 70], ['nama'=>"Luca Modric", 'club'=>"Real Madrid", 'main'=> 87, 'gol'=> 12, 'assist'=> 48]);
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
    table {
      border-collapse: collapse;
    }
    table, th, td {
    border: 2px solid black;
    text-align: left;
    }
  </style>
  <title>193040034</title>
</head>
<body>

  <h3>Daftar pemain bola terkenal, club dan jumlah golnya</h3>
  <table border="1">
    <tr>
      <th>NO</th>
      <th width="180px">NAMA</th>
      <th width="160px">CLUB</th>
      <th width="70px">MAIN</th>
      <th width="70px">GOL</th>
      <th width="70px">ASSIST</th>
    </tr>
    <?php 
      $no=1;
      $jumlah = ['main' => 0, 'gol' => 0, 'assist'=> 0];
      foreach($players as $player): 
    ?>
      <tr>
        <td><?=  $no; ?></td>
        <td><?=  $player['nama']; ?></td>
        <td><?=  $player['club']; ?></td>
        <td><?=  $player['main']; ?></td>
        <td><?=  $player['gol']; ?></td>
        <td><?=  $player['assist']; ?></td>
      </tr>
    <?php
      $no++; 
      $jumlah['main'] += $player['main'];
      $jumlah['gol'] += $player['gol'];
      $jumlah['assist'] += $player['assist'];
      endforeach; 
    ?>
    <tr>
      <th>#</th>
      <th colspan="2" style="text-align:center;">JUMLAH</th>
      <td><?= $jumlah['main']; ?></td>
      <td><?= $jumlah['gol']; ?></td>
      <td><?= $jumlah['assist']; ?></td>
    </tr>
  </table>
</body>
</html>