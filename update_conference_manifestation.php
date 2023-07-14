<?php


require_once ("password-connection.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
    $id=$_GET['id'];
    
}


if(isset($_POST['update'])){

    if (isset($_POST['titre']) && $_POST['titre'] !== "") {

        $titre = $_POST['titre'];
    
        $titre_query="UPDATE `lrsetitconference_manifestation` SET `titre`='$titre' WHERE `id`='$id'";
        $titre_manifest_query="UPDATE `lrsetitmanifestation` SET `titre`='$titre' WHERE `id_manifest`='$id' AND `type`='conference'";
        
    
        mysqli_query($con,$titre_query);
        mysqli_query($con,$titre_manifest_query);
    }
    if (isset($_POST['lieu']) && $_POST['lieu'] !== "") {
    
        $lieu = $_POST['lieu'];
    
        $lieu_query="UPDATE `lrsetitconference_manifestation` SET `lieu`='$lieu' WHERE `id`='$id'";
        
        mysqli_query($con,$lieu_query);
    }
    if (isset($_POST['prix']) && $_POST['prix'] !== "") {
    
        $prix = $_POST['prix'];
    
        $prix_query="UPDATE `lrsetitconference_manifestation` SET `prix`='$prix' WHERE `id`='$id'";
        
        mysqli_query($con,$prix_query);
    }
    if (isset($_POST['date_debut']) && $_POST['date_debut'] !== "") {
    
        $date_debut = $_POST['date_debut'];
    
        $date_debut_query="UPDATE `lrsetitconference_manifestation` SET `date_debut`='$date_debut' WHERE `id`='$id'";

        $date_debut_manifest_query="UPDATE `lrsetitmanifestation` SET `date_debut`='$date_debut' WHERE `id_manifest`='$id' AND `type`='conference'";
        
        mysqli_query($con,$date_debut_query);
        mysqli_query($con,$date_debut_manifest_query);
    }
    if (isset($_POST['date_fin']) && $_POST['date_fin'] !== "") {
    
        $date_fin = $_POST['date_fin'];
    
        $date_fin_query="UPDATE `lrsetitconference_manifestation` SET `date_fin`='$date_fin' WHERE `id`='$id'";
        $date_fin_manifest_query="UPDATE `lrsetitmanifestation` SET `date_fin`='$date_fin' WHERE `id_manifest`='$id' AND `type`='conference'";
        
        mysqli_query($con,$date_fin_query);
        mysqli_query($con,$date_fin_manifest_query);
    }
    if (isset($_POST['classe']) && $_POST['classe'] !== "") {
    
        $classe = $_POST['classe'];
    
        $classe_query="UPDATE `lrsetitconference_manifestation` SET `classe`='$classe' WHERE `id`='$id'";
        
        mysqli_query($con,$classe_query);
    }

    $_SESSION['status']="Mise à jour conférence réussie ! " ;
    $_SESSION['status_code']="Success"; 
    header("Location: gestion_manifestation.php ");
}