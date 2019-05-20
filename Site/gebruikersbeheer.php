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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./components/css/navbardash.css">
    <link href="./components/css/contentGebruikersbeheer.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta charset="utf-8">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
</head>
<body>

<div class="navbar">
    <?php include('./components/navbardash.php') ?>
</div>
<div class="page-Content">
    <div class="main-title">
        <h1>Gebruikersbeheer</h1>
    </div>

        <div class="content-gebruikersbeheer">




        <table class="gebruikersbeheer">
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                </tr>


            <?php


            require('./components/dbconn.php');
            $sql = "SELECT * from user";
               foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
                $username = $row['username'];
                $mail = $row['mail'];
                $admin = $row['admin'];
                $id = $row['id'];
                echo " <tr>";
                echo "<td>".$username."</td>";
                echo "<td>".$mail."</td>";

                if ($admin == 1){
                    echo "<td>"."Admin"."</td>";
                } else {
                    echo "<td>"."User"."</td>";
                }
                   $href = "gebruikersbeheer.php?id=".$row['id'];
                   $hrefrole = "gebruikersbeheer.php?username=".$row['username'];
                   echo "<td><a href=".$hrefrole."><button>Verander gebruiker</button></a></td>";

                   echo "<td><a href=".$href."><button>Verwijder gebruiker</button></a></td>";


               }

               $id = $_GET['id'];
               if ($id){

                   $sql = "DELETE FROM user WHERE id=$id";

                   $conn->exec($sql);
                ?>
                   <script>
                      Swal.fire({
                      title: "Success",
                      text: "Verwijderen is gelukt",
                      type: "success",
                      showCancelButton: false,
                      allowOutsideClick: false,
                      confirmButtonText: '<a href=\"https://fresh-dev.academy/ivar-wouter/gebruikersbeheer.php">Ga terug</a>'
                     });
                    </script>
            <?php
               }
            ?>

        </table>


        </div>
             
    <?php
    $usernamerole = $_GET['username'];

    $usercheck = "SELECT * FROM user WHERE username = '$usernamerole'";
    $query_res =  $conn->query($usercheck);

    $count= count($query_res->fetchAll());
    //checkt of de user in de GET  bestaat
    if ($count > 0) {
        //checkt of er iets in de ?username= staat
        if ($usernamerole) {
            echo "<div class='update'>";
            
            echo "<h2>Wijzig gebruiker: " . $usernamerole . " </h2>";

            echo "<div class='update-content'>";
            echo "<div class='updaterole'>

        <h3>Wijzig role:</h3>
    
          <form method='post'>
           
           <select name='updateuser'>
           <option>User</option>
           <option>Admin</option>
           </select>
           <br><br>
           <input type='submit' value='Update role' name='update'>
           
          </form>

         </div>
         
         <div class='update-email'>
         
         <h3>Wijzig email:</h3>
         
         <form method='post'>
         <input type='text' name='updatemail' placeholder='email'>
         <br><br>
         <input type='submit' value='Update email' name='update-email'>
         </form>
         
          </div>
         
         <div class='update-username'>
         <h3>Wijzig naam:</h3>
         <form method='post'>
         
         <input type='text' name='updateusername' placeholder='username' '>
          <br><br>
         <input type='submit' value='Update naam' name='update-naam'>
         
         
         
        </form>    
         
        </div>
                    
         
         
         
         ";
        }
    }

    if (isset($_POST['updateuser'])){

        $updateuser = $_POST['updateuser'];

        if ($updateuser == 'Admin'){
            $updatevalue = 1;
        } else {
            $updatevalue = 0;
        }

        $updatesql = "UPDATE user SET admin = '$updatevalue' WHERE username = '$usernamerole'";
        $stmt = $conn->prepare($updatesql);
        $stmt->execute();
        $stmt = null;

         ?>
        <script>
            Swal.fire({
                title: "Success",
                text: "Aanpassen van gebruiker is succesvol",
                type: "success",
                showCancelButton: false,
                allowOutsideClick: false,
                confirmButtonText: '<a href=\"https://fresh-dev.academy/ivar-wouter/gebruikersbeheer.php">Ga terug</a>'
            });
        </script>
    <?php
    }

    if (isset($_POST['updateusername'])){
        $updateusername = $_POST['updateusername'];

        $updateusernamesql = "UPDATE user SET username = '$updateusername' WHERE username = '$usernamerole'";
        $stmt = $conn->prepare($updateusernamesql);
        $stmt->execute();
        $stmt = null;

        ?>
        <script>
            Swal.fire({
                title: "Success",
                text: "Aanpassen van gebruiker is gelukt",
                type: "success",
                showCancelButton: false,
                allowOutsideClick: false,
                confirmButtonText: '<a href=\"https://fresh-dev.academy/ivar-wouter/gebruikersbeheer.php">Ga terug</a>'
            });
        </script>
    <?php
    }
    if (isset($_POST['updatemail'])){
        $updatemail = $_POST['updatemail'];

        $updatemailsql = "UPDATE user SET mail = '$updatemail' WHERE username = '$usernamerole'";
        $stmt = $conn->prepare($updatemailsql);
        $stmt->execute();
        $stmt = null;

        ?>
        <script>
            Swal.fire({
                title: "Success",
                text: "Aanpassen van gebruiker is gelukt",
                type: "success",
                showCancelButton: false,
                allowOutsideClick: false,
                confirmButtonText: '<a href=\"https://fresh-dev.academy/ivar-wouter/gebruikersbeheer.php">Ga terug</a>'
            });
        </script>
    <?php
    }
       ?>

    </div>
    </div>
</div>

    </body>
</html>
