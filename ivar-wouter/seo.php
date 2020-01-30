<?php
session_start();
require('./components/dbconn.php');

if(!isset($_SESSION['is_admin'])) {
    exit(header("Location: login.php"));
}
error_reporting("all");
?>
<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <?php include "./components/header.php";?>
</head>
<body>
<div class="navbar">
 <?php include('./components/navbardash.php') ?>
</div>
<div class="page-Content">
    <div class="main-title">
        <h1>Search Engine Optimization (SEO)</h1>
    </div>
    <div class="tooltip"><i class="material-icons md-36">help</i>
        <span class="tooltip-text">
        Zoekmachineoptimalisatie of in het engels: Search Engine Optimization is het optimaliseren van de website voor het verkrijgen van een hogere ranking in zoekmachines zoals Google
        zodat de site beter is te vinden.
        <br><br>
        Zoekmachines hebben bepaalde eisen gesteld waarmee de ranking word bepaald, zo moet er op de site gebruik worden gemaakt van headers (H1, H2 etc.) en moet er
        metadata (informatie die de zoekmachine laat weten waarover de site gaat en door wie hij is gemaakt (data over data eigenlijk) aanwezig zijn.)
        <br><br>
        Op deze pagina kunt u de metadata aanpassen, hieronder valt de description (beschrijving van de inhoud van de pagina) en de keywords (trefwoorden, waarop kunnen gebruikers
        zoeken om deze pagina te vinden).
        </span>
    </div>
    <div class="metadata">
        <div class="header-metadata">
        <h2>Metadata</h2>
     </div>
        <div class="metaselect">
            <h3>Kies pagina waar u de metadata van wilt aanpassen:</h3>
        <form method="post" id="metapage">
            <select name="selectpage">
                <option disabled selected>Kies pagina</option>
                <option>Index</option>
                <option>Over Ons</option>
                <option>Merken</option>
                <option>Spaarsysteem</option>
                <option>Acties</option>
                <option>Contact</option>
            </select><br>
            <input type="submit" value="Pas aan" name="metaselect">
        </form>
        </div>
    </div>
    <?php

    $optionvalue = $_POST['selectpage'];

         if ($optionvalue == ""){
            echo "";
        } else {

     $metadescriptionselect = array();
     $metakeywordsselect = array();

    $sql1 = "SELECT * from metadata WHERE page = '$optionvalue'";
    foreach($conn->query($sql1, PDO::FETCH_ASSOC) as $row) {
        $metadescriptionselect = $row['metadescription'];
        $metakeywordsselect = $row['metakeywords'];
    }

        echo "<div class='metaselectedpage'>
                    <h3>Pas hier de metadata aan van " . $optionvalue . " : </h3>
                     <form method='post' id='metadataform'>
                     <div class='flex-meta'>
                     <div class='metaselectedpagedescription'>
                     <h4>Pas hier de meta description aan:</h4>
                    <textarea rows='2' cols='30' name='metaselectedpagedescription'>$metadescriptionselect</textarea>
                    </div>
                    <div class='metaselectedpagekeywords'>
                    <h4>Pas hier de meta keywords aan:</h4>
                    <textarea rows='2' cols='30' name='metaselectedpagekeywords'>$metakeywordsselect</textarea>
                    <input type='hidden' name='optionvalue' value='$optionvalue'>
                    </div>
                    </div>
                    <input type='submit' name='submitmetadataform' value='Pas aan'>
                    </form>
        
    </div>";
    }

    if (isset($_POST['submitmetadataform'])){
        $metadescription = $_POST['metaselectedpagedescription'];
        $metakeywords = $_POST['metaselectedpagekeywords'];
        $page = $_POST['optionvalue'];



        $sql = "UPDATE metadata SET metadescription = '$metadescription', metakeywords ='$metakeywords' WHERE page = '$page'";
        $stmt= $conn->prepare($sql);
        $stmt->execute();
        $stmt = null;
        ?>
        <script>
        Swal.fire({
                      title: "Success",
                      text: "Updaten van metadata is gelukt",
                      type: "success",
                      showCancelButton: false,
                      allowOutsideClick: false,
                      confirmButtonText: '<a href=\"https://fresh-dev.academy/ivar-wouter/seo">Ga terug</a>'
                     });
        </script>
<?php
    }
    ?>

    </div>

</body>
</html>
