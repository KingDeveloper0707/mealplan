<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
//require '../vendor/autoload.php';

require '../vendor/phpmailer/Exception.php';
require '../vendor/phpmailer/PHPMailer.php';
require '../vendor/phpmailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host = 'mail.simpleketosystem.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
    $mail->Username = 'sksalerts@simpleketosystem.com';                     // SMTP username
    $mail->Password = '0R=S5zpA$tJ4';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('sksalerts@simpleketosystem.com', 'Mailer');
    $mail->addAddress('tarasprystavskyj@hotmail.com', 'Taras Prystavskyj');     // Add a recipient
    $mail->addAddress('hello@konsciousketo.com', 'Kristen Kowalski');     // Add a recipient
    $mail->addAddress('matt@konsciousketo.com', 'Matt Konig');     // Add a recipient
    $mail->addAddress('kristen@konsciousketo.com', 'Kristen Kowalski');     // Add a recipient
    
//    $mail->addAddress('"matt@konsciousketo.com', 'Matt Konig');     // Add a recipient
//    $mail->addAddress('"kristen@konsciousketo.com', 'Kristen Kowalski');     // Add a recipient
//    $mail->addAddress('ellen@example.com');               // Name is optional
//    $mail->addReplyTo('info@example.com', 'Information');
//    $mail->addCC('cc@example.com');
//    $mail->addBCC('bcc@example.com');

    // Attachments
//    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Blank Meal Plan Notification';
    $mail->Body = 'This is the Test email.';
    $mail->AltBody = 'This is the Test email';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>