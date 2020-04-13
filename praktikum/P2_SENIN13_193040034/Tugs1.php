<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>193040034</title>
    <style>
    .kotak-satu{
        width: 40px;
        height: 40px;
        background-color : salmon;
        text-align: center;
        line-height: 40px;
        border: 2px solid black; 
        float: left;
        margin: 1px;
    }
    .kotak-dua{
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

  <?php for($baris=1;$baris<=6;$baris++): ?>
    <?php for($kolom=1;$kolom<=6;$kolom++): ?>
      <?php if(($baris+$kolom)%2 == 0): ?>
        <div class="kotak-satu"></div>
      <?php else: ?>
        <div class="kotak-dua"></div>
      <?php endif; ?>
    <?php endfor; ?>
    <div class="clear"></div>
  <?php endfor; ?>
</body>
</html>