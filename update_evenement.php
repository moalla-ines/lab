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
    
        $titre_query="UPDATE `lrsetitevenement` SET `titre`='$titre' WHERE `id`='$id'";
        $titre_manifest_query="UPDATE `lrsetitmanifestation` SET `titre`='$titre' WHERE `id_manifest`='$id' AND `type`='evenement'";
        
    
        mysqli_query($con,$titre_query);
        mysqli_query($con,$titre_manifest_query);
    }
    if (isset($_POST['lieu']) && $_POST['lieu'] !== "") {
    
        $lieu = $_POST['lieu'];
    
        $lieu_query="UPDATE `lrsetitevenement` SET `lieu`='$lieu' WHERE `id`='$id'";
        
        mysqli_query($con,$lieu_query);
    }
    if (isset($_POST['prix']) && $_POST['prix'] !== "") {
    
        $prix = $_POST['prix'];
    
        $prix_query="UPDATE `lrsetitevenement` SET `prix`='$prix' WHERE `id`='$id'";
        
        mysqli_query($con,$prix_query);
    }
    if (isset($_POST['date_debut']) && $_POST['date_debut'] !== "") {
    
        $date_debut = $_POST['date_debut'];
    
        $date_debut_query="UPDATE `lrsetitevenement` SET `passport`='$date_debut' WHERE `id`='$id'";
        $date_debut_manifest_query="UPDATE `lrsetitmanifestation` SET `date_debut`='$date_debut' WHERE `id_manifest`='$id' AND `type`='evenement'";

        
        mysqli_query($con,$date_debut_query);
        mysqli_query($con,$date_debut_manifest_query);

    }
    if (isset($_POST['date_fin']) && $_POST['date_fin'] !== "") {
    
        $date_fin = $_POST['date_fin'];
    
        $date_fin_query="UPDATE `lrsetitevenement` SET `date_fin`='$date_fin' WHERE `id`='$id'";
        $date_fin_manifest_query="UPDATE `lrsetitmanifestation` SET `date_fin`='$date_fin' WHERE `id_manifest`='$id' AND `type`='evenement'";

        
        mysqli_query($con,$date_fin_query);
        mysqli_query($con,$date_fin_manifest_query);

    }
    if (isset($_POST['description']) && $_POST['description'] !== "") {
    
        $description = $_POST['description'];
    
        $description_query="UPDATE `lrsetitevenement` SET `description`='$description' WHERE `id`='$id'";
        
        mysqli_query($con,$description_query);
    }

    $_SESSION['status']="Mise à jour événement réussie ! " ;
    $_SESSION['status_code']="Success"; 
    header("Location: gestion_événements.php ");
}