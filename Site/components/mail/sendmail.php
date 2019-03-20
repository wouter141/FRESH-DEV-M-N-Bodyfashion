<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
require 'PHPMailer/src/Exception.php';

require 'PHPMailer/src/PHPMailer.php';

require 'PHPMailer/src/SMTP.php';

// Import PHPMailer classes into the global namespace

// These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;

use PHPMailer\PHPMailer\Exception;


// Instantiation and passing `true` enables exceptions

$mail = new PHPMailer(true);



try {

    //Server settings

    $mail->SMTPDebug = 2;                                       // Enable verbose debug output

    $mail->isSMTP();                                            // Set mailer to use SMTP

    $mail->Host       = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers

    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication

    $mail->Username   = '12321.post@gmail.com';                     // SMTP username

    $mail->Password   = 'Stemittheking12';                               // SMTP password

    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted

    $mail->Port       = 587;                                    // TCP port to connect to



    //Recipients

    $mail->setFrom('from@example.com', 'Mailer');

    $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient

    $mail->addAddress('ellen@example.com');               // Name is optional

    $mail->addReplyTo('info@example.com', 'Information');

    $mail->addCC('cc@example.com');

    $mail->addBCC('bcc@example.com');



    // Content

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Here is the subject';

    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';



    $mail->send();?>
		<script type="text/javascript">
		swal("Uw mail is gestruurd");
		</script>
<?php

} catch (Exception $e) {
	?>
	<script type="text/javascript">
	swal("Er is een error in het systeem. Probeer het later nog eens.");
	</script>
	<?php
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}

?>
