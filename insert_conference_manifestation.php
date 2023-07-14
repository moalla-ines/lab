<?php



require_once ("password-connection.php");

session_start();

if(isset($_POST['submit'])){

    $titre=$_POST['titre'];
    $lieu=$_POST['lieu'];
    $prix=$_POST['prix'];
    $date_debut=$_POST['date_debut'];
    $date_fin=$_POST['date_fin'];
    $classe=$_POST['classe'];
    $query="INSERT INTO `lrsetitconference_manifestation`( `titre`, `lieu`, `prix`, `date_debut`, `date_fin`, `classe`)
    VALUES ('$titre','$lieu','$prix','$date_debut','$date_fin','$classe')";
    

    $select = mysqli_query($con, "SELECT * FROM `lrsetitconference_manifestation` WHERE `titre` = '$titre'");

    if(mysqli_num_rows($select)>0){

        $_SESSION['error']="Une conférence avec ce titre existe déja !";
        header('Location:ajout_conference.php');

    }else{

        $query_run=mysqli_query($con,$query);
        $id_manifest=mysqli_insert_id($con);

        $query_calendar="INSERT INTO `lrsetitmanifestation` (`id_manifest`, `type`, `titre`, `date_debut`, `date_fin`) 
        VALUES ('$id_manifest','conference','$titre','$date_debut','$date_fin')";

        $query_calendar_run=mysqli_query($con,$query_calendar);   

        $_SESSION['status']="Ajout conférence réussie ! " ;
        $_SESSION['status_code']="Success"; 
        header("Location: ajout_conference.php ");
    }
    

}
?>