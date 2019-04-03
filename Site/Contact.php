<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

?>


<!DOCTYPE html>
<html lang="nl" dir="ltr">
  <head>
    <link rel="stylesheet" href="./components/css/contentContact.css">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php include('components/Header.php'); ?>
    <title></title>
  </head>
  <body>
    <div class="page-Content">
    <?php include('./components/Navbar.php') ?>
      <div class="content-contact">
        <div class="head-title"><h1>Contact</h1></div>
        <form class="sendMail"   method="post">
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
$opmerking = $_POST['opmerking'];

$mail = new PHPMailer;

//                $mail->SMTPDebug = 2; // Enable verbose debug output

                $mail->isSMTP(); // Set mailer to use SMTP
                $mail->Host = '37.128.144.185'; // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; // Enable SMTP authentication
                //$mail->SMTPSecure = 'TLS';
                $mail->Username = 'website@fresh-dev.academy'; // SMTP username
                $mail->Password = 'zgVq?086'; // SMTP password

                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                $mail->Port = 587; // TCP port to connect to

    //Recipients

    $mail->setFrom('website@fresh-dev.academy');

    $mail->addAddress('12321.post@gmail.com');     // Add a recipient

   // $mail->addReplyTo('12321.post@gmail.com');



    // Content

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'M-N-Bodyfashion Contact';

    $mail->Body    = "Op deze mail kun je reageren: ".$reaMail."<br> Dit is de volledige naam: ".$voornaam." ".$achternaam.
                      "<br>".$voornaam." heeft de volgende vraag of opmerking: ".$opmerking;

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';



    $mail->send();

    ?>
		<script type="text/javascript">
		swal("Uw mail is gestruurd");
		</script>
<?php
		}
?>
