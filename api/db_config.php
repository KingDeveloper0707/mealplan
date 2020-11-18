<?php

//CORS ALLOW
$http_origin = $_SERVER['HTTP_ORIGIN'];
$allowed_domains = array(
    'https://simpleketosystem.com',
    'https://konsciousketo.com',
    'https://zapier.com',
    'https://shopify.com',
    'https://carthook.com',
    'https://recipes.simpleketosystem.com',
    'https://dev.inetechnologies.com',
    'https://api.rechargeapps.com',
);
if (in_array($http_origin, $allowed_domains)) {
    header("Access-Control-Allow-Origin: $http_origin");
}

//local server

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "smplk3t0_mealplan";

// live server
/*
  $servername = "localhost";
  $username = "smplk3t0_taras";
  $password = "zaq12wsxcde3";
  $dbname = "smplk3t0_mealplan";
*/
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
//require '../vendor/autoload.php';

require '../vendor/phpmailer/Exception.php';
require '../vendor/phpmailer/PHPMailer.php';
require '../vendor/phpmailer/SMTP.php';



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function send_blank_notif($email, $orderid, $conn) {
    $sql = "SELECT blanknotifsent FROM mealplan WHERE email = '" . $email . "' AND orderid='" . $orderid . "' AND blanknotifsent = '1' LIMIT 1";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {//notification not sent yet.
        try {
            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = 'mail.simpleketosystem.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   // Enable SMTP authentication
            $mail->Username = 'sksalerts@simpleketosystem.com';                     // SMTP username
            $mail->Password = '0R=S5zpA$tJ4';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587;                                    // TCP port to connect to //465:secure, 587: non_secure
            //Recipients
            $mail->setFrom('sksalerts@simpleketosystem.com', 'SKS Alert');
            $mail->addAddress('tarasprystavskyj@hotmail.com', 'Taras Prystavskyj');     // Add a recipient
            $mail->addAddress('hello@konsciousketo.com', 'Kristen Kowalski');     // Add a recipient
            $mail->addAddress('matt@konsciousketo.com', 'Matt Konig');     // Add a recipient
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Blank Meal Plan Notification';
            $mail->Body = '<p>A blank mealplan has been created for customer <a href="mailto:' . $email . '">' . $email . '</a>.</p>';
            $mail->Body .= '<p>You can have a look at her mealplan URL:</p>';
            $mail->Body .= '<p><a href="https://simpleketosystem.com/mealplan?uid=' . $orderid . '&visit=admin">https://simpleketosystem.com/mealplan?uid=' . $orderid . '&visit=admin</a></p>';


            $mail->send();
//            echo 'Message has been sent';
            $sql = "UPDATE mealplan SET blanknotifsent='1' WHERE email='" . $email . "'";
            /*
            if ($conn->query($sql) === TRUE) {
            } else {
            }
            */
        } catch (Exception $e) {
//            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

?>