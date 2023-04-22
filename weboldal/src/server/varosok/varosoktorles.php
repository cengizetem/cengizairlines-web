<?php

require '../connect.php';
$id = trim($_POST['id']);



  $varosdata = $connection->query("
  DELETE FROM varosok
  WHERE id = '$id';
  ");


?>

