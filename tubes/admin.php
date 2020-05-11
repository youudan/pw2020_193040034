<?php
session_start();

if (!isset($_SESSION['login'])) {
  header('Location: index.php?site=login');
  exit;
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>YouuDan Musicale</title>
  <link rel="icon" type="image/png" href="assets/img/favicon.ico" sizes="16x16">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body>

  <?php
  $halaman = 'admin';

  require "app/components/Navbar.php";

  if (!$_GET) {
    require "app/admin/Home.php";
  } else {
    switch ($_GET['site']) {
      case 'profile':
        require "app/admin/Profile.php";
        break;
      case 'alat-musik-tambah':
        require "app/admin/AlatMusikTambah.php";
        break;
      case 'alat-musik-ubah':
        require "app/admin/AlatMusikUbah.php";
        break;
      case 'alat-musik-hapus':
        require "app/admin/AlatMusikHapus.php";
        break;
      case 'alat-musik-sampah':
        require "app/admin/AlatMusikSampah.php";
        break;
      case 'alat-musik-kembalikan':
        require "app/admin/AlatMusikKembalikan.php";
        break;
      case 'alat-musik-hapus-permanen':
        require "app/admin/AlatMusikHapusPermanen.php";
        break;
      case 'logout':
        require "app/admin/Logout.php";
        break;

      default:
        header('Location: index.php');
        break;
    }
  }
  ?>

</body>

</html>