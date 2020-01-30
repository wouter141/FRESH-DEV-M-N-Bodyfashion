<?php session_start();?>
<!DOCTYPE html>
<html lang="nl" dir="ltr">
  <head>
      <?php include('components/header.php'); ?>
  </head>
  <body>
    <?php include('./components/Navbar.php') ?>
    <div class="page-Content">
      <!--Alle Personen-->
      <div class="head-title"><h1>Over Ons</h1></div>
      <div class="AllePersonen">
        <div class="Persoon2 Personen">
            <!--Persoon Links-->
          <div class="FotoDiv">
              <?php
                require('./components/dbconn.php');
                $sql = "SELECT image_naam FROM images WHERE id = 4";
                foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
                  $naam_image = "./components/images/";
                  $naam_image .= $row['image_naam'];
                  echo "<img src='#' alt='' class='Foto' style='background-image: url($naam_image)'>";
                }
              ?>
              <div class="Admin_Wijziging_Knop_Image_P1">
              </div>
          </div>
            <div class="Text">
                <h1>Soraya</h1>
                <h4>Verkoopster</h4>
            </div>
        </div>

            <!--Persoon Midden-->
          <div class="Persoon1 Personen">
              <div class="FotoDiv">
                  <?php
                  require('./components/dbconn.php');
                  $sql = "SELECT image_naam FROM images WHERE id = 3";
                  foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
                      $naam_image = "./components/images/";
                      $naam_image .= $row['image_naam'];
                      echo "<img src='#' alt='' class='Foto' style='background-image: url($naam_image)'>";
                  }
                  ?>
                  <div class="Admin_Wijziging_Knop_Image_P2">
                  </div>
              </div>
              <div class="Text">
                  <h1>Marianne</h1>
                  <h4>Eigenaresse</h4>
              </div>
          </div>

            <!--Persoon Rechts-->
        <div class="Persoon3 Personen">
            <div class="FotoDiv">
                <?php
                require('./components/dbconn.php');
                $sql = "SELECT image_naam FROM images WHERE id = 5";
                foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
                    $naam_image = "./components/images/";
                    $naam_image .= $row['image_naam'];
                    echo "<img src='#' alt='' class='Foto' style='background-image: url($naam_image)'>";
                }
                ?>
                <div class="Admin_Wijziging_Knop_Image_P3">
                </div>
            </div>
            <div class="Text">
                <h1>Denise</h1>
                <h4>Verkoopster</h4>
            </div>
        </div>
      </div>
    </div>

    <!--Waar je ons kunt vinden-->
    <div class="WaarKunJeOnsVinden-div">
      <h1 class="OverOns-Uitleg">
        Waar kun je ons vinden?
      </h1>
      <div class="googleMaps">
          <div class="Admin_Wijziging_Knop_Image_P3">
              <?php
                if($_SESSION['is_admin']) {
                    /*Genereer nieuw adres*/
                    /*create oude adres*/
                    try {
                        require('./components/dbconn.php');
                        $stmt = $conn->prepare("SELECT filiaal.adres FROM filiaal");
                        $stmt->execute();
                        $row = $stmt->fetch();
                    }
                    catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }

                    $adresKnop = '<form class="changeAdres" action="#" method="post"><p class="paraForm">Wijzig hier het adres</p><div class="bottomForm"><input type="text" name="adres"><input type="submit" name="submit"></div><div class="losAdres">'.$row["adres"].'</div></form>';
                    echo $adresKnop;
                }
                else {
                    echo"";
                }
                ?>
          </div>
        <?php
        require('./components/dbconn.php');
            try {
                $stmt = $conn->prepare("SELECT filiaal.adres FROM filiaal");
                $stmt->execute();
                $row = $stmt->fetch();

				//$address = 'Peperstraat 20, Purmerend, Nederland';
				$address = $row["adres"];
				echo '<iframe class="Frame" src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $address)) . '&z=14&output=embed"></iframe>';
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        ?>
      </div>
    </div>

    <!--Openingstijden-->
    <h1 class="OverOns-Uitleg">
      Openingstijden
    </h1>
    <div class="Openingstijden">
        <div class="alleDagen">
            <?php
                require('./components/dbconn.php');
                $sql = "SELECT dag FROM openingstijden";
                foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){

                    $dag = $row['dag'];
                    echo "<div class='dag'>".$dag."</div>";
                }
            ?>
        </div>
        <div class="alleTijd">
            <?php
            require('./components/dbconn.php');
            $sql = "SELECT tijd FROM openingstijden";
            foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){

                $tijd = $row['tijd'];
                echo "<div class='tijd'>".$tijd."</div>";
            }
            ?>
        </div>
    </div>
    <?php
        include('./components/Footer.php');
    ?>
  </body>
</html>
<?php
    /*UPDATE adres*/
    if (isset($_POST['submit'])) {
        require('./components/dbconn.php');
        $adres = $_POST["adres"];
        $stmt = $conn->prepare("UPDATE filiaal SET filiaal.adres = '$adres'");
        $stmt->execute();
    }
?>