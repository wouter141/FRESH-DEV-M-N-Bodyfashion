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
    <?php
    include("./components/header.php");
    ?>

</head>
<body>

<div class="navbar">
    <?php include('./components/navbardash.php') ?>
</div>
<div class="page-Content">
    <div class="merkenTitle">
        <h1>Wijzig merken</h1>
    </div>
    <div class="HerenEnDames">
        <div class="Heren">
            <table class="MerkHerenTable">
                <tr class="TitleTable"><td>Heren</td></tr>
                <?php
                require('./components/dbconn.php');
                $sql = "SELECT * from merken WHERE genre = 'heren' ORDER BY class";
                foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
                    $id = $row['id'];
                    $genre = $row['genre'];
                    $class = $row['class'];
                    $naam = $row['naam'];

                    if ($class != ""){
                        echo "<tr class='MerkenRow'><td>".$class."</td>";
                        if ($naam){
                            $href = "merkenDash.php?id=".$row['id'];
                            echo "<td class='Naam'>".$naam."</td>";
                            echo "<td class='buttonMerkDash'><a href='".$href."'><button class='verwijderBtn'>Verwijder</button></a></td>";
                            }
                        }

                    }

                            $id = $_GET['id'];
                            if($id) {
                                $sql = "DELETE FROM merken WHERE id=$id";
                                $conn->exec($sql);
                                ?>
                                <script>
                                    Swal.fire({
                                        title: "Success!",
                                        text: "Verwijderen is gelukt",
                                        type: "success",
                                        showCancelButton: false,
                                        allowOutsideClick: false,
                                        confirmButtonText: '<a href=\"https://fresh-dev.academy/ivar-wouter/merkenDash">Ga terug</a>',
                                    }).then(function () {
                                       window.location = "https://fresh-dev.academy/ivar-wouter/merkenDash";
                                    });

                                </script>
                                <?php
                            }

                echo "<tr><td><form method='post'><input type='submit' name='addHeren' value='ADD' class='addBtn'></form></td></tr>";

                if (isset($_POST['addHeren'])){

                    $form = "<form method='post'><input type='text' name='Klasse' placeholder='Klasse' required/><input type='text' name='merkNaam' placeholder='Merknaam' required/><input type='submit' name='addFinalH' value='Add'></form>";
                    echo $form;
                }
                if (isset($_POST['addFinalH'])){
                        require('./components/dbconn.php');
                        $klasse = $_POST['Klasse'];
                        $merkNaam = $_POST['merkNaam'];

                        $sql = "INSERT INTO merken (genre, class, naam) VALUES ('heren', '$klasse', '$merkNaam')";
                        $stmt= $conn->prepare($sql);
                        $stmt->execute();
                        ?>
                        <script>
                            Swal.fire({
                                title: "Success!",
                                text: "Toevoeging is gelukt",
                                type: "success",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonText: '<a href=\"https://fresh-dev.academy/ivar-wouter/merkenDash">Ga terug</a>',
                            }).then(function () {
                                window.location = "https://fresh-dev.academy/ivar-wouter/merkenDash";
                                });
                        </script>
                <?php
                }
              ?>

            </table>
        </div>

        <div class="Dames">
            <table class="MerkDamesTable">
                <tr class="TitleTable"><td>Dames</td></tr>
                <?php
                require('./components/dbconn.php');
                $sql = "SELECT * from merken WHERE genre = 'dames' ORDER BY class";
                foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
                    $id = $row['id'];
                    $genre = $row['genre'];
                    $class = $row['class'];
                    $naam = $row['naam'];

                    if ($class != ""){
                        echo "<tr class='MerkenRow'><td>".$class."</td>";
                        if ($naam){
                            $href = "merkenDash.php?id=".$row['id'];
                            echo "<td class='Naam'>".$naam."</td>";
                            echo "<td class='buttonMerkDash'><a href='".$href."'><button class='verwijderBtn'>Verwijder</button></a></td>";
                        }
                    }

                }

                $id = $_GET['id'];
                if($id) {
                    $sql = "DELETE FROM merken WHERE id=$id";
                    $conn->exec($sql);
                    ?>
                    <script>
                        Swal.fire({
                            title: "Success!",
                            text: "Verwijderen is gelukt",
                            type: "success",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonText: '<a href=\"https://fresh-dev.academy/ivar-wouter/merkenDash">Ga terug</a>',
                        }).then(function () {
                            window.location = "https://fresh-dev.academy/ivar-wouter/merkenDash";
                        });

                    </script>
                    <?php
                }

                echo "<tr><td><form method='post'><input type='submit' name='addDames' value='ADD' class='addBtn'></form></td></tr>";

                if (isset($_POST['addDames'])){

                    $form = "<form method='post'><input type='text' name='Klasse' placeholder='Klasse' required/><input type='text' name='merkNaam' placeholder='Merknaam' required/><input type='submit' name='addFinalD' value='Add'></form>";
                    echo $form;
                }
                if (isset($_POST['addFinalD'])){
                    require('./components/dbconn.php');
                    $klasse = $_POST['Klasse'];
                    $merkNaam = $_POST['merkNaam'];

                    $sql = "INSERT INTO merken (genre, class, naam) VALUES ('dames', '$klasse', '$merkNaam')";
                    $stmt= $conn->prepare($sql);
                    $stmt->execute();
                    ?>
                    <script>
                        Swal.fire({
                            title: "Success!",
                            text: "Toevoeging is gelukt",
                            type: "success",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonText: '<a href=\"https://fresh-dev.academy/ivar-wouter/merkenDash">Ga terug</a>',
                        }).then(function () {
                            window.location = "https://fresh-dev.academy/ivar-wouter/merkenDash";
                        });
                    </script>
                    <?php
                }
                ?>

            </table>
        </div>
    </div>
</body>
</html>
