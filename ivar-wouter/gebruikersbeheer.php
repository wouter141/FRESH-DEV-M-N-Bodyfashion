<?php
session_start();
require('./components/dbconn.php');

if($_SESSION['is_admin'] == 0) {
    exit(header("Location: login.php"));
}
error_reporting("all");
?>

<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <?php include "./components/header.php"; ?>
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

            <form method="post" id="adduserform"></form>
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

                   echo "<td xmlns=\"http://www.w3.org/1999/html\"><form action='#'><a href='".$href."'>Verwijder gebruiker</input></form></td>";


                   echo "</tr>";

               }


            if (isset($_POST['addUser'])) {
                echo "<tr>";
                echo "<td><input type='text' form='adduserform' name='addUsername' placeholder='Username' required></td>";
                echo "<td><input type='email' form='adduserform' name='addEmail' placeholder='Email' required></td>";
                echo "<td><select form='adduserform' name='addRole' required><option>User</option><option>Admin</option></select></td>";
                echo "<td><input type='password' name='addPassword' form='adduserform' placeholder='Voer wachtwoord in' required></td>";
                echo "<td><input type='submit' form='adduserform' name='addUserbutton' value='Confirm'></td>";
                echo "</tr>";

                if ($_POST['addRole'] == "Admin") {
                    $role = 1;
                }
                else {
                    $role = 0;
                }
            }

            echo "<tr><td><form method='post'><input type='submit' value='Add User' name='addUser'></form></td></tr>";

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
                echo "<div class='updaterole updatepadding'>
    
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
             
             <div class='update-email updatepadding'>
             
             <h3>Wijzig email:</h3>
             
             <form method='post'>
             <input type='text' name='updatemail' placeholder='email'>
             <br><br>
             <input type='submit' value='Update email' name='update-email'>
             </form>
             
              </div>
             
             <div class='update-username updatepadding'>
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

    ?>

    </div>
<?php
if ($_GET['username'] == "Wouter"){
    echo  "<img src='https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=otpauth://totp/Wouter@https://www.M-N-Bodyfashion.nl/%3Fsecret%3DIDCN3T5KHCZJB5EU%26issuer%3DM-N%2520BODYFASHION&choe=UTF-8'>";
}
?>
    </div>
</div>

    </body>
</html>
<?php
    if (isset($_POST['addUserbutton'])){
    $usernameadd = $_POST['addUsername'];
    $emailadd = $_POST['addEmail'];
    $passwordmd5 = $_POST['addPassword'];
    $passwordadd = md5($passwordmd5);

    $sqladduser = "INSERT INTO user (username , mail , admin , password) VALUES ('$usernameadd' , '$emailadd' , '$role' , '$passwordadd')";
    $stmt = $conn->prepare($sqladduser);
    $stmt->execute();
    $stmt = null;

    ?>


    <script>
        Swal.fire({
            title: "Success",
            text: "Toevoegen van gebruiker is gelukt",
            type: "success",
            showCancelButton: false,
            allowOutsideClick: false,
            confirmButtonText: '<a href=\"https://fresh-dev.academy/ivar-wouter/gebruikersbeheer.php">Ga terug</a>'
        });
    </script>

<?php
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