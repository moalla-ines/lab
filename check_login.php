<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

require_once ("password-connection.php");

if(isset($_POST['submit'])){

  $mail = $_POST['login'];
  $pw = $_POST['password'];

  $query="SELECT * FROM `lrsetitmembre` WHERE `password`= '$pw' AND `email`='$mail'" ;

  $select = mysqli_query($con,$query);

    if(mysqli_num_rows($select)>0){

      $row=mysqli_fetch_array($select);
      
      if($row['verify_status']=="1")
      {
        
      if($row['approve']=="1")
      {$_SESSION['nom']=$row['nom'];
        $_SESSION['prenom']=$row['prenom'];
        $_SESSION['id']=$row['id'];
        $_SESSION['etat']=$row['etat'];
        $_SESSION['mail']=$mail;
        header('Location:login.php');

	      }
	      else 
	      {
	        $_SESSION['error']="Votre compte est bien activé ! attendez l'approbation du l'administrateur.";
	        header('Location:index.php');
	      }
    }
      else
      {
        $_SESSION['error']="Activer votre compte pour pouvoir connecté ! Veuillez vérifier votre mail pour le lien d'activation.";
        header('Location:index.php');
      }
      
    }
    else
    {

      $_SESSION['error']="Le mot de passe ou votre login est incorrecte ! " ;
      $_SESSION['error_code']="Erreur"; 
      header("Location: password-login-user.php");
        
    }
    
}    
?>
