<?php



require_once ("password-connection.php");

session_start();

if(isset($_POST['submit'])){
    $titre=$_POST['titre'];
    $annee=$_POST['annee'];
    $pdf=$_FILES['these']['name'];
    $pdf_tem_loc=$_FILES['these']['tmp_name'];
    $output='http:www.setit.rnu.tn\Lab-SETIT\thèse\\';
    $pdf_store_2=$output.$pdf;
    $pdf_store="thèse/".$pdf;
    move_uploaded_file($pdf_tem_loc,$pdf_store);
    copy($pdf_store,$pdf_store_2);
    $sujet=$_POST['sujet'];
    $inscription=$_POST['anneeinscri'];
    $encadrant=$_POST['encadrant'];
    $mail=$_POST['mail_encadrant'];
    $encadrant_2=$_POST['encadrant_2'];
    $mail_encadrant_2=$_POST['mail_encadrant_2'];
    $cotutelle=$_POST['cotutelle'];
    $soumissionnaire=$_SESSION['mail'];

    $query="INSERT INTO `lrsetitthese`(`Titre`, `Année`, `Mémoire`, `Sujet`, `Année d'inscription`, `Encadrant`, `Cotutelle`, `Deuxieme encadrant`) 
    VALUES ('$titre','$annee','$pdf','$sujet','$inscription','$encadrant','$cotutelle','$encadrant_2')";

    $select = mysqli_query($con, "SELECT * FROM `lrsetitthese` WHERE `Titre` = '$titre'");

    if(mysqli_num_rows($select)>0){

    $_SESSION['mail_exist']="Une thèse avec ce titre existe déja !";
    header('Location:projet.php');

    }elseif(empty($encadrant_2)&& empty($mail_encadrant_2 ) ){
        
        mysqli_query($con,$query) ;
        $id_projet=mysqli_insert_id($con);
        $insert="INSERT INTO `lrsetitauteur_projet`(`id_projet`,`type`, `titre`, `encadrant`, `mail_encadrant`, `date`, `soumissionnaire`) 
        VALUES ('$id_projet','these','$titre','$encadrant','$mail','$annee','$soumissionnaire')";
    
        mysqli_query($con,$insert);
        $_SESSION['status']="Thése postulée avec succès ! " ;
        $_SESSION['status_code']="Success"; 
        header("Location: projet.php");
    }
    elseif(isset($encadrant_2) && $encadrant_2 !== "" && isset($mail_encadrant_2) && $mail_encadrant_2 !== "" ){
       
        mysqli_query($con,$query);
        $id_projet=mysqli_insert_id($con);
        $encadrant_total = $encadrant.' , '. $encadrant_2 ;
        $mail_total = $mail .' , '. $mail_encadrant_2;

         $insert="INSERT INTO `lrsetitauteur_projet`(`id_projet`,`type`, `titre`, `encadrant`, `mail_encadrant`, `date`, `soumissionnaire`) 
        VALUES ('$id_projet','these','$titre','$encadrant_total','$mail_total','$annee','$soumissionnaire')";
    
        mysqli_query($con,$insert);
        $_SESSION['status']="Thése postulée avec succès ! " ;
        $_SESSION['status_code']="Success"; 
        header("Location: projet.php");
    }
        
    
}