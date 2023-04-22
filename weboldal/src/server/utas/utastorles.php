<?php

require '../connect.php';
$utlevelszam = trim($_POST['szemelyTorles']);



  $utasdata = $connection->query("
  DELETE FROM utasok
  WHERE utlevelSzam = '$utlevelszam';
  ");


?>

