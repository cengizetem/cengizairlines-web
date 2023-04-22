<?php

require '../connect.php';

  $repulokdata = $connection->query("SELECT * FROM repulok");

?>

<?php while ($repulok = $repulokdata->fetch_assoc()): ?>
    <option id="<?php echo $repulok['regisztracioKod']; ?>" value="<?php echo $repulok['regisztracioKod']; ?>"><?php echo $repulok['regisztracioKod']; ?></option>
<?php endwhile; ?>