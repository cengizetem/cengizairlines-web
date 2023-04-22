<?php

require '../connect.php';
$jaratszam = trim($_POST['jaratszam']);



  $orszagdata = $connection->query("
  DELETE FROM jaratok
  WHERE jaratSzam = '$jaratszam';
  ");


?>

