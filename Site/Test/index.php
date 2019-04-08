<?php session_start(); ?>
<?php

if(isset($_SESSION['logged_in']))
    exit(header("Location: /index.php"));

?>

<!DOCTYPE html>
<html>
    <head>
    </head>

    <body>

        <div class="content">

            <div class="login">
                <form action="NewSlider.php" method="post">
                    <div class="title">Inloggen</div>

                    <label for="email">E-mailadres</label>
                    <input type="email" name="email" placeholder="Voer uw e-mailadres in" required autofocus>
                    <br>
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Voer uw wachtwoord in" required>

                    <div class="btns">
                        <button name="submit" type="submit">Volgende</button>
                    </div>
                </form>
            </div>

        </div>

    </body>
</html>
