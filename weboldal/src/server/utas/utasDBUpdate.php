<?php

require '../connect.php';
$utlevelszam = trim($_POST['utlevelSzam']);
$nev = trim($_POST['nev']); 
$szulido = trim($_POST['szulIdo']);
$telefon = trim($_POST['telefon']); 
$email = trim($_POST['email']); 

  $utasdata = $connection->query("
  UPDATE utasok
  SET neve = '$nev', szulido = '$szulido', telefonszam = '$telefon', email = '$email'
  WHERE utlevelSzam = '$utlevelszam';
  ");

  $newutasdata = $connection->query("SELECT * FROM utasok WHERE utlevelSzam = '$utlevelszam';");



?>

<?php while ($utasok = $newutasdata->fetch_assoc()): ?>
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
<?php endwhile; ?>