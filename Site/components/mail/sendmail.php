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

    $mail->Host       = '37.128.144.185';  // Specify main and backup SMTP servers

    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication

    $mail->Username   = 'website@fresh-dev.study';              // SMTP username

    $mail->Password   = '8jz7iE5?';                               // SMTP password

//    $mail->SMTPSecure = 'TLS';                                  // Enable TLS encryption, `ssl` also accepted

//    $mail->Port       = 587;                                    // TCP port to connect to



    //Recipients

    $mail->setFrom('website@fresh-dev.study', 'Mailer');

    $mail->addAddress('12321.post@gmail.com', 'Joe User');     // Add a recipient

    $mail->addReplyTo('12321.post@gmail.com', 'Information');

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
