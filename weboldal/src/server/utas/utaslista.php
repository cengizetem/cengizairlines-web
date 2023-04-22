<?php

require '../connect.php';

  $utasdata = $connection->query("SELECT * FROM utasok");
  $lista = array();
  while ($utasok = $utasdata->fetch_assoc()) {
    $data = $utasok['utlevelSzam'];
     array_push($lista, $data);
    echo "$lista";
  }
?>
