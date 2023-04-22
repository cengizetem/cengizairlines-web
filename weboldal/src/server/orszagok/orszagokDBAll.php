<?php

require '../connect.php';

  $orszagdata = $connection->query("SELECT * FROM orszagok");

?>

<?php while ($orszagok = $orszagdata->fetch_assoc()): ?>
    <tr  id="tr_<?php echo $orszagok['isoCode']; ?>">
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
          </tr>
<?php endwhile; ?>