<?php



require_once ("password-connection.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
    $mail=$_SESSION['mail'];
    $id_papier=$_GET['id_papier'];
    $id=$_GET['id'];
    
}


if(isset($_POST['update'])){

    if (isset($_POST['auteur']) && $_POST['auteur'] !== "" && isset($_POST['mail']) && $_POST['mail'] !== "") {
    
        $auteur=$_POST['auteur'];
        $mail=$_POST['mail'];
        $auteurs = implode(" , ", $auteur);
        $mail_auteur = implode(" , ", $mail);
        $auteur_query="UPDATE `lrsetitauteur_publication` SET `auteur`='$auteurs' ,`mail_auteur`='$mail_auteur' WHERE `id`='$id' ";
        
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
    
        $auteur_total_query="UPDATE `lrsetitauteur_publication` SET `auteur`='$auteur_total' ,`mail_auteur`='$mail_total' WHERE `id`='$id' ";
        
        mysqli_query($con,$auteur_total_query);
    }
    if (isset($_POST['titre']) && $_POST['titre'] !== "") {

        $titre = $_POST['titre'];
    
        $titre_query="UPDATE `brevet` SET `titre`='$titre' WHERE `id`='$id_papier'";
    
        $titre_auteur_query="UPDATE `lrsetitauteur_publication` SET `titre`='$titre' WHERE `id`='$id'";
    
        mysqli_query($con,$titre_query);
        mysqli_query($con,$titre_auteur_query);
    }
    if (isset($_POST['sujet']) && $_POST['sujet'] !== "") {
    
        $sujet = $_POST['sujet'];
    
        $sujet_query="UPDATE `brevet` SET `sujet`='$sujet' WHERE `id`='$id_papier'";
        
        mysqli_query($con,$sujet_query);
    }
    
    if (isset($_POST['date']) && $_POST['date'] !== "") {
    
        $date = $_POST['date'];
    
        $date_query="UPDATE `brevet` SET `date`='$date' WHERE `id`='$id_papier'";
        $date_auteur_query="UPDATE `lrsetitauteur_publication` SET `date`='$date' WHERE `id`='$id'";
        
        mysqli_query($con,$date_query);
        mysqli_query($con, $date_auteur_query);
    }
   
    if (isset($_FILES['fichier']['tmp_name']) && $_FILES['fichier']['tmp_name'] !== "") {

        $pdf=$_FILES['fichier']['name'];
        $pdf_tem_loc=$_FILES['fichier']['tmp_name'];
        $output='http:www.setit.rnu.tn\Lab-SETIT\brevet\\';
        $pdf_store_2=$output.$pdf;
        $pdf_store="brevet/".$pdf;
        move_uploaded_file($pdf_tem_loc,$pdf_store);
        copy($pdf_store,$pdf_store_2);
    
        $tel_query="UPDATE `lrsetitbrevet` SET `fichier`='$pdf' WHERE `id`='$id_papier'";
        
        mysqli_query($con,$tel_query);
    }

    $_SESSION['status']="Mise à jour brevet réussie ! " ;
    $_SESSION['status_code']="Success"; 
     header("Location: view_paper.php ");

    
      
}