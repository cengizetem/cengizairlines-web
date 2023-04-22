<?php

require '../connect.php';
$deleteutas = trim($_POST['deleteutas']);



  $orszagdata = $connection->query("
  DELETE FROM jaratutas
  WHERE  utasutlevelSzam = '$deleteutas';
  ");


?>

