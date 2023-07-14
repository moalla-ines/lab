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

      $titre_query="UPDATE `lrsetitthese` SET  `Titre`='$titre' WHERE `id`='$id_projet'";

      $titre_auteur_query="UPDATE `lrsetitauteur_projet` SET  `titre`='$titre' WHERE `id`='$id'";

      mysqli_query($con,$titre_query);
      mysqli_query($con,$titre_auteur_query);
    }
    
    if (isset($_FILES['these']['tmp_name']) && $_FILES['these']['tmp_name'] !== "") {

      $pdf=$_FILES['these']['name'];
      $pdf_tem_loc=$_FILES['these']['tmp_name'];
      $output='http:www.setit.rnu.tn\Lab-SETIT\thèse\\';
      $pdf_store_2=$output.$pdf;
      $pdf_store="thèse/".$pdf;
      move_uploaded_file($pdf_tem_loc,$pdf_store);
      copy($pdf_store,$pdf_store_2);

      $tel_query="UPDATE `lrsetitthese` SET `Mémoire`='$pdf' WHERE `id`='$id_projet'";
      
      mysqli_query($con,$tel_query);
    }
    if (isset($_POST['date']) && $_POST['date'] !== "") {

      $date = $_POST['date'];

      $date_query="UPDATE `lrsetitthese` SET `Date`='$date' WHERE `id`='$id_projet'";
      $auteur_date_query="UPDATE `lrsetitauteur_projet` SET  `date`='$date' WHERE `id`='$id'";
      
      mysqli_query($con,$date_query);
      mysqli_query($con,$auteur_date_query);
    }
    if (isset($_POST['sujet']) && $_POST['sujet'] !== "") {

      $sujet = $_POST['sujet'];

      $sujet_query="UPDATE `lrsetitthese` SET `Sujet`='$sujet' WHERE `id`='$id_projet'";
      
      mysqli_query($con,$sujet_query);
    }
    if (isset($_POST['anneeinscri']) && $_POST['anneeinscri'] !== "") {

      $anneeinscri = $_POST['anneeinscri'];

      $anneeinscri_query="UPDATE `lrsetitthese` SET `Année d'inscription`='$anneeinscri' WHERE `id`='$id_projet'";
      
      mysqli_query($con,$anneeinscri_query);
    }
    
    if (isset($_POST['encadrant']) && $_POST['encadrant'] !== "" && isset($_POST['mail_encadrant']) && $_POST['mail_encadrant'] !== "") {
      
      $auteur=$_POST['encadrant'];
      $mail=$_POST['mail_encadrant'];
      
      $auteur_these_query="UPDATE `lrsetitthese` SET `Encadrant`='$auteur'  WHERE `id`='$id_projet'";
      $auteur_query="UPDATE `lrsetitauteur_projet` SET `encadrant`='$auteur' ,`mail_encadrant`='$mail' WHERE `id`='$id'";
      mysqli_query($con,$auteur_these_query);
      mysqli_query($con,$auteur_query);
    }
    if (isset($_POST['encadrant']) && $_POST['encadrant'] !== "" && isset($_POST['mail_encadrant']) && $_POST['mail_encadrant'] !== "" && isset($_POST['encadrant_2']) && $_POST['encadrant_2'] !== "" && isset($_POST['mail_encadrant_2']) && $_POST['mail_encadrant_2'] !== "") {
      
      $auteur=$_POST['encadrant'];
      $mail=$_POST['mail_encadrant'];
      $encadrant_2=$_POST['encadrant_2'];
      $mail_encadrant_2=$_POST['mail_encadrant_2'];
      $encadrant_total = $auteur.' , '. $encadrant_2 ;
      $mail_total = $mail .' , '. $mail_encadrant_2;

      $auteur2_these_query="UPDATE `lrsetitthese` SET `Deuxieme encadrant`='$encadrant_2'  WHERE `id`='$id_projet'";
      $auteur_query="UPDATE `lrsetitauteur_projet` SET `encadrant`='$encadrant_total' ,`mail_encadrant`='$mail_total' WHERE `id`='$id'";
      
      mysqli_query($con,$auteur2_these_query);
      mysqli_query($con,$auteur_query);
    }
    if (isset($_POST['cotutelle']) && $_POST['cotutelle'] !== "") {

      $cotutelle = $_POST['cotutelle'];

      $cotutelle_query="UPDATE `lrsetitthese` SET `Cotutelle`='$cotutelle' WHERE `id`='$id_projet'";
      
      mysqli_query($con,$cotutelle_query);
      
    }
    
    
    $_SESSION['status']="Mise à jour thèse réussie ! " ;
    $_SESSION['status_code']="Success"; 
    header("Location: view_projet.php ");
}