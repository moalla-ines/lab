<?php



require_once ("password-connection.php");

session_start();

if(isset($_POST['submit'])){

    $titre=$_POST['titre'];
    $lieu=$_POST['lieu'];
    $formateur=$_POST['formateur'];
    $prix=$_POST['prix'];
    $date_debut=$_POST['date_debut'];
    $date_fin=$_POST['date_fin'];
  
    $query="INSERT INTO `lrsetitformation`(`titre`, `lieu`, `formateur`, `prix`, `date-debut`, `date-fin`)
    VALUES ('$titre','$lieu','$formateur','$prix','$date_debut','$date_fin')";

    $select = mysqli_query($con, "SELECT * FROM `lrsetitformation` WHERE `titre` = '$titre'");
    
    

    if(mysqli_num_rows($select)>0){

        $_SESSION['error']="Une formation avec ce titre existe déja !";
        header('Location:ajout_formation.php');

    }else{

        $query_run=mysqli_query($con,$query);
        $id_manifest=mysqli_insert_id($con);
        $query_calendar="INSERT INTO `lrsetitmanifestation` (`id_manifest`, `type`, `titre`, `date_debut`, `date_fin`) 
        VALUES ('$id_manifest','formation','$titre','$date_debut','$date_fin')";

        $query_calendar_run=mysqli_query($con,$query_calendar);   

        $_SESSION['status']="Ajout formation réussie ! " ;
        $_SESSION['status_code']="Success"; 
        header("Location: ajout_formation.php ");
    }

   

}
?>