<?php
$conn = mysqli_connect('localhost', 'pw19034', '#Akun#193040034#') or die("koneksi DB gagal");
mysqli_select_db($conn, 'pw19034_pw_193040034') or die("database tidak ditemukan");
$query = "SELECT b.id, b.cover, b.judul, b.author, b.penerbit, k.nama as kategori FROM buku_kategori bk JOIN buku b ON bk.buku_id = b.id JOIN kategori k ON bk.kategori_id = k.id";
$buku = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>193040034</title>
</head>

<body>
  <div class="container">
    <h3>Daftar Buku - Latihan5a</h3>
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
        while ($row = mysqli_fetch_assoc($buku)) :
        ?>
          <tr>
            <th scope="row"><?= $no; ?></th>
            <td><img src="../<?= $row['cover']; ?>" alt="" class="img-thumbnail" width="150px"></td>
            <td><?= $row['judul']; ?></td>
            <td><?= $row['kategori']; ?></td>
            <td><?= $row['author']; ?></td>
            <td><?= $row['penerbit']; ?></td>
          </tr>
        <?php
          $no++;
        endwhile;
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>