<?php include('./components/header.php'); ?>
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
          <button type="button" name="button" class="ActiesButtons"><p>Zomer Acties!</p></button>
          <img src="./components/images/index2.jpg" alt="IMAGE INSTERT HERE" class="ImageActies">
          <button type="button" name="button" class="ActiesButtons"><p>Winter Acties!</p></button>
        </div>
        <div class="ActiesOnder">
          <h1>Verloting</h1>
            <button type="button" name="button" class="ActiesButtonsOnder"><p>Kijk of U ook heeft gewonnen!</p></button>
        </div>
      </div>
    </div>
    <?php include('./components/Footer.php'); ?>
  </body>
</html>
