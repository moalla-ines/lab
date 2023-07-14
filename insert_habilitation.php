<?php



require_once ("password-connection.php");

session_start();



if(isset($_POST['submit'])){
    
    $titre=$_POST['titre'];
    $nom=$_POST['nom'];
    $annee=$_POST['annee'];
    $pdf=$_FILES['fichier']['name'];
    $pdf_tem_loc=$_FILES['fichier']['tmp_name'];
    $output='http:www.setit.rnu.tn\Lab-SETIT\habilitation\\';
    $pdf_store_2=$output.$pdf;
    $pdf_store="habilitation/".$pdf;
    move_uploaded_file($pdf_tem_loc,$pdf_store);
    copy($pdf_store,$pdf_store_2);
    $encadrant=$_POST['encadrant'];
    $mail=$_POST['mail_encadrant'];
    $date=$_POST['date'];
    $soumissionnaire=$_SESSION['mail'];

    $query="INSERT INTO `lrsetithabilitation`(`Titre`, `Titulaire habilitation`, `Année`, `Fichier`, `Encadrant`, `Date`) 
    VALUES ('$titre','$nom','$annee','$pdf','$encadrant','$date')";

    $select = mysqli_query($con, "SELECT * FROM `lrsetithabilitation` WHERE `Titre` = '$titre'");

    if(mysqli_num_rows($select)>0){

    $_SESSION['mail_exist']="Une habilitation avec ce titre existe déja !";
    header('Location:projet.php');

    }elseif(mysqli_query($con,$query)  ){

        $id_projet=mysqli_insert_id($con);
        $insert="INSERT INTO `lrsetitauteur_projet`(`id_projet`,`type`, `titre`, `encadrant`, `mail_encadrant`, `date`, `soumissionnaire`) 
        VALUES ('$id_projet','habilitation','$titre','$encadrant','$mail','$date','$soumissionnaire')";
    
        mysqli_query($con,$insert);
        $_SESSION['status']="Habilitation postulée avec succès ! " ;
        $_SESSION['status_code']="Success"; 
        header("Location: projet.php");
    }
    
   
      
}

?>

