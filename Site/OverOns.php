<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Over Ons</title>
    <?php include('./components/header.php'); ?>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title></title>
  </head>
  <body>
    <?php include('./components/Navbar.php') ?>
    <div class="page-Content">
      <h1 class="OverOns-Uitleg">
        Over Ons
      </h1>
      <div class="AllePersonen">
        <div class="Persoon2 Personen">
          <div class="FotoDiv">
            <div class="Foto" style="background-image: url('./components/images/persoon2.jpg');"></div>
          </div>
          <div class="Space-Between"></div>
          <div class="Text">
            <h1>Soraya</h1>
            Verkoopster
          </div>
        </div>
        <div class="Persoon1 Personen">
          <div class="FotoDiv">
            <div class="Foto" style="background-image: url('./components/images/persoon1.jpg');"></div>
          </div>
          <div class="Text">
            <h1>Marianne</h1>
            Eigenaresse
          </div>
        </div>
        <div class="Persoon3 Personen">
          <div class="FotoDiv">
            <div class="Foto" style="background-image: url('./components/images/persoon3.jpg');"></div>
          </div>
          <div class="Space-Between"></div>
          <div class="Text">
            <h1>Denise</h1>
            Verkoopster
          </div>
        </div>
      </div>

    </div>
    <h1 class="OverOns-Uitleg">
      Waar kun je ons vinden?
    </h1>
    <div class="googleMaps">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d4856.52802576067!2d4.946539!3d52.510561!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6072a76e37671%3A0x5cf52f4f88586d4c!2sPeperstraat+20%2C+1441+BJ+Purmerend!5e0!3m2!1sen!2snl!4v1552300217615" width="100%" height="400" frameborder="0" allowfullscreen></iframe>
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
