<?php
  $jawabanIsset = "Isset adalah = Sebuah function yang sudah disekdiakan oleh PHP / Built-in Function yang berfungsi untuk memvalidasi apakah variable mempunyai nilai atau tidak, return dari isset berupa boolean dan apabila variable yang di cek memiliki nilai maka akan menghasilkan true dan apabila tidak memiliki nilai maka isset akan mengembalikan nilai false <br><br>";
  $jawabanEmpty = "Isset adalah = Sebuah function yang sudah disekdiakan oleh PHP / Built-in Function yang berfungsi untuk memvalidasi apakah variable mempunyai nilai atau tidak, return dari empty berupa boolean dan apabila variable yang di cek memiliki nilai maka akan menghasilkan false dan apabila tidak memiliki nilai maka empty akan mengembalikan nilai true";
  $GLOBALS['isset'] = $jawabanIsset;
  $GLOBALS['empty'] = $jawabanEmpty;

  function soal($style){
    echo '<div style="'. $style .'">';
    echo $GLOBALS['isset'];
    echo $GLOBALS['empty'];
    echo '</div>';
  }
  $style = "font-family:Arial;
            border: solid black 1px;
            padding: 15px;  
            margin-bottom: 15px;
          ";
  soal($style);

  $niki = "Wijdan";

  echo '<div style="'. $style .'"> Contoh pengunaan dengan variable yang sama : <br>';
  echo 'isset() = ';
  var_dump( isset($niki) );
  echo '<br>empty() = ';
  var_dump( empty($niki) );
  echo '</div>';
?>