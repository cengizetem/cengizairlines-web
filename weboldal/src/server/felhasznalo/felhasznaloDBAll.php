<?php

require '../connect.php';

  $felhasznalodata = $connection->query("SELECT * FROM felhasznalok");

?>

<?php while ($felhasznalok = $felhasznalodata->fetch_assoc()): ?>
    <tr  id="tr_<?php echo $felhasznalok['username']; ?>">
            <td data-label="Username" id="username_<?php echo $felhasznalok['username']; ?>"><?php echo $felhasznalok['username']; ?></td>
            <td data-label="Jelszo" id="jelszo_<?php echo $felhasznalok['username']; ?>"><?php echo $felhasznalok['passwd']; ?></td>
            <td class="is-actions-cell">
              <div class="buttons is-right">
                <button class="button is-small is-primary" type="button" id="update" value="<?php echo $felhasznalok['username']; ?>" >
                <i class="fa fa-eye" aria-hidden="true"></i></span>
                </button>
                <button class="button is-small is-danger jb-modal" type="button" id="delete" value="<?php echo $felhasznalok['username']; ?>">
                <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
              </div>
            </td>
          </tr>
<?php endwhile; ?>