<?php

require '../connect.php';
$id = trim($_POST['id']);
$isocode = trim($_POST['isocode']);
$varos = trim($_POST['varos']);



  $varosokdata = $connection->query("
  UPDATE varosok
  SET isoCode = '$isocode',  varos = '$varos'
  WHERE id = '$id';
  ");

  $newvarosokdata = $connection->query("SELECT * FROM varosok WHERE id = '$id';");



?>

<?php while ($varosok = $newvarosokdata->fetch_assoc()): ?>
    <td data-label="#" id="id_<?php echo $varosok['id']; ?>"><?php echo $varosok['id']; ?></td>
            <td data-label="ISO kód" id="ISO_<?php echo $varosok['id']; ?>"><?php echo $varosok['isoCode']; ?></td>
            <td data-label="Város" id="varos_<?php echo $varosok['id']; ?>"><?php echo $varosok['varos']; ?></td>
            <td class="is-actions-cell">
              <div class="buttons is-right">
                <button class="button is-small is-primary" type="button" id="update" value="<?php echo $varosok['id']; ?>" >
                <i class="fa fa-eye" aria-hidden="true"></i></span>
                </button>
                <button class="button is-small is-danger jb-modal" type="button" id="delete" value="<?php echo $varosok['id']; ?>">
                <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
              </div>
            </td>
<?php endwhile; ?>