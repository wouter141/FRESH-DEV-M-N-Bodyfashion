<!DOCTYPE html>
<html lang="nl" dir="ltr">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>M&N Bodyfashion</title>
    <?php include('components/header.php'); ?>
    <script src="components/javascript/index.js"></script>
  </head>
  <body>
    <div class="banner">
      <?php
        require('./components/dbconn.php');
        $sql = "SELECT image_naam FROM images";
            foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
              $naam_image = "./components/images/";
              $naam_image .= $row['image_naam'];
              echo "<img class='banner' src='".$naam_image."'>";
            }
      ?>
      <div class="Admin_Wijziging_Knop_Image">
        <?php
          if($_SESSION['is_admin']) {
            echo"<button type='button' name='button'>wijzig image</button>";
          }
          else {
            echo"Hi";
          }
        ?>
      </div>

    </div>
  <?php include('./components/Navbar.php') ?>
    <div class="page-Content">
      <div class="body-text">
        <div class="wrapper">
          <h1 class="Main-Title">Welkom bij M&N Bodyfashion</h1>
          <h2 class="Main-Paragraaf">
            Luxe lingerie, modieuze badmode, comfortabele homewear en stoer herenondergoed.
            Dat is M&N Bodyfashion: <br><br>

            Hét adres waar we geloven in een eerlijk, deskundig en persoonlijk advies.

            De winkel heeft een enorm assortiment dameslingerie van de bekende merken, badmode en homewear.</h2>
          </div>
        </div>
      </div>
    <?php include('./components/Footer.php'); ?>
  </body>
</html>
