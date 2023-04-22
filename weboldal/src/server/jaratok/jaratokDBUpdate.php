<?php

require '../connect.php';


$jaratszam = trim($_POST['jaratszam']);
$repulorekod = trim($_POST['repulorekod']);
$indulas = trim($_POST['indulas']);
$erkezes = trim($_POST['erkezes']);
$honnan = trim($_POST['honnan']);
$hova = trim($_POST['hova']);

  $jaratokdata = $connection->query("
  UPDATE jaratok
  SET  repuloRegisztracioKod = '$repulorekod', indulas= '$indulas', erkezes= '$erkezes', honnan_varosId= '$honnan',hova_varosId=  '$hova'
  WHERE jaratSzam = '$jaratszam';
  ");

  $newjaratdata = $connection->query("SELECT jarat.jaratSzam, jarat.repuloRegisztracioKod, jarat.indulas, jarat.erkezes, honnan.varos as honnan, hova.varos as hova, COUNT(*) as utasok
  FROM jaratok jarat
  INNER JOIN varosok honnan
      on jarat.honnan_varosId = honnan.id
  INNER JOIN varosok hova
      on jarat.hova_varosId = hova.id
  INNER JOIN jaratutas jaratutasok
      on jarat.jaratSzam = jaratutasok.jaratSzam
  GROUP BY jaratSzam
  HAVING jaratSzam = '$jaratszam'
  ORDER BY jaratSzam;");

?>



?>

<?php while ($jaratok = $newjaratdata->fetch_assoc()): ?>
    <td data-label="Járat szám" id="jarat_<?php echo $jaratok['jaratSzam']; ?>"><?php echo $jaratok['jaratSzam']; ?></td>
            <td data-label="Repülő regiszt. kód" id="repuloRegisztracioKod_<?php echo $jaratok['jaratSzam']; ?>"><?php echo $jaratok['repuloRegisztracioKod']; ?></td>
            <td data-label="Indulas" id="indulas_<?php echo $jaratok['jaratSzam']; ?>"><?php echo $jaratok['indulas']; ?></td>
            <td data-label="Érkezes" id="erkezes_<?php echo $jaratok['jaratSzam']; ?>"><?php echo $jaratok['erkezes']; ?></td>
            <td data-label="Honnan" id="honnan_<?php echo $jaratok['jaratSzam']; ?>"><?php echo $jaratok['honnan']; ?></td>
            <td data-label="Hova" id="hova_<?php echo $jaratok['jaratSzam']; ?>"><?php echo $jaratok['hova']; ?></td>
            <td data-label="Utasok száma" id="utasdb_<?php echo $jaratok['jaratSzam']; ?>"><?php echo $jaratok['utasok']; ?></td>
            <td class="is-actions-cell">
              <div class="buttons is-right">
                <button class="button is-small is-link" type="button" id="jaratutasok" value="<?php echo $jaratok['jaratSzam']; ?>" >
                <i class="fa fa-users" aria-hidden="true"></i></span>
                </button>
                <button class="button is-small is-primary" type="button" id="update" value="<?php echo $jaratok['jaratSzam']; ?>" >
                <i class="fa fa-eye" aria-hidden="true"></i></span>
                </button>
                <button class="button is-small is-danger jb-modal" type="button" id="delete" value="<?php echo $jaratok['jaratSzam']; ?>">
                <i class="fa fa-trash" aria-hidden="true"></i>
                </button>
              </div>
            </td>
<?php endwhile; ?>