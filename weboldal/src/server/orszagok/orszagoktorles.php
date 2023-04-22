<?php

require '../connect.php';
$isocode = trim($_POST['isocode']);



  $orszagdata = $connection->query("
  DELETE FROM orszagok
  WHERE isoCode = '$isocode';
  ");


?>

