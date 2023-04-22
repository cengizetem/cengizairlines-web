<?php

require '../connect.php';
$jaratszam = trim($_POST['jaratszam']);
$repulorekod = trim($_POST['repulorekod']);
$indulas = trim($_POST['indulas']);
$erkezes = trim($_POST['erkezes']);
$honnan = trim($_POST['honnan']);
$hova = trim($_POST['hova']);



  $orszagokdata = $connection->query("
  INSERT INTO jaratok
  VALUES('$jaratszam','$repulorekod',  '$indulas', '$erkezes',  '$honnan',  '$hova')");
  


?>