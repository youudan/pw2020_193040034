<?php
//menggabungkan 2 perulangan while dan for
// Inisialisasi variable
$j = 1;
$batas = 3;
while($j<= $batas){
  for($i=1;$i<= $batas;$i++){
    echo "ini perulangan ke ({$j}, {$i}) <br>";
  }
  $j++;
}