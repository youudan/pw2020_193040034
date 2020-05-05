<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>YouuDan Musicale</title>
  <link rel="icon" type="image/png" href="assets/img/favicon.ico" sizes="16x16">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>


</head>

<body>
  <?php
  if (!$_GET) {
    require "app/Home.php";
  } else {
    switch ($_GET['site']) {
      case 'alat-musik':
        if (isset($_GET['detail']) && $_GET['detail']) {
          require "app/AlatMusikDetail.php";
        } else {
          require "app/AlatMusik.php";
        }

        break;
      case 'login':
        require "app/Login.php";
        break;
      case 'signup':
        require "app/Signup.php";
        break;

      default:
        header('Location: index.php');
        break;
    }
  }
  ?>

</body>

</html>