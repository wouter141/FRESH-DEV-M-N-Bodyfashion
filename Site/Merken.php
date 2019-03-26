<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Merken</title>
    <script src="components/javascript/merken.js"></script>
    <?php include('./components/header.php'); ?>
  </head>
  <body>
    <?php include('./components/Navbar.php') ?>

    <div class="page-Content">
    <div class="MerkenPage">
      <h1 class="head-title">Merken</h1>
      <h2 class="Main-Paragraaf">Of u nu op zoek bent naar Lingerie, badmode of nachtmode, M&N Bodyfashion heeft het allemaal voor zowel dames als heren!
          De volgende merken kunt u bij M&N Bodyfashion vinden: </h2>
          <hr>
          <div class="dropdownAll">

            <div class="dropdown">
              <button class="dropbtn">Heren</button>
              <div class="dropdown-content">
                <a onclick="divVisibility('dropdowncontent-heren-ondermode');">Ondermode</a>
                <a onclick="divVisibility('dropdowncontent-heren-nachtmode');">Nachtmode</a>
                <a onclick="divVisibility('dropdowncontent-heren-badmode');">Badmode</a>
              </div>
            </div>
            <div class="dropdowndames">
              <button class="dropbtndames">Dames</button>
              <div class="dropdown-contentdames">
                <a onclick="divVisibility('dropdowncontent-dames-lingerie');">Lingerie</a>
                <a onclick="divVisibility('dropdowncontent-dames-badmode');">Badmode</a>
                <a onclick="divVisibility('dropdowncontent-dames-nachtmode');">Nachtmode</a>
                <a onclick="divVisibility('dropdowncontent-dames-accessoires');">Accessoires</a>
                <a onclick="divVisibility('dropdowncontent-dames-shapewear');">Shapewear</a>
              </div>
            </div>
          </div>
          <div id="dropdowncontent-heren-ondermode">
            Sloggi <br>
            Mey <br>
            Hom <br>
            Calvin Klein <br>
            Björn Borg <br>
          </div>
          <div id="dropdowncontent-heren-nachtmode">
            Taubert <br>
            Mey <br>
            Hom <br>
            Calvin Klein <br>
            Björn Borg <br>
          </div>
          <div id="dropdowncontent-heren-badmode">
            Brunotti <br>
            Mey <br>
            Hom <br>
            Calvin Klein <br>
            Björn Borg <br>
          </div>
          <div id="dropdowncontent-dames-lingerie">
            Lingerie dames
          </div>
          <div id="dropdowncontent-dames-badmode">
            Badmode dames
          </div>
          <div id="dropdowncontent-dames-nachtmode">
            Nachtmode dames
          </div>
          <div id="dropdowncontent-dames-accessoires">
            Accessoires dames
          </div>
          <div id="dropdowncontent-dames-shapewear">
            Shapewear dames
          </div>
    </div>
  </div>
  </body>
  <?php include('./components/Footer.php'); ?>
</html>
