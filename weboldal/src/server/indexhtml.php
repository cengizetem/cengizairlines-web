<?php

if(isset($_POST['honnanVaros']) === true && isset($_POST['hovaVaros']) === true && isset($_POST['honnanIso']) === true && isset($_POST['hovaIso']) === true && isset($_POST['mikorString']) == true ) {



require 'connect.php';

$mikorString = trim($_POST['mikorString']);
$honnanVaros = trim($_POST['honnanVaros']);
$honnanIso = trim($_POST['honnanIso']);
$hovaVaros = trim($_POST['hovaVaros']);
$hovaIso = trim($_POST['hovaIso']);




  $indexkereses = $connection->query("
  SELECT jaratok.jaratSzam, jaratok.repuloRegisztracioKod, jaratok.indulas, jaratok.erkezes, honnan.varos as honnan, hova.varos as hova, repulok.tipus, repulok.maxfo, repulok.egyForeJegy, orszagok.orszag, orszagok.hivatalosNyelv, orszagok.penzNem
  , COUNT(*) as fo
  FROM jaratok 
    INNER JOIN repulok ON jaratok.repuloRegisztracioKod = repulok.regisztracioKod
    INNER JOIN varosok honnan
        on jaratok.honnan_varosId = honnan.id
    INNER JOIN varosok hova
        on jaratok.hova_varosId = hova.id
    INNER JOIN jaratutas jaratutasok
        on jaratok.jaratSzam = jaratutasok.jaratSzam
     INNER JOIN orszagok
        on hova.isoCode = orszagok.isoCode
    WHERE indulas >= '$mikorString' AND honnan.id IN ( SELECT id FROM varosok WHERE varos = '$honnanVaros'AND isoCode = '$honnanIso') AND hova.id IN (SELECT id FROM varosok WHERE varos = '$hovaVaros' AND isoCode = '$hovaIso')
    GROUP BY jaratok.jaratSzam;
");


  $indexkeresesnulla = $connection->query("
  
  SELECT jaratok.jaratSzam, jaratok.repuloRegisztracioKod, jaratok.indulas, jaratok.erkezes, honnan.varos as honnan, hova.varos as hova, repulok.tipus, repulok.maxfo, repulok.egyForeJegy, orszagok.orszag, orszagok.hivatalosNyelv, orszagok.penzNem

  FROM jaratok 
    INNER JOIN repulok ON jaratok.repuloRegisztracioKod = repulok.regisztracioKod
    INNER JOIN varosok honnan
        on jaratok.honnan_varosId = honnan.id
    INNER JOIN varosok hova
        on jaratok.hova_varosId = hova.id
     INNER JOIN orszagok
        on hova.isoCode = orszagok.isoCode
        WHERE indulas >= '$mikorString' AND honnan.id IN ( SELECT id FROM varosok WHERE varos = '$honnanVaros'AND isoCode = '$honnanIso') AND hova.id IN (SELECT id FROM varosok WHERE varos = '$hovaVaros' AND isoCode = '$hovaIso')
    AND jaratok.jaratSzam NOT  IN (SELECT jaratok.jaratSzam
      FROM jaratok
        INNER JOIN repulok ON jaratok.repuloRegisztracioKod = repulok.regisztracioKod
        INNER JOIN varosok honnan
            on jaratok.honnan_varosId = honnan.id
        INNER JOIN varosok hova
            on jaratok.hova_varosId = hova.id
        INNER JOIN jaratutas jaratutasok
            on jaratok.jaratSzam = jaratutasok.jaratSzam
         INNER JOIN orszagok
            on hova.isoCode = orszagok.isoCode
        GROUP BY jaratok.jaratSzam)
    GROUP BY jaratok.jaratSzam;
  ");

}

?>
<h1 class="title">Találatok</h1>
<p  class="subtitle osszesen">Összesen: <?php echo mysqli_num_rows($indexkereses); ?>+<?php echo mysqli_num_rows($indexkeresesnulla); ?> db</p>

<?php while ($indexdata = $indexkereses->fetch_assoc()): ?>
    <div class="box talalt is-vcentered">
    <h1 class="title is-5">Járat száma: <?php echo $indexdata['jaratSzam']; ?></h1>
    <h1 class="title is-5">Repülő kódja: <?php echo $indexdata['repuloRegisztracioKod']; ?></h1>
    <h1 class="title is-5">Repülő típusa: <?php echo $indexdata['tipus']; ?></h1>
          <div class="is-flex">
            <h1 class="title is-5">Járat: <?php echo $indexdata['honnan']; ?></h1><h1 class="title is-5"> --></h1><h1 class="title is-5"><?php echo $indexdata['hova']; ?></h1>
          </div>
          <h1 class="title is-5">Indulás: <?php echo $indexdata['indulas']; ?></h1>
          <h1 class="title is-5">Érkezés: <?php echo $indexdata['erkezes']; ?></h1>
          <h1 class="title is-5">Foglalások száma: <?php echo $indexdata['fo']; ?>/ <?php echo $indexdata['maxfo']; ?></h1>
          <h1 class="title is-5">Jegy ár: <?php echo $indexdata['egyForeJegy']; ?> ft</h1>
          <h1 class="title is-5">Célirány országa: <?php echo $indexdata['orszag']; ?> ft</h1>
          <h1 class="title is-5">Célirány nyelve: <?php echo $indexdata['hivatalosNyelv']; ?> ft</h1>
          <h1 class="title is-5">Pénze: <?php echo $indexdata['penzNem']; ?> ft</h1>
        </div>
<?php endwhile; ?>

<?php while ($indexdatanulla = $indexkeresesnulla->fetch_assoc()): ?>
    <div class="box talalt is-vcentered">
    <h1 class="title is-5">Járat száma: <?php echo $indexdatanulla['jaratSzam']; ?></h1>
    <h1 class="title is-5">Repülő kódja: <?php echo $indexdatanulla['repuloRegisztracioKod']; ?></h1>
    <h1 class="title is-5">Repülő típusa: <?php echo $indexdatanulla['tipus']; ?></h1>
          <div class="is-flex">
            <h1 class="title is-5">Járat: <?php echo $indexdatanulla['honnan']; ?></h1><h1 class="title is-5"> --></h1><h1 class="title is-5"><?php echo $indexdatanulla['hova']; ?></h1>
          </div>
          <h1 class="title is-5">Indulás: <?php echo $indexdatanulla['indulas']; ?></h1>
          <h1 class="title is-5">Érkezés: <?php echo $indexdatanulla['erkezes']; ?></h1>
          <h1 class="title is-5">Foglalások száma: 0/ <?php echo $indexdatanulla['maxfo']; ?></h1>
          <h1 class="title is-5">Jegy ár: <?php echo $indexdatanulla['egyForeJegy']; ?> ft</h1>
          <h1 class="title is-5">Célirány országa: <?php echo $indexdatanulla['orszag']; ?> ft</h1>
          <h1 class="title is-5">Célirány nyelve: <?php echo $indexdatanulla['hivatalosNyelv']; ?> ft</h1>
          <h1 class="title is-5">Pénze: <?php echo $indexdatanulla['penzNem']; ?> ft</h1>
        </div>
<?php endwhile; ?>

