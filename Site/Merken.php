<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Merken</title>
    <?php include('./components/AllInclude.php'); ?>
    <script src="components/javascript/merken.js"></script>
  </head>
  <body>
    <?php include('./components/Navbar.php') ?>

    <div class="page-Content">
    <div class="MerkenPage">
      <h1 class="Main-Title">Merken</h1>
      <h2 class="Main-Paragraaf">Of u nu op zoek bent naar Lingerie, badmode of nachtmode, M&N Bodyfashion heeft het allemaal voor zowel dames als heren!
          De volgende merken kunt u bij M&N Bodyfashion vinden: </h2>
          <hr>
      <div class="container">
    <div class="selected-item">
      <p>Je Hebt Geselecteerd: <span id="spanHeading">Leeg</span></p>
    </div>

    <div class="dropdown">
      <span class="selLabel">Selecteer Kledingtype</span>
      <ul class="dropdown-list">
        <li data-value="1" onclick="myFunction()">
          <span id="Lingerie">Lingerie</span>
        </li>
        <li data-value="2">
          <span>Badmode</span>
        </li>
        <li data-value="3">
          <span>Nachtmode</span>
        </li>
        <li data-value="4">
          <span>Accessoires</span>
        </li>
        <li data-value="5">
          <span>Shapewear</span>
        </li>
      </ul>
    </div>
    <div class="dropdown-content">
      <div id="content-Lingerie">
        aaa
      </div>
      <div class="kleding content-Badmode">

      </div>
      <div class="kleding content-Accessoires">

      </div>
      <div class="kleding content-Nachtmode">

      </div>
      <div class="kleding content-Shapewear">

      </div>
    </div>
    </div>
  </div>
  </div>
  </body>
  <?php include('./components/Footer.php'); ?>
</html>
