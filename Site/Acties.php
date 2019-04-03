<?php include('components/Header.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title></title>
  </head>
  <body>
    <div class="page-Content">
      <?php include('./components/Navbar.php') ?>
      <div class="head-title">
        <h1>Acties</h1>
      </div>
      <div class="Main-Paragraaf">
        <div class="ActiesTop">
          <button type="button" name="button" class="ActiesButtons"><a href="#"><p>Zomer Acties!</p></a></button>
          <div class="ImageActies"><img src="./components/images/acties.png"></div>
          <button type="button" name="button" class="ActiesButtons"><a href="#"><p>Winter Acties!</p></a></button>
        </div>
        <div class="ActiesOnder">
          <h1>Verloting</h1>
            <button type="button" name="button" class="ActiesButtonsOnder"><a href="Lijst.php"><p>Kijk of u ook heeft gewonnen!</p></a></button>
        </div>
      </div>
    </div>
    <?php include('./components/Footer.php'); ?>
  </body>
</html>
