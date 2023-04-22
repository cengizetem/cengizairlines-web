<?php

require '../connect.php';

$jaratszam = trim($_POST['jaratszam']);

  $jaratutasdata = $connection->query("SELECT *
  FROM `jaratutas` INNER JOIN utasok ON jaratutas.utasutlevelSzam = utasok.utlevelSzam
  WHERE jaratSzam = '$jaratszam';");

?>

<?php while ($jaratutas = $jaratutasdata->fetch_assoc()): ?>
    <tr  id="tr_<?php echo $jaratutas['utasutlevelSzam']; ?>">
            <td data-label="Utas" id="utas_<?php echo $jaratutas['utasutlevelSzam']; ?>"><?php echo $jaratutas['neve']; ?></td>
            <td class="is-actions-cell">
              <div class="buttons is-right">
                <button class="button is-small is-danger jb-modal" type="button" id="utasdelete" value="<?php echo $jaratutas['utasutlevelSzam']; ?>">
                <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
              </div>
            </td>
          </tr>   
<?php endwhile; ?>