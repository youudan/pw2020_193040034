<?php
if ($_SESSION['role'] !== 'admin') {
  header("Location: admin.php");
}

require "app/Database.php";


if (hapusAlatMusikPermanen($_GET['slug']) > 0) {
  echo '<script>
          alert("data dihapus permanen!");
          document.location.href = "admin.php?site=alat-musik-sampah";
        </script>';
} else {
  echo '<script>
          alert("data gagal dihapus permanen!");
        </script>';
}
