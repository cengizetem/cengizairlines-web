<?php

require '../connect.php';
$username = trim($_POST['felhasznalo']);
$jelszo = trim($_POST['passwd']);

  $felhasznalodata = $connection->query("
  INSERT INTO felhasznalok
  VALUES('$username','$jelszo')");
?>

