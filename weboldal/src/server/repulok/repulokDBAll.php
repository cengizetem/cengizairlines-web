<?php

require '../connect.php';

  $repulokdata = $connection->query("SELECT * FROM repulok");

?>

<?php while ($repulok = $repulokdata->fetch_assoc()): ?>
    <tr  id="tr_<?php echo $repulok['regisztracioKod']; ?>">
            <td data-label="Regisztráció kód" id="regisztracioKod_<?php echo $repulok['regisztracioKod']; ?>"><?php echo $repulok['regisztracioKod']; ?></td>
            <td data-label="Neve" id="neve_<?php echo $repulok['regisztracioKod']; ?>"><?php echo $repulok['neve']; ?></td>
            <td data-label="Típus" id="tipus_<?php echo $repulok['regisztracioKod']; ?>"><?php echo $repulok['tipus']; ?></td>
            <td data-label="Max kapacitás" id="max_<?php echo $repulok['regisztracioKod']; ?>"><?php echo $repulok['maxfo']; ?></td>
            <td data-label="Egy főre jutó jegy" id="jegy_<?php echo $repulok['regisztracioKod']; ?>"><?php echo $repulok['egyForeJegy']; ?></td>
            <td class="is-actions-cell">
              <div class="buttons is-right">
                <button class="button is-small is-primary" type="button" id="update" value="<?php echo $repulok['regisztracioKod']; ?>" >
                <i class="fa fa-eye" aria-hidden="true"></i></span>
                </button>
                <button class="button is-small is-danger jb-modal" type="button" id="delete" value="<?php echo $repulok['regisztracioKod']; ?>">
                <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
              </div>
            </td>
          </tr>
<?php endwhile; ?>