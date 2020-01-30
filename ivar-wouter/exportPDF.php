<!---WEBSITE--->
<!DOCTYPE html>
<html lang="nl" dir="ltr">
    <head>
        <?php include('components/header.php'); ?>
        <?php include('./components/navbardash.php') ?>
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
    </head>
    <body>
        <div class="page-Content">
            <div class="head-title">
                <h1>Export PDF</h1>
            </div>
            <div class="Main-Paragraaf">
                <form action="export.php" method="get">
                    <select name="Maand" required>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maart</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Augustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">Novermber</option>
                        <option value="12">December</option>
                    </select>
                    <select name="Jaar" required>
                        <option value="2019">2019</option>
                    </select>
                    <input type="submit" value="Download" name="download">
                </form>
            </div>
        </div>
    </body>
</html>