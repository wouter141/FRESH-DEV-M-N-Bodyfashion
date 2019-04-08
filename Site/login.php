<?php session_start(); ?>
<?php error_reporting("none"); ?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <div class="content">
            <div class="login">
                <form action="./components/SetLogin.php" method="post">
                    <div class="title">Inloggen</div>
                    <label for="email">E-mailadres</label>
                    <input type="email" name="email" placeholder="Voer uw e-mailadres in" required autofocus>
                    <br>
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Voer uw wachtwoord in" required>
                    <div class="btns">
                        <button name="submit" type="submit">Volgende</button>
                    </div>
                    <?php if($_SESSION['is_admin']) { ?>
                      <button type="button" name="button">HIIII</button>
                    <?php } ?>
                </form>
            </div>
        </div>
    </body>
</html>
