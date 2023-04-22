<?php

require '../connect.php';
$rekod = trim($_POST['rekod']);
$nev = trim($_POST['nev']);
$tipus = trim($_POST['tipus']);
$max = trim($_POST['max']);
$jegy = trim($_POST['jegy']);


  $repulokdata = $connection->query("
  INSERT INTO repulok
  VALUES('$rekod','$nev','$tipus', '$max', '$jegy')");


?>

