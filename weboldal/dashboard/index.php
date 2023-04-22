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
    <title>Járatok | Cengiz Airlines Adatkezelő</title>
    <link rel="stylesheet" href="../src/css/bulma.min.css">
    <script type="text/javascript" src="../src/framework/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="../src/framework/jquery-ui.js"></script>
    <link rel="stylesheet" href="../src/css/bulma-responsive-tables.css">
    <script src="../src/js/jaratokDB.js"></script>
    <script src="../src/js/all.js"></script>
    
</head>
<body>

<div id="felvetel-message" title="Adatfelvétel">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
   Sikeresen hozzáadott járatot!
  </p>
</div>

<div id="felvetel-form" title="Új járat felvétele">
  <form id="felvetelform">
  
  <div class="field">
    <label class="label">Járat szám</label>
    <div class="control">
      <input class="input" id="uj-jaratszam-form" type="text" value="" >
    </div>
  </div>

  <div class="field">
  <label class="label">Repülő regiszt. kód</label>
  <div class="control">
      <div class="select is-rounded" id="hova-form">
        <select id="uj-repulo_select"></select>
      </div>
  </div>
</div>

  <div class="field">
    <label class="label">Indulas</label>
    <div class="control">
      <input class="input" id="uj-indulas-form" type="datetime-local" value="">
    </div>
  </div>

  <div class="field">
    <label class="label">Érkezés</label>
    <div class="control">
      <input class="input" id="uj-erkezes-form" type="datetime-local" value="">
    </div>
  </div>

<div class="field">
  <label class="label">Honnan</label>
  <div class="control">
      <div class="select is-rounded" id="honnan-form">
        <select id="uj-honnan_select"></select>
      </div>
  </div>
</div>

<div class="field">
  <label class="label">Hová</label>
  <div class="control">
      <div class="select is-rounded" id="hova-form">
        <select id="uj-hova_select"></select>
      </div>
  </div>
</div>
  
<p class="has-text-centered subtitle  is-6 has-text-danger" id="hibafelvetel"><span id="felveteluzenet"></span></p>
</form>
</div>


<div id="update-message" title="Adatmódosítás">
  <p>
    <span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
   Sikeresen módosította az adatokat!
  </p>
</div>

<div id="update-form" title="Módosítani a meglévő járatot">
  <form id="updateform">

  <div class="field">
    <label class="label">Járat szám</label>
    <div class="control">
      <input class="input" id="jaratszam-form" type="text" value="" disabled>
    </div>
  </div>

  <div class="field">
  <label class="label">Repülő regiszt. kód</label>
  <div class="control">
      <div class="select is-rounded" id="hova-form">
        <select id="repulo_select"></select>
      </div>
  </div>
</div>

  <div class="field">
    <label class="label">Indulas</label>
    <div class="control">
      <input class="input" id="indulas-form" type="datetime-local" value="">
    </div>
  </div>

  <div class="field">
    <label class="label">Érkezés</label>
    <div class="control">
      <input class="input" id="erkezes-form" type="datetime-local" value="">
    </div>
  </div>

<div class="field">
  <label class="label">Honnan</label>
  <div class="control">
      <div class="select is-rounded" id="honnan-form">
        <select id="honnan_select"></select>
      </div>
  </div>
</div>

<div class="field">
  <label class="label">Hová</label>
  <div class="control">
      <div class="select is-rounded" id="hova-form">
        <select id="hova_select"></select>
      </div>
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
    <h1 class="title">Járatok</h1>
    <button class="button is-dark" style="margin-bottom: 20px" id="adatfelvetel">Járat felvétel</button>
    <div class="control">
  <input class="input" type="text" id="kereses-real-time" placeholder="Keresés járat szám alapján">
</div>
    <div class="b-table">
      <div class="table-wrapper has-mobile-cards">
        <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
          <thead>
          <tr>
            <th>Járat szám</th>
            <th>Rpülő regiszt. kód</th>
            <th>Indulas</th>
            <th>Érkezes</th>
            <th>Honnan</th>
            <th>Hova</th>
            <th>Utasok száma</th>
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
<section class="section">
  <div class="container box">
    <h1 class="title">Járatok 0 fővel</h1>
    <div class="b-table">
      <div class="table-wrapper has-mobile-cards">
        <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
          <thead>
          <tr>
            <th>Járat szám</th>
            <th>Rpülő regiszt. kód</th>
            <th>Indulas</th>
            <th>Érkezes</th>
            <th>Honnan</th>
            <th>Hova</th>
            <th></th>
          </tr>
          </thead>
          <tbody id="nulla">
          
          
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<div id="utasjarat-form" title="Járatnak az utasai">
<div class="select is-rounded" id="utas-form">
        <select id="utas_select"></select>
      </div>
<button class="button is-link" style="margin-bottom: 20px; margin-top:10px;" id="adatutasfelvetel">Utas hozzáadás</button>
<div class="b-table">
      <div class="table-wrapper has-mobile-cards">
        <table class="table is-fullwidth is-striped is-hoverable is-fullwidth">
          <thead>
          <tr>
            <th>Utasok</th>
            <th></th>
          </tr>
          </thead>
          <tbody id="utasai">
          
          
</tbody>
        </table>
      </div>
    </div>
</div>
</body>
</html>