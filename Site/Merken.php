<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Merken</title>
    <script src="components/javascript/merken.js"></script>
    <?php include('./components/header.php'); ?>
  </head>
  <body>
    <?php include('./components/Navbar.php') ?>

    <div class="page-Content">
    <div class="MerkenPage">
      <h1 class="Main-Title">Merken</h1>
      <h2 class="Main-Paragraaf">Of u nu op zoek bent naar Lingerie, badmode of nachtmode, M&N Bodyfashion heeft het allemaal voor zowel dames als heren!
          De volgende merken kunt u bij M&N Bodyfashion vinden: </h2>
          <hr>
          <div class="dropdown">
            <button class="dropbtn">Heren</button>
            <div class="dropdown-content">
              <a onclick="showOndermodeHeren()">Ondermode</a>
              <a href="">Nachtmode</a>
              <a href="">Badmode</a>
            </div>
          </div>
          <div class="dropdowndames">
            <button class="dropbtndames">Dames</button>
            <div class="dropdown-contentdames">
              <a href="">Lingerie</a>
              <a href="">Badmode</a>
              <a href="">Nachtmode</a>
              <a href="">Accessoires</a>
              <a href="">Shapewear</a>
            </div>
          </div>
          <div id="dropdowncontent-heren-ondermode">
            Ondermode heren
          </div>
          <div id="dropdowncontent-heren-nachtmode">
            Ondermode heren
          </div>
    </div>
  </div>
  </body>
  <?php include('./components/Footer.php'); ?>
</html>
