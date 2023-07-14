<?php



require_once ("password-connection.php");

session_start();


if (isset($_POST['submit'])){

    $titre=$_POST['titre'];
    $lieu=$_POST['lieu'];
    $description=$_POST['description'];
    $prix=$_POST['prix'];
    $date_debut=$_POST['date_debut'];
    $date_fin=$_POST['date_fin'];
    
    $query="INSERT INTO `lrsetitevenement`( `titre`, `description`, `lieu`, `prix`, `date_debut`, `date_fin`) 
    VALUES ('$titre','$lieu','$description','$prix','$date_debut','$date_fin')";

    $select = mysqli_query($con, "SELECT * FROM `lrsetitevenement` WHERE `titre` = '$titre'");
    
    if(mysqli_num_rows($select)>0){

        $_SESSION['error']="Un événement avec ce titre existe déja !";
        header('Location:ajout_événements.php');

    }else{

        $query_run=mysqli_query($con,$query);
        $id_manifest=mysqli_insert_id($con);
        $query_calendar="INSERT INTO `lrsetitmanifestation` (`id_manifest`, `type`, `titre`, `date_debut`, `date_fin`) 
        VALUES ('$id_manifest','evenement','$titre','$date_debut','$date_fin')";

        $query_calendar_run=mysqli_query($con,$query_calendar);   

        $_SESSION['status']="Ajout événement réussie ! " ;
        $_SESSION['status_code']="Success"; 
        header("Location:ajout_événements.php ");
    }

}


?>