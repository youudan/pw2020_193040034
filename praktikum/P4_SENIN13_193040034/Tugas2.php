<?php
  $buku = [
    [
      'cover'   => 'assets/img/cover/cover-1.jpg',
      'judul'   => 'Semua Bisa Menjadi Programmer Laravel Basic',
      'kategori'=> 'Pemrograman',
      'author'  => 'YUNIAR SUPARDI & SULAEMAN',
      'penerbit'=> 'Elex Media Komputindo'
    ],
    [
      'cover'   => 'assets/img/cover/cover-2.jpg',
      'judul'   => 'Tip Dan Trik Program Database Python',
      'kategori'=> 'Pemrograman',
      'author'  => 'YUNIAR SUPARDI DAN YOGI SYARIEF, S.T., M.KOM.',
      'penerbit'=> 'Elex Media Komputindo'
    ],
    [
      'cover'   => 'assets/img/cover/cover-3.jpg',
      'judul'   => 'Step by Step MS SQL Server',
      'kategori'=> 'Manajemen Database',
      'author'  => 'Gregorius Agung P',
      'penerbit'=> 'Elex Media Komputindo'
    ],
    [
      'cover'   => 'assets/img/cover/cover-4.jpg',
      'judul'   => 'Database Design All in One: Theory, Practice, and Case Study',
      'kategori'=> 'Manajemen Database',
      'author'  => 'Indrajani, S.kom., Mm.',
      'penerbit'=> 'Elex Media Komputindo'
    ],
    [
      'cover'   => 'assets/img/cover/cover-5.jpg',
      'judul'   => 'Book Of Spss: Pengolahan & Analisis Data',
      'kategori'=> 'Komputer & Teknologi',
      'author'  => 'Romie Priyastama',
      'penerbit'=> 'Start Up'
    ],
    [
      'cover'   => 'assets/img/cover/cover-6.jpg',
      'judul'   => 'Juliet of The Boarding School 01',
      'kategori'=> 'Komik',
      'author'  => 'Yosuke Kaneda',
      'penerbit'=> 'm&c!'
    ],
    [
      'cover'   => 'assets/img/cover/cover-7.jpg',
      'judul'   => 'Can\'t Not Love 01',
      'kategori'=> 'Komik',
      'author'  => 'Yuu Yoshinaga',
      'penerbit'=> 'm&c!'
    ],
    [
      'cover'   => 'assets/img/cover/cover-8.jpg',
      'judul'   => 'Garden of Grimoire 01',
      'kategori'=> 'Komik',
      'author'  => 'Haru Sakurana',
      'penerbit'=> 'm&c!'
    ],
    [
      'cover'   => 'assets/img/cover/cover-9.jpg',
      'judul'   => 'Obat Malas Dosis Tinggi',
      'kategori'=> 'Spiritualitas',
      'author'  => 'Khalifa Bisma Sanjaya',
      'penerbit'=> 'Elex Media Komputindo'
    ],
    [
      'cover'   => 'assets/img/cover/cover-10.jpg',
      'judul'   => 'CR: Dark Wild Night',
      'kategori'=> 'Novel',
      'author'  => 'Christina Lauren',
      'penerbit'=> 'Elex Media Komputindo'
    ],
  ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>193040034</title>
</head>
<body>
  <div class="container-fluid">
    <h3>Daftar Buku</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Cover</th>
          <th scope="col">Judul</th>
          <th scope="col">Kategori</th>
          <th scope="col">Author</th>
          <th scope="col">Penerbit</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $no = 1;
          foreach($buku as $value): 
        ?>
          <tr>
            <th scope="row"><?=$no;?></th>
            <td><img src="<?=$value['cover'];?>" alt="..." class="img-thumbnail" width="150px"></td>
            <td><?=$value['judul'];?></td>
            <td><?=$value['kategori'];?></td>
            <td><?=$value['author'];?></td>
            <td><?=$value['penerbit'];?></td>
          </tr>
        <?php
          $no++;
          endforeach;
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>