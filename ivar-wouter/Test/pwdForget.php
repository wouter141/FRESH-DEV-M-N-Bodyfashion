<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();
require('../components/dbconn.php');
error_reporting("all");
?>

    <!DOCTYPE html>
    <html lang="nl" dir="ltr">
    <head>
        <?php include "../components/header.php"; ?>
        <link href="../components/css/contentGebruikersbeheer.css" rel="stylesheet">
        <link rel="stylesheet" href="../components/css/navbardash.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
        <meta http-equiv="Cache-control" content="public">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" href="../components/css/FooterCSS.css">
        <link rel="stylesheet" href="../components/css/index.css">
        <link href="https://fonts.googleapis.com/css?family=IM+Fell+Great+Primer" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
    <div class="navbar">
        <?php // include('../components/navbardash.php') ?>
    </div>
    <div class="page-Content">
        <div class="main-title">
            <h1>Wachtwoord vergeten</h1>
        </div>
        <div class="content-gebruikersbeheer">
            <form method="post">
                <h3>Vul dit formulier in, en genereer een nieuw wachtwoord</h3>
                <input type="text" name="usermail" placeholder="e-mail adres" required/>
                <input type="submit" value="Submit" name="resetPWD" />
                <input type="reset" value="Reset" />
            </form>
        </div>
    </div>
    </body>
</html>
<?php

if(isset($_POST)){
    $usermail = $_POST['usermail'];
    $sql = "SELECT * FROM user2 WHERE mail = '$usermail'";
    foreach($conn->query($sql, PDO::FETCH_ASSOC) as $row) {
        $username = $row['username'];
        $count = count($username);
        if ($count == 1) {
            $username = $row['username'];
            $email = $row['mail'];
            $password = $row['password'];

            $subject = "Forgot Password || M&N BodyFashion";
            $gehele_mail = "Nothing to see here";

                $mail = new PHPMailer;
                $mail->SMTPDebug = 0; // Enable verbose debug output

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
                $mail->addAddress($email);     // Add a recipient
                $mail->addReplyTo('12321.post@gmail.com');



                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'M-N-Bodyfashion || Forgot PWD';

                $mail->Body    ='
            <!doctype html>
                <html>
                <head>
                    <meta name="viewport" content="width=device-width">
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <title>Simple Transactional Email</title>
                    <style>
                        /* -------------------------------------
                            INLINED WITH htmlemail.io/inline
                        ------------------------------------- */
                        /* -------------------------------------
                            RESPONSIVE AND MOBILE FRIENDLY STYLES
                        ------------------------------------- */
                        @media only screen and (max-width: 620px) {
                            table[class=body] h1 {
                                font-size: 28px !important;
                                margin-bottom: 10px !important;
                            }
                            table[class=body] p,
                            table[class=body] ul,
                            table[class=body] ol,
                            table[class=body] td,
                            table[class=body] span,
                            table[class=body] a {
                                font-size: 16px !important;
                            }
                            table[class=body] .wrapper,
                            table[class=body] .article {
                                padding: 10px !important;
                            }
                            table[class=body] .content {
                                padding: 0 !important;
                            }
                            table[class=body] .container {
                                padding: 0 !important;
                                width: 100% !important;
                            }
                            table[class=body] .main {
                                border-left-width: 0 !important;
                                border-radius: 0 !important;
                                border-right-width: 0 !important;
                            }
                            table[class=body] .btn table {
                                width: 100% !important;
                            }
                            table[class=body] .btn a {
                                width: 100% !important;
                            }
                            table[class=body] .img-responsive {
                                height: auto !important;
                                max-width: 100% !important;
                                width: auto !important;
                            }
                        }
                        /* -------------------------------------
                            PRESERVE THESE STYLES IN THE HEAD
                        ------------------------------------- */
                        @media all {
                            .ExternalClass {
                                width: 100%;
                            }
                            .ExternalClass,
                            .ExternalClass p,
                            .ExternalClass span,
                            .ExternalClass font,
                            .ExternalClass td,
                            .ExternalClass div {
                                line-height: 100%;
                            }
                            .apple-link a {
                                color: inherit !important;
                                font-family: inherit !important;
                                font-size: inherit !important;
                                font-weight: inherit !important;
                                line-height: inherit !important;
                                text-decoration: none !important;
                            }
                            .btn-primary table td:hover {
                                background-color: #34495e !important;
                            }
                            .btn-primary a:hover {
                                background-color: #34495e !important;
                                border-color: #34495e !important;
                            }
                        }
                    </style>
                </head>
                <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
                <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
                    <tr>
                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
                        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
                            <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">
                
                                <!-- START CENTERED WHITE CONTAINER -->
                                <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">Reactie op uw Opmerking.</span>
                                <table class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">
                
                                    <!-- START MAIN CONTENT AREA -->
                                    <tr>
                                        <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                                            <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                                                <tr>
                                                    <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                                                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">'.$gehele_mail.'</p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                
                                    <!-- END MAIN CONTENT AREA -->
                                </table>
                
                                <!-- START FOOTER -->
                                <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
                                    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                                        <tr>
                                            <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                                                <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">M&N BodyFashion</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- END FOOTER -->
                
                                <!-- END CENTERED WHITE CONTAINER -->
                            </div>
                        </td>
                        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
                    </tr>
                </table>
                </body>
                </html>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();

                //Party
                ?>
                <script>
                    Swal.fire({
                        title: "Okee",
                        text: "Uw mail is verzonden",
                        type: "success",
                        showCancelButton: false,
                        confirmButtonText: '<a href="https://fresh-dev.academy/ivar-wouter/Test/index.php">Ga terug</a>'
                    });
                </script>
                <?php
            }
        else{
            echo "Die e-mail bestaat niet";
        }
    }
}
?>