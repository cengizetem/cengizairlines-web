<?php

require '../connect.php';

  $utasdata = $connection->query("SELECT * FROM utasok");

?>

<?php while ($utas = $utasdata->fetch_assoc()): ?>
    <option id="<?php echo $utas['utlevelSzam']; ?>" value="<?php echo $utas['utlevelSzam']; ?>"><?php echo $utas['neve']; ?></option>
<?php endwhile; ?>