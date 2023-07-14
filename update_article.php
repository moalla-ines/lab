<?php



require_once ("password-connection.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
    $mail=$_SESSION['mail'];
    $id_papier=$_GET['id_papier'];
    $tab=$_GET['type'];
    $id=$_GET['id'];
    
}


if(isset($_POST['update'])){
  
  if (isset($_POST['titre']) && $_POST['titre'] !== "") {

    $titre = $_POST['titre'];

    $titre_query="UPDATE `lrsetitarticle scientifique` SET `titre`='$titre' WHERE `id`='$id_papier'";

    $titre_auteur_query="UPDATE `lrsetitauteur_publication` SET  `titre`='$titre' WHERE `id`='$id'";

    mysqli_query($con,$titre_query);
    mysqli_query($con,$titre_auteur_query);
  }
  if (isset($_POST['doi']) && $_POST['doi'] !== "") {

    $doi = $_POST['doi'];

    $doi_query="UPDATE `lrsetitarticle scientifique` SET `Lien DOI`='$doi' WHERE `id`='$id_papier'";
    
    mysqli_query($con,$doi_query);
  }
  if (isset($_FILES['article']['tmp_name']) && $_FILES['article']['tmp_name'] !== "") {

    $pdf=$_FILES['article']['name'];
    $pdf_tem_loc=$_FILES['article']['tmp_name'];
    $output='http:www.setit.rnu.tn\Lab-SETIT\article\\';
    $pdf_store_2=$output.$pdf;
    $pdf_store="article/".$pdf;
    move_uploaded_file($pdf_tem_loc,$pdf_store);
    copy($pdf_store,$pdf_store_2);

    $tel_query="UPDATE `lrsetitarticle scientifique` SET `Fichier`='$pdf' WHERE `id`='$id_papier'";
    
    mysqli_query($con,$tel_query);
  }
  if (isset($_POST['date']) && $_POST['date'] !== "") {

    $date = $_POST['date'];

    $date_query="UPDATE `lrsetitarticle scientifique` SET `Date publication`='$date' WHERE `id`='$id_papier'";
    $tauteur_date_query="UPDATE `lrsetitauteur_publication` SET  `titre`='$titre' WHERE `id`='$id'";
    
    mysqli_query($con,$date_query);
    mysqli_query($con,$auteur_date_query);
  }
  if (isset($_POST['titre_journal']) && $_POST['titre_journal'] !== "") {

    $titre_journal = $_POST['titre_journal'];

    $titre_query="UPDATE `lrsetitarticle scientifique` SET `Titre du journal`='$titre_journal' WHERE `id`='$id_papier'";
    
    mysqli_query($con,$titre_query);
  }
  if (isset($_POST['quartile']) && $_POST['quartile'] !== "") {

    $quartile= $_POST['quartile'];

    $quartile_query="UPDATE `lrsetitarticle scientifique` SET `Quartile du journal`='$quartile' WHERE `id`='$id_papier'";
    
    mysqli_query($con,$quartile_query);
  }
  if (isset($_POST['volume']) && $_POST['volume'] !== "") {

    $volume = $_POST['volume'];

    $volume_query="UPDATE `lrsetitarticle scientifique` SET `Volume`='$volume' WHERE  `id`='$id_papier'";
    
    mysqli_query($con,$volume_query);
  }
  if (isset($_POST['impact']) && $_POST['impact'] !== "") {

    $impact = $_POST['impact'];

    $impact_query="UPDATE `lrsetitarticle scientifique` SET `Facteur`='$impact' WHERE `id`='$id_papier'";
    
    mysqli_query($con,$impact_query);
  }
  if (isset($_POST['indexation']) && $_POST['indexation'] !== "") {

    $indexation = $_POST['indexation'];

    $indexation_query="UPDATE `lrsetitarticle scientifique` SET `Indexation`='$indexation' WHERE `id`='$id_papier'";
    
    mysqli_query($con,$indexation_query);
  }
  if (isset($_POST['site_revue']) && $_POST['site_revue'] !== "") {

    $site_revue = $_POST['site_revue'];

    $site_revue_query="UPDATE `lrsetitarticle scientifique` SET `Site de la revue`='$site_revue' WHERE `id`='$id_papier'";
    
    mysqli_query($con,$site_revue_query);
  }
 
  if (isset($_POST['auteur']) && $_POST['auteur'] !== "" && isset($_POST['mail']) && $_POST['mail'] !== "") {
    
    $auteur=$_POST['au  teur'];
    $mail=$_POST['mail'];
    $auteurs = implode(" , ", $auteur);
    $mail_auteur = implode(" , ", $mail);
    $auteur_query="UPDATE `lrsetitauteur_publication` SET `auteur`='$auteurs' ,`mail_auteur`='$mail_auteur' WHERE `id`='$id'";
    
    mysqli_query($con,$auteur_query);
  }
  if (isset($_POST['auteur']) && $_POST['auteur'] !== "" && isset($_POST['mail']) && $_POST['mail'] !== "" && isset($_POST['auteur_externe']) && $_POST['auteur_externe'] !== "" && isset($_POST['mail_externe']) && $_POST['mail_externe'] !== "") {
    
    $auteur=$_POST['auteur'];
    $mail=$_POST['mail'];
    $auteurs = implode(" , ", $auteur);
    $mail_auteur = implode(" , ", $mail);
    $externe =$_POST['auteur_externe'];
    $mail_externe=$_POST['mail_externe'];
    $auteur_externe=implode(" , ", $externe);
    $mail_externes=implode(" , ", $mail_externe);
    $auteur_total = $auteurs .' , '. $auteur_externe ;
    $mail_total = $mail_auteur .' , '. $mail_externes;

    $auteur_total_query="UPDATE `lrsetitauteur_publication` SET `auteur`='$auteur_total' ,`mail_auteur`='$mail_total' WHERE `id`='$id'";
    
    mysqli_query($con,$auteur_total_query);
  }
  
  $_SESSION['status']="Mise à jour article réussie ! " ;
  $_SESSION['status_code']="Success"; 
  header("Location: view_paper.php ");
}