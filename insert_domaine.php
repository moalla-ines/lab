<?php



require_once ("password-connection.php");

session_start();

if(isset($_POST['submit'])){

    $titre=$_POST['titre'];
    $description=$_POST['description'];
  
    $query="INSERT INTO `lrsetitdomaine`(`titre`, `description`)
    VALUES ('$titre','$description')";
    
    $query_run=mysqli_query($con,$query);


    $_SESSION['status']="Ajout domaine réussie ! " ;
    $_SESSION['status_code']="Success"; 
    header("Location: domaine.php ");

}
?>