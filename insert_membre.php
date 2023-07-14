<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}



require_once ("password-connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendemail_verify($nom,$email,$verify_token){

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
  $mail->setFrom('messaiamir48@gmail.com', 'URSETIT');
  $mail->addAddress($email);     //Add a recipient
 

  //Content
  $mail->isHTML(true);                                  //Set email format to HTML
  $mail->Subject = 'Activation de votre compte SETIT';
  $email_template =
  "<h2>Vous avez crée un compte sur notre platforme SETIT</h2>
   <h5>Veuillez activer votre compte en cliquant sur le lien ci-dessous.</h5>
   <br>
   <a href='http://localhost/projet/verify_email.php?token=$verify_token'>Cliquer ici </a>
  ";

  $mail->Body=$email_template;
  
  $mail->send();
  
  
}

if(isset($_POST['submit'])){

  $mdp = mysqli_real_escape_string($con,$_POST['mdp']);
  $nom = mysqli_real_escape_string($con,$_POST['nom']);
  $prenom = mysqli_real_escape_string($con,$_POST['prenom']);
  $tel = mysqli_real_escape_string($con,$_POST['tel']);
  $email = mysqli_real_escape_string($con,$_POST['email']);
  $grade = mysqli_real_escape_string($con,$_POST['grade']);
  $diplome = mysqli_real_escape_string($con,$_POST['diplome']);
  $date = $_POST['date'];
  $datediplome = $_POST['datediplome'];
  $cin = $_POST['cin'];
  $passport = $_POST['numpassport'];
  $cnrps = $_POST['cnrps'];
  $specialite = mysqli_real_escape_string($con,$_POST['specialite']);
  $ftadmin =mysqli_real_escape_string($con, $_POST['ftadmin']);
  $scopus = $_POST['scopus'];
  $orcid = $_POST['orcid'];
  $telfax = $_POST['telfax'];
  $gender = $_POST['gender'];
  $image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
  $verify_token=md5(rand());

  $uppercase = preg_match('@[A-Z]@', $mdp);
  $lowercase = preg_match('@[a-z]@', $mdp);
  $number    = preg_match('@[0-9]@', $mdp);
 
  $select = mysqli_query($con, "SELECT * FROM lrsetitmembre WHERE email = '$email'");
 
    if((mysqli_num_rows($select))>0) {

      $_SESSION['erreur']="Un compte avec ce mail existe déjà !";
      header('Location:ajout_membre.php');

    }elseif(!$uppercase || !$lowercase || !$number  || strlen($mdp) < 7){
      
      $_SESSION['erreur']=" Mot de passe invalide ! Merci de respecter les conditions mises pour le mot de passe.";
      
      header('Location:ajout_membre.php');
       
     
    }else{

      $query=" INSERT INTO `lrsetitmembre`(`nom`, `prenom`, `cin`, `passport`, `cnrps`, `genre`, `grade`, `email`, `mot de passe`, `specialite`, `diplome`, `date de naissance`, `fonction administrative`, `h-index`, `orcid`, `tel mobile`, `tel fax`, `date du dernier diplome` ,`image`,`verify_token`) 
      VALUES ('$nom','$prenom','$cin','$passport','$cnrps','$gender','$grade','$email','$mdp','$specialite','$diplome','$date','$ftadmin','$scopus','$orcid','$tel','$telfax','$datediplome','$image','$verify_token')";

      $query_run=mysqli_query($con, $query);

    }
    if($query_run){

      sendemail_verify("$nom","$email","$verify_token");
      
      $_SESSION['status']="Compte crée avec succès ! Veuillez vérfier votre mail pour activer votre compte.";
      
      header('Location:gestion_membres.php');

    }
}



?>
