<?php

require '../connect.php';

  $varosokdata = $connection->query("SELECT * FROM varosok");

?>

<?php while ($varosok = $varosokdata->fetch_assoc()): ?>
    <option id="<?php echo $varosok['varos']; ?>" value="<?php echo $varosok['id']; ?>"><?php echo $varosok['varos']; ?></option>
<?php endwhile; ?>