<?php
require '../src/server/connect.php';
session_start();
if($_SESSION["admin"] != "1") {
    header("Location: ../");
}

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utasok | Cengiz Airlines Adatkezelő</title>
    <link rel="stylesheet" href="../src/css/bulma.min.css">
    <script type="text/javascript" src="../src/framework/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="../src/framework/jquery-ui.js"></script>
    <link rel="stylesheet" href="../src/css/bulma-responsive-tables.css">
    <script src="../src/js/utasokDB.js"></script>
    <script src="../src/js/all.js"></script>
    
</head>
<body>
<div id="update-message" title="Adatmódosítás">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
   Sikeresen módosította az adatokat!
  </p>
</div>

<div id="felvetel-message" title="Adatfelvétel">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
   Sikeresen hozzáadott utast!
  </p>
</div>

<div id="felvetel-form" title="Új utas felvétele">
  <form id="felvetelform">
<div class="field">
  <label class="label">Útlevél szám</label>
  <div class="control">
    <input class="input" id="uj-utlevel-form" type="text" required>
  </div>
</div>

<div class="field">
  <label class="label">Neve</label>
  <div class="control">
    <input class="input" id="uj-nev-form" type="email"  required>
  </div>
</div>


<div class="field">
  <label class="label">Születési idő</label>
  <div class="control">
    <input class="input" id="uj-szulIdo-form" type="date"  required>
  </div>
</div>

<div class="field">
  <label class="label">Telefon</label>
  <div class="control">
    <input class="input" id="uj-telefon-form" type="text"  required>
  </div>
</div>
<div class="field">
  <label class="label">Email</label>
  <div class="control">
    <input class="input" id="uj-email-form" type="text"  required>
  </div>
</div>
<p class="has-text-centered subtitle  is-6 has-text-danger" id="hibafelvetel"><span id="felveteluzenet"></span></p>
</form>
</div>


<div id="update-form" title="Módosítani a meglévő utast">
  <form id="updateform">
<div class="field">
  <label class="label">Útlevél szám</label>
  <div class="control">
    <input class="input" id="utlevel-form" type="text" value="" disabled>
  </div>
</div>

<div class="field">
  <label class="label">Neve</label>
  <div class="control">
    <input class="input" id="nev-form" type="email" value="" required>
  </div>
</div>


<div class="field">
  <label class="label">Születési idő</label>
  <div class="control">
    <input class="input" id="szulIdo-form" type="date" value="" required>
  </div>
</div>

<div class="field">
  <label class="label">Telefon</label>
  <div class="control">
    <input class="input" id="telefon-form" type="text" value="" required>
  </div>
</div>
<div class="field">
  <label class="label">Email</label>
  <div class="control">
    <input class="input" id="email-form" type="text" value="" required>
  </div>
</div>
<p class="has-text-centered subtitle  is-6 has-text-danger" id="hibaupdate"><span id="updateuzenet"></span></p>
</form>
</div>

<nav class="navbar container" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
          <div class="navbar-item" >
            <div class="is-title is-black">
                  <strong>Cengiz Airlines DBkezelő</strong>
                </div>
          </div>
          <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>
      
        <div id="navbarBasicExample" class="navbar-menu">
          <div class="navbar-start">
            <a class="navbar-item" href="./">
              Járatok
            </a>
             
            <a class="navbar-item" href="utasok">
                Utasok
              </a>

              <a class="navbar-item" href="repulok">
                Repülök
              </a>

              <a class="navbar-item" href="varosok">
                Városok
              </a>

              <a class="navbar-item" href="orszagok">
                Országok
              </a>

              <a class="navbar-item" href="felhasznalo">
              Felhasználói felület
              </a>
          </div>
      
          <div class="navbar-end">
            <div class="navbar-item">
              <div class="buttons">
                <a class="button is-light" href="../src/server/logout">
                  <strong>Kijelentkezés</strong>
                </a>
              </div>
            </div>
          </div>
        </div>
      </nav>
      <section class="section">
  <div class="container box">
    <h1 class="title">Utasok</h1>
    <button class="button is-dark" style="margin-bottom: 20px" id="adatfelvetel">Utas felvétel</button>
    <div class="control">
  <input class="input" type="text" id="kereses-real-time" placeholder="Keresés név alapján">
</div>
    <div class="b-table">
      <div class="table-wrapper has-mobile-cards">
        <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
          <thead>
          <tr>
            <th>Útlevél szám</th>
            <th>Neve</th>
            <th>Születési idő</th>
            <th>Telefon</th>
            <th>Email</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          
          
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
</body>
</html>