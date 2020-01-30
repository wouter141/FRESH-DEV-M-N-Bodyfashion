<?php
session_start();
require('./components/dbconn.php');

if(!isset($_SESSION['is_admin'])) {
    exit(header("Location: login.php"));
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
        <h1>Log</h1>
    </div>
    <table class="logTable">
        <tr>
            <th>ip</th>
            <th style="min-width: 150px;">timestamp</th>
            <th>e-mail adres</th>
            <th>Browser</th>
            <th>Failed?</th>
        </tr>


        <?php


        require('./components/dbconn.php');
        $sql = "SELECT log.id , log.ip, log.timestamp, log.mail, log.failed_login, log.browser FROM log ORDER BY id DESC LIMIT 20";
        foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row){
            $ip = $row['ip'];
            $timestamp = $row['timestamp'];
            $mail = $row["mail"];
            $failed_login = $row['failed_login'];
            $browser = $row['browser'];
            if ($failed_login == "Ja"){
                echo " <tr class='failed' style='background-color: red'>";
                    echo "<td>".$ip."</td>";
                    echo "<td>".$timestamp."</td>";
                    echo "<td>".$mail."</td>";
                    echo "<td>".$browser."</td>";
                    echo "<td>".$failed_login."</td>";
                echo"</tr>";
            }
            else{
                echo " <tr class='success'>";
                    echo "<td>".$ip."</td>";
                    echo "<td>".$timestamp."</td>";
                    echo "<td>".$mail."</td>";
                    echo "<td>".$browser."</td>";
                    echo "<td>".$failed_login."</td>";
                echo"</tr>";
            }

        }

        //auto reload
        ?>
        <script type='text/javascript'>
            var table = $('html');

            // refresh every 5 seconds
            var refresher = setInterval(function(){
                table.load("#");
            }, 10000);

            setTimeout(function() {
                clearInterval(refresher);
            }, 1800000);
        </script>



    </table>
</div>
</body>
</html>
