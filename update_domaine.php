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
    
        $titre_query="UPDATE `lrsetitdomaine` SET `titre`='$titre' WHERE `id`='$id'";
       
        mysqli_query($con,$titre_query);
     
    }

    if (isset($_POST['description']) && $_POST['description'] !== "") {

        $description = $_POST['description'];
    
        $description_query="UPDATE `lrsetitdomaine` SET `description`='$description' WHERE `id`='$id'";
       
        mysqli_query($con,$description_query);
     
    }
    $_SESSION['status']="Mise à jour domaine réussie ! " ;
    $_SESSION['status_code']="Success"; 
    header("Location: domaine.php ");
}
?>