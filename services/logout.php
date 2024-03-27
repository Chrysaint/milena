<?php
setcookie("user", $userData['idUsers'], time() - (3600 * 24 * 3), "/", '.beauty');
header('location: ../index.php');
exit;
exit;
