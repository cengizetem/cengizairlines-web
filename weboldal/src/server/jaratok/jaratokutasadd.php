<?php

require '../connect.php';
$utasadd = trim($_POST['utasadd']);
$utasselect = trim($_POST['utasselect']);


  $orszagdata = $connection->query("
  INSERT  INTO jaratutas
  VALUE('$utasadd', '$utasselect');
  ");


?>

