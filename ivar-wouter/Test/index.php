<?php
session_start();
require('../components/dbconn.php');

if($_SESSION['is_admin'] == 0) {
    exit(header("Location: login.php"));
}
error_reporting("all");
?>

<!DOCTYPE html>
<html lang="nl" dir="ltr">
    <head>
        <?php include "../components/header.php"; ?>
        <link href="../components/css/contentGebruikersbeheer.css" rel="stylesheet">
        <link rel="stylesheet" href="../components/css/navbardash.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <meta http-equiv="Cache-control" content="public">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="../components/css/FooterCSS.css">
        <link rel="stylesheet" href="../components/css/index.css">
        <link href="https://fonts.googleapis.com/css?family=IM+Fell+Great+Primer" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <style>
            #AddUserTable{
                display: none;
            }

        </style>
        <script>
            function showAddUser() {
                var x = document.getElementById("AddUserTable");
                if (x.style.display === "block") {
                    x.style.display = "none";
                } else {
                    x.style.display = "block";
                }
            }
        </script>
    </head>
    <body>
        <div class="navbar">
            <?php // include('../components/navbardash.php') ?>
        </div>
        <div class="page-Content">
            <div class="main-title">
                <h1>Gebruikersbeheer</h1>
            </div>
            <div class="content-gebruikersbeheer">
                <table>
                    <tr>
                        <th>Username</th>
                        <th>Mail</th>
                        <th>Rol</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    <tr>
                        <?php
                            require('../components/dbconn.php');
                            $sql = "SELECT * FROM user2";
                            foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
                                $id = $row['id'];
                                $username = $row['username'];
                                $mail = $row['mail'];
                                $admin = $row['admin'];
                                if ($admin == 1){
                                    $admin = "Admin";
                                }
                                else{
                                    $admin = "User";
                                }

                                echo " <tr>";
                                    echo "<td>".$username."</td>";
                                    echo "<td>".$mail."</td>";
                                    echo "<td>".$admin."</td>";
                                    echo "<td><button><a href='https://fresh-dev.academy/ivar-wouter/Test/index.php?Wijzig=".$id."'>Wijzig User</a></button></td>";
                                    echo "<td><button><a href='https://fresh-dev.academy/ivar-wouter/Test/index.php?Pwd=".$id."'>Wijzig Password</a></button></td>";
                                    echo "<td><button><a href='https://fresh-dev.academy/ivar-wouter/Test/index.php?Del=".$id."'>verwijder</a></button></td>";
                                echo "</tr>";
                            }
                            echo "<tr><td><button onclick='showAddUser()'><a>Add User</a></button></td></tr>";
                        ?>
                    </tr>
                </table>

                <table id="AddUserTable">
                    <tr>
                        <td>Username</td>
                        <td>e-mail</td>
                        <td>Rol</td>
                        <td>Password</td>
                        <td></td>
                    </tr>
                    <tr>
                        <form method="post" name="AddUserForm">
                            <td><input type="text" placeholder="Username" name="username"/></td>
                            <td><input type="email" placeholder="e-mail" name="email"/></td>
                            <td>
                                <select placeholder="rol" name="rol">
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </td>
                            <td><input type="password" placeholder="Password" name="password"></td>
                            <td><input type="submit" name="AddUser"></td>
                        </form>
                    </tr>
                </table>

            </div>
            <a href="https://fresh-dev.academy/ivar-wouter/Test/index.php">EDRFTYGHUIJOKKOHUYGTFRDEDRFTGYHUIJJHBGFCDRETYHUIJHBGFR</a>
        </div>
    </body>
</html>
<?php
    if(!empty($_GET['Wijzig'])) {
        echo "
                <table id='ShowWijzigUser'>
                    <tr>
                        <td>Username</td>
                        <td>e-mail</td>
                        <td>Rol</td>
                    </tr>

                    <tr>
                        <form method='post' name='ChangeUserEnd'>";
                                require('../components/dbconn.php');
                                $id = $_GET['Wijzig'];
                                $sql = "SELECT * FROM user2 WHERE id= '$id'";
                                foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row) {
                                    $username = $row['username'];
                                    $mail = $row['mail'];
                                    $admin = $row['admin'];
                                    echo "<td><input type='text' value='".$username."' required></td>";
                                    echo "<td><input type='email' value='".$mail."' required></td>";
                                    echo "<td><select type='text' required><option value='0'>User</option><option value='1'>Admin</option></td>";
                                    echo "<td><input type='submit' name='ChangeUserEnd'></td>";
                                }
                    echo "</form>
                    </tr>

                </table>";
    }
    if (isset($_POST['ChangeUserEnd'])){
        $id = $_GET['Wijzig'];
        $mail = $_POST['mail'];
        $username = $_POST['username'];
        $rol = $_POST['rol'];
        $sql = "UPDATE user2 SET mail = '$mail' WHERE id = '$id'";
        $conn->exec($sql);

    }
    if(!empty($_GET['Pwd'])) {
        header("Location:pwdForget.php");
    }
    if(!empty($_GET['Del'])) {
        $id = $_GET['Del'];
        $sql = "DELETE FROM user2 WHERE id=$id";
        $conn->exec($sql);
    }
    if(!empty($_POST['AddUser'])) {
        $usernameadd = $_POST['username'];
        $emailadd = $_POST['email'];
        $roleadd = $_POST['rol'];
        $password = $_POST['password'];
        $passwordadd = md5($password);

        $sqladduser = "INSERT INTO user2 (username , mail , admin , password) VALUES ('$usernameadd' , '$emailadd' , '$roleadd' , '$passwordadd')";
        $stmt = $conn->prepare($sqladduser);
        $stmt->execute();
        $stmt = null;
    }
?>