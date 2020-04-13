<?php
  function gantiStyle($tulisan, $style1, $style2){
    return "<span class='${style1} ${style2}'> ${tulisan} </span>";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    div{
      border: solid black 1px;
      width: 500px;
      box-shadow: black 1px 2px 5px;
    }
    .warna-text{
      color: #8c782d;
    }
    .font-text{
      font-family: Arial, Helvetica, sans-serif;
      font-size: 28px;
      font-style: italic;
    }
  </style>
</head>
<body>
  <div>
    <?= gantiStyle("Selamat datang di praktikum PW 2020", "warna-text", "font-text");?>
  </div>
</body>
</html>