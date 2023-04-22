<?php

require '../connect.php';
$iso = trim($_POST['iso']);
$orszag = trim($_POST['orszag']);
$nyelv = trim($_POST['nyelv']);
$penz = trim($_POST['penz']);


  $orszagokdata = $connection->query("
  INSERT INTO orszagok
  VALUES('$iso','$orszag','$nyelv', '$penz')");




?>