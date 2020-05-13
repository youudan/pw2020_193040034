<?php
$_SESSION = [];
session_unset();
session_destroy();

setcookie('token', '', time() - 3600);
setcookie('email', '', time() - 3600);

echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
