<?php



require_once ("password-connection.php");

session_start();


if (isset($_POST['submit'])){

    $type=$_POST['type'];
    $titre=$_POST['titre'];
    $auteur = mysqli_real_escape_string($con,$_POST['auteur']);;
    
    $mail_auteur = mysqli_real_escape_string($con,$_POST['email']);
    $soumissionnaire = mysqli_real_escape_string($con,$_POST['soumissionnaire']);
    $date=$_POST['date'];
   
    $query="INSERT INTO `lrsetitauteur_publication`( `titre`, `auteur`, `type`, `mail_auteur`, `soumissionnaire`, `date`) 
    VALUES ('$titre','$auteur','$type','$mail_auteur','$soumissionnaire','$date')";

    $select = mysqli_query($con, "SELECT * FROM `lrsetitauteur_publication` WHERE `titre` = '$titre'");
    
    if(mysqli_num_rows($select)>0){

        $_SESSION['error']="Une publication avec ce titre existe déja !";
        header('Location:ajout_publication.php');

    }else{

        $query_run=mysqli_query($con,$query);
        $_SESSION['status']="Ajout publication réussie ! " ;
        $_SESSION['status_code']="Success"; 
        header("Location:gestion_publication.php ");
    }

}


?>