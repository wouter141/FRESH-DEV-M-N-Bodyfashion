<?php
	$voornaam = $_POST['voornaam'];
	$achternaam = $_POST['achternaam'];
  $Mail = $_POST['e_mail'];
  $opmerking = $_POST['opmerking'];

	$body = "Hallo Ivar,\r\n\r\n
  Je hebt een e-mailtje van je Portfolio gekregen.\r\n
  Dit mailtje is van: ";
	$body .= $voornaam;
	$body .= $achternaam;
	$body .= ".\r\n
  Het e-mailadres van degene die je gemaild heeft is: ";
	$body .= $Mail;
  $body .= "Deze mailer heeft een vraag, namelijk:";
  $body .= $opmerking;
	$ontvanger = "ivar@waaromleefje.nl";
	$onderwerp = "M-N-BodyFashion-Website";
	$email_from = "M-N-BodyFashion-Website@site.nl";

	//headers
	$headers = 'From: '.$email_from."\r\n".
	'Reply-To: '.$Mail."\r\n" .
	'X-Mailer: PHP/' . phpversion();
	mail($ontvanger, $onderwerp, $body, $headers);
  ?>
  <html>
    <head>
			<title>Succes</title>
    </head>
    <body>
      De mail is met succes vertstuurd.<br>
      Klik <a href='../../contact.php'>hier</a> om terug te gaan.<br>
    </body>
  </html>
