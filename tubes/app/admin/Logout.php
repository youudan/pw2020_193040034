<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('token', '', time() - 3600);
setcookie('email', '', time() - 3600);

header("Location: index.php");
