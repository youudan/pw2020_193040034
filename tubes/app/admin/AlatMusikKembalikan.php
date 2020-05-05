<?php
if ($_SESSION['role'] !== 'admin') {
  header("Location: admin.php");
}

require "app/Database.php";
if (!isset($_GET['slug'])) {
  header("Location: admin.php");
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
