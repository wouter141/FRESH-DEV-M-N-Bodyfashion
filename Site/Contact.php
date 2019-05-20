<?php session_start();?>
<!DOCTYPE html>
<html lang="nl" dir="ltr">
  <head>
    <link rel="stylesheet" href="./components/css/contentContact.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php include('components/header.php'); ?>
    <?php session_start();?>
    <title>Contact</title>
  </head>
  <body>
    <div class="page-Content">
    <?php include('./components/Navbar.php') ?>
      <div class="content-contact">
        <div class="head-title"><h1>Contact</h1></div>
        <form class="sendMail" method="post">
          <input type="text" name="voornaam" class="voornaam" placeholder="Voornaam" value="">
          <input type="text" name="achternaam" class="achternaam" placeholder="achternaam" value="">
          <input type="email" name="e_mail" placeholder="Wat is uw e-mail?" value="">
          <textarea class="opmerking" type="text" name="opmerking" placeholder="Wat is uw vraag / opmerking?" cols="67" rows="5"></textarea>
          <input class="submit" type="submit" name="submit" value="submit">
          <input class="reset" type="reset" name="reset" value="reset">
        </form>
      </div>
    </div>
    <?php include('./components/Footer.php'); ?>
  </body>
</html>

<?php

	if (isset($_POST['submit'])) {

        $reaMail = $_POST['e_mail'];
        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $body = $_POST['opmerking'];


        require('./components/dbconn.php');
        $sql = "INSERT INTO mail (voornaam, achternaam, mail, body) VALUES ('$voornaam', '$achternaam', '$reaMail', '$body')";
        $conn->exec($sql);

?>
		<script type="text/javascript">
            swal("Uw mail is gestuurd");
		</script>
<?php
		}
?>
