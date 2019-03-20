<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="./components/css/contentContact.css">
    <meta charset="utf-8">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php include('./components/header.php'); ?>
    <title></title>
  </head>
  <body>
    <div class="page-Content">
    <?php include('./components/Navbar.php') ?>
      <div class="content-contact">
        <p class="header-Contact"><h1>Contact</h1></p>
        <form class="sendMail"   method="post">
          <input type="text" name="voornaam" class="voornaam" placeholder="Voornaam" value="">
          <input type="text" name="achternaam" class="achternaam" placeholder="achternaam" value="">
          <input type="email" name="e_mail" placeholder="Wat is uw e-mail?" value="">
          <textarea class="opmerking" type="text" name="opmerking" placeholder="Wat is uw vraag / opmerking?" value=""></textarea>
          <input class="reset" type="reset" name="reset" value="Reset">
          <input class="submit" type="submit" name="submit" value="submit">
        </form>
      </div>
    </div>
    <?php include('./components/Footer.php'); ?>
  </body>
</html>




<?php

	if (isset($_POST['submit'])) {

// Instantiation and passing `true` enables exceptions

$mail = new PHPMailer;

                //$mail->SMTPDebug = 4; // Enable verbose debug output

                $mail->isSMTP(); // Set mailer to use SMTP
                $mail->Host = '37.128.144.185'; // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; // Enable SMTP authentication
                //$mail->SMTPSecure = 'TLS';
                $mail->Username = 'website@fresh-dev.study'; // SMTP username
                $mail->Password = '8jz7iE5?'; // SMTP password

                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                $mail->Port = 587; // TCP port to connect to

    //Recipients

    $mail->setFrom('website@fresh-dev.study');

    $mail->addAddress('12321.post@gmail.com');     // Add a recipient

    $mail->addReplyTo('12321.post@gmail.com');



    // Content

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Here is the subject';

    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';



    $mail->send();

    ?>
		<script type="text/javascript">
		swal("Uw mail is gestruurd");
		</script>
<?php
		}
?>
