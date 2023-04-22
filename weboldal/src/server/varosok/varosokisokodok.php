<?php

require '../connect.php';

  $orszagdata = $connection->query("SELECT * FROM orszagok");

?>

<?php while ($orszagok = $orszagdata->fetch_assoc()): ?>
    <option id="option_<?php echo $orszagok['isoCode']; ?>" value="<?php echo $orszagok['isoCode']; ?>"><?php echo $orszagok['isoCode']; ?></option>
<?php endwhile; ?>