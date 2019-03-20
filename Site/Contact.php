<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="./components/css/contentContact.css">
    <meta charset="utf-8">
    <?php include('./components/header.php'); ?>
    <title></title>
  </head>
  <body>
    <div class="page-Content">
    <?php include('./components/Navbar.php') ?>
      <div class="content-contact">
        <p class="header-Contact"><h1>Contact</h1></p>
        <form class="sendMail" action="./components/mail/sendmail.php" method="post">
          <input type="text" name="voornaam" class="voornaam" placeholder="Voornaam" value="">
          <input type="text" name="achternaam" class="achternaam" placeholder="achternaam" value="">
          <input type="email" name="e_mail" placeholder="Wat is uw e-mail?" value="">
          <textarea class="opmerking" type="text" name="opmerking" placeholder="Wat is uw vraag / opmerking?" value=""></textarea>
          <input class="reset" type="reset" name="reset" value="Reset">
          <input class="submit" type="submit" name="submit" value="Submit">
        </form>
      </div>
    </div>
    <?php include('./components/Footer.php'); ?>
  </body>
</html>
