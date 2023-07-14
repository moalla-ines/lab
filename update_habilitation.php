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

    $titre_query="UPDATE `lrsetithabilitation` SET  `Titre`='$titre' WHERE `id`='$id_projet'";

    $titre_auteur_query="UPDATE `lrsetitauteur_projet` SET  `titre`='$titre' WHERE `id`='$id'";

    mysqli_query($con,$titre_query);
    mysqli_query($con,$titre_auteur_query);
  }
  
  if (isset($_FILES['fichier']['tmp_name']) && $_FILES['fichier']['tmp_name'] !== "") {

    $pdf=$_FILES['fichier']['name'];
    $pdf_tem_loc=$_FILES['fichier']['tmp_name'];
    $output='http:www.setit.rnu.tn\Lab-SETIT\habilitation\\';
    $pdf_store_2=$output.$pdf;
    $pdf_store="habilitation/".$pdf;
    move_uploaded_file($pdf_tem_loc,$pdf_store);
    copy($pdf_store,$pdf_store_2);

    $tel_query="UPDATE `lrsetithabilitation` SET `Fichier`='$pdf' WHERE `id`='$id_projet'";
    
    mysqli_query($con,$tel_query);
  }
  if (isset($_POST['date']) && $_POST['date'] !== "") {

    $date = $_POST['date'];

    $date_query="UPDATE `lrsetithabilitation` SET `Date`='$date' WHERE `id`='$id_projet'";
    $auteur_date_query="UPDATE `lrsetitauteur_projet` SET  `date`='$date' WHERE `id`='$id'";
    
    mysqli_query($con,$date_query);
    mysqli_query($con,$auteur_date_query);
  }
  if (isset($_POST['nom']) && $_POST['nom'] !== "") {

    $nom = $_POST['nom'];

    $titre_query="UPDATE `lrsetithabilitation` SET `Titulaire habilitation`='$nom' WHERE `id`='$id_projet'";
    
    mysqli_query($con,$titre_query);
  }
  if (isset($_POST['classe']) && $_POST['classe'] !== "") {

    $classe = $_POST['classe'];

    $classe_query="UPDATE `lrsetitconference` SET `classe`='$classe' WHERE `id`='$id_projet'";
    
    mysqli_query($con,$classe_query);
  }
  
  if (isset($_POST['encadrant']) && $_POST['encadrant'] !== "" && isset($_POST['mail_encadrant']) && $_POST['mail_encadrant'] !== "") {
    
    $auteur=$_POST['encadrant'];
    $mail=$_POST['mail_encadrant'];
    
    $auteur_query="UPDATE `lrsetitauteur_projet` SET `encadrant`='$auteur' ,`mail_encadrant`='$mail' WHERE `id`='$id'";
    
    mysqli_query($con,$auteur_query);
  }
 
  
  
  $_SESSION['status']="Mise à jour conférence réussie ! " ;
  $_SESSION['status_code']="Success"; 
  header("Location: view_projet.php ");
}