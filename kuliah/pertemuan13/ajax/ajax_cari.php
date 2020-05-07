<?php
require '../functions.php';

$mahasiswa = cari($_GET['keyword']);
?>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Gambar</th>
      <th scope="col">Nama</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody class="tbody">

    <?php if (empty($mahasiswa)) : ?>
      <tr>
        <td colspan="4">
          <p class="text-center mt-3 text-danger">data mahasiswa tidak ditemukan!</p>
        </td>
      </tr>
    <?php endif; ?>

    <?php
    $no = 1;
    foreach ($mahasiswa as $m) :
    ?>
      <tr>
        <th scope="row"><?= $no; ?></th>
        <td> <img src="img/<?= $m['gambar']; ?>" class="mr-3 mb-2" width="64px"></td>
        <td><?= $m['nama']; ?></td>
        <td>
          <a class="btn btn-success float-right" href="detail.php?id=<?= $m['id']; ?>">Detail</a>
        </td>
      </tr>
    <?php
      $no++;
    endforeach;
    ?>
  </tbody>
</table>