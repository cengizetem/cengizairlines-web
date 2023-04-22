<?php

require '../connect.php';
$username = trim($_POST['felhasznalo']);
$jelszo = trim($_POST['jelszo']);


  $felhasznalodata = $connection->query("
  UPDATE felhasznalok
  SET passwd = '$jelszo'
  WHERE username = '$username';
  ");

  $newfelhasznalodata = $connection->query("SELECT * FROM felhasznalok WHERE username = '$username';");



?>

<?php while ($felhasznalok = $newfelhasznalodata->fetch_assoc()): ?>
  <td data-label="Username" id="username_<?php echo $felhasznalok['username']; ?>"><?php echo $felhasznalok['username']; ?></td>
            <td data-label="Jelszo" id="jelszo_<?php echo $felhasznalok['passwd']; ?>"><?php echo $felhasznalok['passwd']; ?></td>
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
<?php endwhile; ?>