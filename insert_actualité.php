<?php



require_once ("password-connection.php");

session_start();

if(isset($_POST['submit'])){

    $titre=$_POST['titre'];
    $description=$_POST['description'];
    $image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
    
  
    $query="INSERT INTO `lrsetitactualite`(`titre`, `description`,  `image`)
    VALUES ('$titre','$description','$image')";
    
    $query_run=mysqli_query($con,$query);

    if($query_run){

        $_SESSION['status']="Ajout actualité réussie ! " ;
        $_SESSION['status_code']="Success"; 
        header("Location: gestion_actualité.php ");;   
    }

    

}
?>