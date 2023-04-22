<?php

require 'connect.php';

$varosok = $connection->query("SELECT * FROM varosok");

?>
<?php while ($varosAdatok = $varosok->fetch_assoc()): ?>
    <option><?php echo $varosAdatok['varos']; ?> (<?php echo $varosAdatok['isoCode']; ?>)</option>
<?php endwhile; ?>