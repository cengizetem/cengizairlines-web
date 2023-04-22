<?php

require '../connect.php';
$username = trim($_POST['username']);



  $utasdata = $connection->query("
  DELETE FROM felhasznalok
  WHERE username = '$username';
  ");


?>

