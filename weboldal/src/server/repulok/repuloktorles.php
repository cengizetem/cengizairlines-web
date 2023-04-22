<?php

require '../connect.php';
$rekod = trim($_POST['rekod']);



  $repulokdata = $connection->query("
  DELETE FROM repulok
  WHERE regisztracioKod = '$rekod';
  ");


?>
