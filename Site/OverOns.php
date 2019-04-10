<!DOCTYPE html>
<html lang="nl" dir="ltr">
  <head>
    <title>Over Ons</title>
    <?php include('components/Header.php'); ?>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title></title>
  </head>
  <body>
    <?php include('./components/Navbar.php') ?>
    <div class="page-Content">
      <div class="head-title"><h1>Over Ons</h1></div>
      <div class="AllePersonen">
        <div class="Persoon2 Personen">
          <div class="FotoDiv">
            <div class="Foto" style="background-image: url('./components/images/persoon2.jpg');"></div>
          </div>
          <div class="Text">
            <h1>Soraya</h1>
            <h4>Verkoopster</h4>
          </div>
        </div>
        <div class="Persoon1 Personen">
          <div class="FotoDiv">
            <div class="Foto" style="background-image: url('./components/images/persoon1.jpg');"></div>
          </div>
          <div class="Text">
            <h1>Marianne</h1>
            <h4>Eigenaresse</h4>
          </div>
        </div>
        <div class="Persoon3 Personen">
          <div class="FotoDiv">
            <div class="Foto" style="background-image: url('./components/images/persoon3.jpg');"></div>
          </div>
          <div class="Text">
            <h1>Denise</h1>
            <h4>Verkoopster</h4>
          </div>
        </div>
      </div>

    </div>
    <div class="WaarKunJeOnsVinden-div">
      <h1 class="OverOns-Uitleg">
        Waar kun je ons vinden?
      </h1>
      <div class="googleMaps">
        <?php
          $address = 'Peperstraat 20, Purmerend';
          echo '<iframe frameborder="0" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $address)) . '&z=14&output=embed" width="100%" height="400" frameborder="0" allowfullscreen></iframe>';
        ?>
    </div>

    <h1 class="OverOns-Uitleg">
      Openingstijden
    </h1>
    <div class="Openingstijden">
      <div class="Dag">
        Maandag:    <br>
        Dinsdag:    <br>
        Woensdag:   <br>
        Donderdag:  <br>
        Vrijdag:    <br>
        Zaterdag:   <br>
        Zondag:
      </div>
      <div class="Tijd">
        Gesloten          <br>
        09.30 - 17.30 uur <br>
        09.30 - 17.30 uur <br>
        09.30 - 17.30 uur <br>
        09.30 - 17.30 uur <br>
        09.30 - 17.30 uur <br>
        09.30 - 17.30 uur
      </div>
    </div>
    <?php include('./components/Footer.php'); ?>
  </body>
</html>
