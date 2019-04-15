<?php session_start(); ?>
<?php error_reporting("all"); ?>

<!DOCTYPE html>
<html>
    <head>
      <?php include('components/header.php'); ?>
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
      <title></title>
    </head>
    <body>
      <div class="page-Content">
        <?php include('./components/Navbar.php') ?>
        <div class="head-title">
          <h1>Login</h1>
        </div>
        <div class="Main-Paragraaf">
          <div class="title">Inloggen</div>
                <form action="./components/SetLogin.php" method="post">
                  <div class="mails">
                    <label for="email">E-mailadres</label>
                    <input class="email" type="email" name="email" placeholder="Voer uw e-mailadres in" required autofocus>
                  </div>
                  <div class="passwordDiv">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Voer uw wachtwoord in" required>
                  </div>
                  <div class="btns">
                    <button name="submit" type="submit">Volgende</button>
                  </div>
                </form>
            </div>
        </div>
        <?php include('./components/Footer.php'); ?>
    </body>
</html>
