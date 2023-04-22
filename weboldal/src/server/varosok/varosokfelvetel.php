<?php

require '../connect.php';
$iso = trim($_POST['iso']);
$varos = trim($_POST['varos']);



  $orszagokdata = $connection->query("
  INSERT INTO varosok(`isoCode`,`varos`)
  VALUES('$iso','$varos')");


?>