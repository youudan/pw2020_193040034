<?php
require "app/Database.php";


if (hapusAlatMusik($_GET['slug']) > 0) {
  echo '<script>
          alert("data dipindahkan ke tempat sampah!");
          document.location.href = "admin.php";
        </script>';
} else {
  echo '<script>
          alert("data gagal dihapus!");
        </script>';
}
