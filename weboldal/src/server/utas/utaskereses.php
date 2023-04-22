<?php

require '../connect.php';

$kereses = trim($_POST['kereses']); 
if ($kereses != "") {
    $utasdata = $connection->query("SELECT * FROM utasok WHERE neve LIKE '%{$kereses}%'");
}
else {
    $utasdata = $connection->query("SELECT * FROM utasok");
}
  
?>

<?php while ($utasok = $utasdata->fetch_assoc()): ?>
    <tr  id="tr_<?php echo $utasok['utlevelSzam']; ?>">
            <td data-label="Útlevél szám" id="utlevelSzam_<?php echo $utasok['utlevelSzam']; ?>"><?php echo $utasok['utlevelSzam']; ?></td>
            <td data-label="Neve" id="neve_<?php echo $utasok['utlevelSzam']; ?>"><?php echo $utasok['neve']; ?></td>
            <td data-label="Születési idő" id="szulido_<?php echo $utasok['utlevelSzam']; ?>"><?php echo $utasok['szulido']; ?></td>
            <td data-label="Telefon" id="telefonszam_<?php echo $utasok['utlevelSzam']; ?>"><?php echo $utasok['telefonszam']; ?></td>
            <td data-label="Email" id="email_<?php echo $utasok['utlevelSzam']; ?>"><?php echo $utasok['email']; ?></td>
            <td class="is-actions-cell">
              <div class="buttons is-right">
                <button class="button is-small is-primary" type="button" id="update" value="<?php echo $utasok['utlevelSzam']; ?>" >
                <i class="fa fa-eye" aria-hidden="true"></i></span>
                </button>
                <button class="button is-small is-danger jb-modal" type="button" id="delete" value="<?php echo $utasok['utlevelSzam']; ?>">
                <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
              </div>
            </td>
          </tr>
<?php endwhile; ?>