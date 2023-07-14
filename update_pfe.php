<?php



require_once ("password-connection.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
    $mail=$_SESSION['mail'];
    $id_projet=$_GET['id_projet'];
    $id=$_GET['id'];
    
}


if(isset($_POST['update'])){
  
  if (isset($_POST['titre']) && $_POST['titre'] !== "") {

    $titre = $_POST['titre'];

    $titre_query="UPDATE `lrsetitpfe` SET  `titre`='$titre' WHERE `id`='$id_projet'";

    $titre_auteur_query="UPDATE `lrsetitauteur_projet` SET  `titre`='$titre' WHERE `id`='$id'";

    mysqli_query($con,$titre_query);
    mysqli_query($con,$titre_auteur_query);
  }
  
  if (isset($_FILES['fichier']['tmp_name']) && $_FILES['fichier']['tmp_name'] !== "") {

    $pdf=$_FILES['fichier']['name'];
    $pdf_tem_loc=$_FILES['fichier']['tmp_name'];
    $output='http:www.setit.rnu.tn\Lab-SETIT\pfe\\';
    $pdf_store_2=$output.$pdf;
    $pdf_store="pfe/".$pdf;
    move_uploaded_file($pdf_tem_loc,$pdf_store);
    copy($pdf_store,$pdf_store_2);

    $tel_query="UPDATE `lrsetitpfe` SET `fichier`='$pdf' WHERE `id`='$id_projet'";
    
    mysqli_query($con,$tel_query);
  }
  if (isset($_POST['description']) && $_POST['description'] !== "") {

    $description = $_POST['description'];

    $description_query="UPDATE `lrsetitpfe` SET  `description`='$description' WHERE `id`='$id_projet'";

    mysqli_query($con,$description_query);

  }
  if (isset($_POST['debut']) && $_POST['debut'] !== "") {

    $debut = $_POST['debut'];

    $debut_query="UPDATE `lrsetitpfe` SET `date-debut`='$debut' WHERE `id`='$id_projet'";
    $auteur_date_query="UPDATE `lrsetitauteur_projet` SET  `date`='$debut' WHERE `id`='$id'";
    
    mysqli_query($con,$debut_query);
    mysqli_query($con,$auteur_date_query);
  }
  if (isset($_POST['fin']) && $_POST['fin'] !== "") {

    $fin = $_POST['fin'];

    $fin_query="UPDATE `lrsetitpfe` SET `date-fin`='$fin' WHERE `id`='$id_projet'";

    mysqli_query($con,$fin_query);
    
  }
  if (isset($_POST['etudiant']) && $_POST['etudiant'] !== "") {

    $etudiant = $_POST['etudiant'];

    $etudiant_query="UPDATE `lrsetitpfe` SET `etudiant`='$etudiant' WHERE `id`='$id_projet'";
    
    mysqli_query($con,$etudiant_query);
  }
  if (isset($_POST['institut']) && $_POST['institut'] !== "") {

    $institut = $_POST['institut'];

    $institut_query="UPDATE `lrsetitpfe` SET `institution`='$institut' WHERE `id`='$id_projet'";
    
    mysqli_query($con,$institut_query);
  }
  
  if (isset($_POST['encadrant']) && $_POST['encadrant'] !== "" && isset($_POST['mail_encadrant']) && $_POST['mail_encadrant'] !== "") {
    
    $auteur=$_POST['encadrant'];
    $mail=$_POST['mail_encadrant'];
    
    $auteur_query="UPDATE `lrsetitauteur_projet` SET `encadrant`='$auteur' ,`mail_encadrant`='$mail' WHERE `id`='$id'";
    
    mysqli_query($con,$auteur_query);
  }
  if (isset($_POST['encadrant']) && $_POST['encadrant'] !== "" && isset($_POST['mail_encadrant']) && $_POST['mail_encadrant'] !== "" && isset($_POST['encadrant_2']) && $_POST['encadrant_2'] !== "" && isset($_POST['mail_encadrant_2']) && $_POST['mail_encadrant_2'] !== "") {
    
    $auteur=$_POST['encadrant'];
    $mail=$_POST['mail_encadrant'];
    $encadrant_2=$_POST['encadrant_2'];
    $mail_encadrant_2=$_POST['mail_encadrant_2'];
    $encadrant_total = $auteur.' , '. $encadrant_2 ;
    $mail_total = $mail .' , '. $mail_encadrant_2;

    $auteur2_these_query="UPDATE `lrsetitpfe` SET `co-encadrant`='$encadrant_2'  WHERE `id`='$id_projet'";
    $auteur_query="UPDATE `lrsetitauteur_projet` SET `encadrant`='$encadrant_total' ,`mail_encadrant`='$mail_total' WHERE `id`='$id'";
    
    mysqli_query($con,$auteur2_these_query);
    mysqli_query($con,$auteur_query);
  }
  
  
  $_SESSION['status']="Mise à jour PFE réussie ! " ;
  $_SESSION['status_code']="Success"; 
  header("Location: view_projet.php ");
}