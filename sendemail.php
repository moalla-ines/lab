<?php

$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$message=$_POST['message'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


    $mail = new PHPMailer(true);
    
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'messaiamir48@gmail.com';                     //SMTP username
    $mail->Password   = 'vujacvuglonqebzn';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;     
    $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
      )
  );                               //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

  //Recipients
  $mail->setFrom($email, $name);
  $mail->addAddress('messaiamir48@gmail.com');     //Add a recipient
 

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = $email;
  $email_template =
  "<h2>Mail de la part de $name</h2>
   <h2>Contenu : </h2>
   <h4>$message</h4>
  ";

  $mail->Body=$email_template;
  
  $mail->send();

    $_SESSION['status']="Mail contact envoyer , nous vous répondrons bientôt  !";
    header("Location:contact.php");
  

