<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
error_reporting(0);

// Load Composer's autoloader
require 'vendor/autoload.php';
session_start();
// echo "callled";
 function sendMail($to){
// Instantiation and passing `true` enables exceptions
//send and return the generated random OTP
$otp = rand(100000,999999);
$mail = new PHPMailer(true);
$content="Pizzeria OTP Verification Code: <b>".$otp."</b>";
// $content="Your OTP is :".$otp;

// echo "ollaaam";
try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    // $mail->SMTPDebug = 1;                      // Enable verbose debug output
// $mail->SMTPSecure = false;
// $mail->SMTPAutoTLS = false;
    $mail->Password   = 'hjqroosyxsikuhql';            
    // hjqroosyxsikuhql


    $mail->isSMTP(); 
  $mail->Host       = gethostbyname('smtp.gmail.com');

    $mail->Port       = '587';                                    // TCP port to connect to
                                         // Send using SMTP
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted

 $mail->Username   = 'nilkumarsharma2016@gmail.com';                     // SMTP username
    $email->Password="eichaklamme@123";


// $mail->SMTPSecure = "ssl";
    // $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    // $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    // $mail->SMTPSecure = false;
// $mail->SMTPAutoTLS = false;
// $mail->SMTPAuth = false;
// $mail->SMTPAutoTLS = false; 

                      // SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
   $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

    //Recipients
    $mail->setFrom($to, 'Pizzeria'); 
    // $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient

    $mail->addAddress($to);               // Name is optional
    
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Pizzeria OTP";
    $mail->Body    = $content;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    // echo 'Message has been sent';
    return $otp;
} catch (Exception $e) {
    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

    return "0";
}

}

print(sendMail($_SESSION["EmailId"]));
?>