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
    
        $titre_query="UPDATE `lrsetitactualite` SET `titre`='$titre' WHERE `id`='$id'";
       
        mysqli_query($con,$titre_query);
     
    }
    if (isset($_POST['description']) && $_POST['description'] !== "") {

        $description = $_POST['description'];
    
        $description_query="UPDATE `lrsetitactualite` SET `description`='$description' WHERE `id`='$id'";
       
        mysqli_query($con,$description_query);
     
    }
    if (isset($_FILES['photo']['tmp_name']) && $_FILES['photo']['tmp_name'] !== "") {
    
        $photo = $_FILES['photo']['tmp_name'];
        $img = addslashes(file_get_contents($photo)); 
    
        $photo_query="UPDATE `lrsetitactualite` SET `image`='$img' WHERE `id` ='$id'";
        
        mysqli_query($con,$photo_query);
    }
    $_SESSION['status']="Mise à jour actualité réussie ! " ;
    $_SESSION['status_code']="Success"; 
    header("Location: gestion_actualité.php ");
}
?>