<?php

require '../connect.php';
$iso = trim($_POST['iso']);
$orszag = trim($_POST['orszag']);
$nyelv = trim($_POST['nyelv']);
$penz = trim($_POST['penz']);


  $orszagokdata = $connection->query("
  UPDATE orszagok
  SET orszag = '$orszag', hivatalosNyelv = '$nyelv',  penzNem = '$penz'
  WHERE isoCode = '$iso';
  ");

  $neworszagokdata = $connection->query("SELECT * FROM orszagok WHERE isoCode = '$iso';");



?>

<?php while ($orszagok = $neworszagokdata->fetch_assoc()): ?>
            <td data-label="ISO Kód" id="isoCode<?php echo $orszagok['isoCode']; ?>"><?php echo $orszagok['isoCode']; ?></td>
            <td data-label="Ország" id="orszag_<?php echo $orszagok['isoCode']; ?>"><?php echo $orszagok['orszag']; ?></td>
            <td data-label="Nyelv" id="nyelv_<?php echo $orszagok['isoCode']; ?>"><?php echo $orszagok['hivatalosNyelv']; ?></td>
            <td data-label="Pénz" id="penz_<?php echo $orszagok['isoCode']; ?>"><?php echo $orszagok['penzNem']; ?></td>
            <td class="is-actions-cell">
              <div class="buttons is-right">
                <button class="button is-small is-primary" type="button" id="update" value="<?php echo $orszagok['isoCode']; ?>" >
                <i class="fa fa-eye" aria-hidden="true"></i></span>
                </button>
                <button class="button is-small is-danger jb-modal" type="button" id="delete" value="<?php echo $orszagok['isoCode']; ?>">
                <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
              </div>
            </td>
<?php endwhile; ?>