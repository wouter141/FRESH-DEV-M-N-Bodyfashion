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
              <div class="dropdown-contentdames" id="DropDames">
                <a onclick="divVisibility('dropdowncontent-dames-lingerie');">Lingerie</a>
                <a onclick="divVisibility('dropdowncontent-dames-badmode');">Badmode</a>
                <a onclick="divVisibility('dropdowncontent-dames-nachtmode');">Nachtmode</a>
                <a onclick="divVisibility('dropdowncontent-dames-accessoires');">Accessoires</a>
                <a onclick="divVisibility('dropdowncontent-dames-shapewear');">Shapewear</a>
              </div>
            </div>
          </div>

          <div class="dropdowncontent" id="dropdowncontent-heren-ondermode">
            <h2>Heren ondermode</h2><br>
            Sloggi <br>
            Mey <br>
            Hom <br>
            Calvin Klein <br>
            Björn Borg <br>
          </div>
          <div class="dropdowncontent" id="dropdowncontent-heren-nachtmode">
            <h2>Heren nachtmode</h2><br>
            Taubert <br>
            Mey <br>
            Hom <br>
            Calvin Klein <br>
            Björn Borg <br>
          </div>
          <div class="dropdowncontent" id="dropdowncontent-heren-badmode">
            <h2>Heren badmode</h2><br>
            Brunotti <br>
            Mey <br>
            Hom <br>
            Calvin Klein <br>
            Björn Borg <br>
          </div>
          <div class="dropdowncontent" id="dropdowncontent-dames-lingerie">
            <h2>Dames lingerie</h2><br>
            Anita<br>
            Antigel<br>
            Björn Borg<br>
            B.tempt'd<br>
            Calvin Klein<br>
            Chantelle<br>
            Empreinte<br>
            Fantasie<br>
            Freya<br>
            Implicite<br>
            L'Aventure<br>
            Maidenform<br>
            Marc & Andre<br>
            Marie-Jo<br>
            Mey<br>
            PrimaDonna<br>
            Rosa Faia<br>
            Shockabsorber<br>
            Simone Perele<br>
            Sloggi<br>
            Triumph<br>
            Twist<br>
            Wacoal<br>
            Wonderbra<br>
          </div>
          <div class="dropdowncontent" id="dropdowncontent-dames-badmode">
            <h2>Dames badmode</h2><br>
            Anita<br>
            Antigel<br>
            Baku<br>
            Beachlife<br>
            Cyell<br>
            Luli Fama<br>
            Marc & Andre<br>
            Marie-Jo<br>
            Mila<br>
            Miracle Suit<br>
            Opera<br>
            Rosa Faia<br>
            Seafolly<br>
            Sunflair<br>
          </div>
          <div class="dropdowncontent" id="dropdowncontent-dames-nachtmode">
            <h2>Dames nachtmode</h2><br>
            Calvin Klein<br>
            Cyell<br>
            Jensen<br>
            Mey<br>
            SNURK<br>
            Taubert<br>
          </div>
          <div class="dropdowncontent" id="dropdowncontent-dames-accessoires">
            <h2>Dames accessoires</h2><br>
            Happy Socks<br>
            Ipanema<br>
            La Decollette<br>
            Magic Products<br>
            Oroblu<br>
            Soak Wash<br>
            Wolford<br>
          </div>
          <div class="dropdowncontent" id="dropdowncontent-dames-shapewear">
            <h2>Dames shapewear</h2><br>
            Magic Products<br>
            Maidenform<br>
            Wolford<br>
          </div>
    </div>
  </div>
  </body>
  <?php include('./components/Footer.php'); ?>
</html>
