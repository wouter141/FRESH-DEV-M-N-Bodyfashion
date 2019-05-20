<?php session_start(); ?>
<?php error_reporting("all"); ?>

<!DOCTYPE html>
<html>
    <head>
      <?php include('components/header.php'); ?>
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="./components/css/contentDashboard.css">
      <title></title>
    </head>
    <body>
      <?php include('./components/Navbar.php') ?>
      <div class="page-Content">
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
          <div class="loginerror">
              <?php
              if ($_GET["action"] === "failed"){
                  echo "<p>Wachtwoord of email is incorrect, probeer het opnieuw.</p>";
              }

              if ($_GET["action"] === "success") {
                  echo "<p>Leuk geprobeerd brian/miguel/jesse ;)</p>";
              }
              ?>
          </div>
        </div>
        <?php include('./components/Footer.php'); ?>
    </body>
</html>


