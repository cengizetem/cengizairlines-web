<?php

require '../connect.php';
$utlevelszam = trim($_POST['utlevelSzam']);
$nev = trim($_POST['nev']); 
$szulido = trim($_POST['szulIdo']);
$telefon = trim($_POST['telefon']); 
$email = trim($_POST['email']); 

  $utasdata = $connection->query("
  INSERT INTO utasok
  VALUES('$utlevelszam','$nev', '$szulido', '$telefon', '$email')");
?>

