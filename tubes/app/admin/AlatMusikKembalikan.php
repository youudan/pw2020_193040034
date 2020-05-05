<?php
if ($_SESSION['role'] !== 'admin') {
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php">';
}

require "app/Database.php";
if (!isset($_GET['slug'])) {
  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=admin.php">';
}
if (kembalikanAlatMusik($_GET['slug']) > 0) {
  echo '<script>
          alert("data berhasil dikembalikan!");
          document.location.href = "admin.php";
        </script>';
} else {
  echo '<script>
          alert("data gagal dikembalikan!");
        </script>';
}
