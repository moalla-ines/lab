<?php



require_once ("password-connection.php");

session_start();

if(isset($_POST['submit'])){
    
    $titre =$_POST['titre'];
    $pdf=$_FILES['fichier']['name'];
    $pdf_tem_loc=$_FILES['fichier']['tmp_name'];
    $output='http:www.setit.rnu.tn\Lab-SETIT\pfe\\';
    $pdf_store_2=$output.$pdf;
    $pdf_store="pfe/".$pdf;
    move_uploaded_file($pdf_tem_loc,$pdf_store);
    copy($pdf_store,$pdf_store_2);
    $description=$_POST['description'];
    $encadrant=$_POST['encadrant'];
    $mail=$_POST['mail_encadrant'];
    $encadrant_2=$_POST['encadrant_2'];
    $mail_encadrant_2=$_POST['mail_encadrant_2'];
    $institut=$_POST['institut'];
    $etudiant=$_POST['etudiant'];
    $debut=$_POST['debut'];
    $fin=$_POST['fin'];
    $soumissionnaire=$_SESSION['mail'];

    $query="INSERT INTO `lrsetitpfe`(`titre`, `fichier`, `desctiption`, `encadrant`, `co-encadrant`, `institution`, `etudiant`, `date-debut`, `date-fin`)
    VALUES ('$titre','$pdf','$description','$encadrant','$encadrant_2','$institut','$etudiant','$debut','$fin')";

    $select = mysqli_query($con, "SELECT * FROM `lrsetitpfe` WHERE `titre` = '$titre'");

    if(mysqli_num_rows($select)>0){

    $_SESSION['mail_exist']="Un PFE avec ce titre existe déja !";
    header('Location:projet.php');

    }elseif( empty($encadrant_2)&& empty($mail_encadrant_2 ) ){

        mysqli_query($con,$query);
        $id_projet=mysqli_insert_id($con);
        $insert="INSERT INTO `lrsetitauteur_projet`(`id_projet`,`type`, `titre`, `encadrant`, `mail_encadrant`, `date`, `soumissionnaire`) 
        VALUES ('$id_projet','pfe','$titre','$encadrant','$mail','$debut','$soumissionnaire')";

        mysqli_query($con,$insert);
        $_SESSION['status']="PFE postulée avec succès ! " ;
        $_SESSION['status_code']="Success"; 
        header("Location: projet.php");

    }elseif( isset($encadrant_2) && $encadrant_2 !== "" && isset($mail_encadrant_2) && $mail_encadrant_2 !== "" ){
        
        mysqli_query($con,$query);
        $id_projet=mysqli_insert_id($con);
        $encadrant_total = $encadrant.' , '. $encadrant_2 ;
        $mail_total = $mail .' , '. $mail_encadrant_2;

        $insert="INSERT INTO `lrsetitauteur_projet`(`id_projet`,`type`, `titre`, `encadrant`, `mail_encadrant`, `date`, `soumissionnaire`) 
        VALUES ('$id_projet','pfe','$titre','$encadrant_total','$mail_total','$debut','$soumissionnaire')";
        
        mysqli_query($con,$insert);
        $_SESSION['status']="PFE postulée avec succès ! " ;
        $_SESSION['status_code']="Success"; 
        header("Location: projet.php");
        
    }

   
}