<!DOCTYPE html>
<html lang="nl" dir="ltr">
  <head>
    <?php include('components/header.php'); ?>
    <?php session_start();?>
  </head>
  <body>

    <div class="page-Content">
      <?php include('./components/Navbar.php') ?>
      <div class="head-title">
        <h1>Acties</h1>
      </div>
      <div class="Main-Paragraaf">
        <div class="ActiesTop">
            <button type="button" name="button" class="ActiesButtons" onClick="window.location='#'">Zomer Acties!</button>
              <div class="ImageActies"><!--<img src="./components/images/acties.jpg" alt='BROKE'>--></div>
            <button type="button" name="button" class="ActiesButtons" onClick="window.location='#'">Winter Acties!</button>
        </div>
        <div class="ActiesOnder">
          <h1>Verloting</h1>
            <button type="button" name="button" class="ActiesButtonsOnder" onClick="window.location='Lijst.php'">Kijk of u ook heeft gewonnen!</button>
        </div>
      </div>
    </div>
    <?php include('./components/Footer.php'); ?>
  </body>
</html>
