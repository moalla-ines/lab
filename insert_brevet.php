<?php



require_once ("password-connection.php");

session_start();

if (isset($_POST['submit'])){
    
    $titre =$_POST['titre'];
    $annee = $_post['annee'];
    $pdf=$_FILES['fichier']['name'];
    $pdf_tem_loc=$_FILES['fichier']['tmp_name'];
    $output='http:www.setit.rnu.tn\Lab-SETIT\brevet\\';
    $pdf_store_2=$output.$pdf;
    $pdf_store="brevet/".$pdf;
    move_uploaded_file($pdf_tem_loc,$pdf_store);
    copy($pdf_store,$pdf_store_2);
    $sujet= $_POST['sujet'];
    $auteurs=$_POST['auteur'];
    $mail=$_POST['mail'];
    $date=$_POST['date'];
    $externe =$_POST['auteur_externe'];
    $mail_externe=$_POST['mail_externe'];
    $auteur = implode(" , ", $auteurs);
    $mail_auteur = implode(" , ", $mail);
    $auteur_externe=implode(" , ", $externe);
    $mail_externes=implode(" , ", $mail_externe);
    $soumissionnaire=$_SESSION['mail'];

    $query = "INSERT INTO `lrsetitbrevet`( `titre`, `année`, `fichier`, `sujet`,`date`) 
    VALUES ('$titre','$annee','$pdf','$sujet','$date')";

    $select = mysqli_query($con, "SELECT * FROM `lrsetitbrevet` WHERE `titre` = '$titre'");

    if(mysqli_num_rows($select)>0){

        $_SESSION['mail_exist']="Un brevet avec ce titre existe déja !";
        header('Location:add_paper.php');

    }elseif( empty($auteur_externe)&& empty($mail_externes ) ){
        
        mysqli_query($con,$query);
        $id_papier=mysqli_insert_id($con);
        $insert="INSERT INTO `lrsetitauteur_publication`( `id_papier`,`type`, `titre`, `auteur`,`mail_auteur`, `soumissionnaire`, `date`) 
        VALUES ('$id_papier','brevet','$titre','$auteur','$mail_auteur','$soumissionnaire','$date')";

        mysqli_query($con,$insert);
        $_SESSION['status']="Brevet postulé avec succès ! " ;
        $_SESSION['status_code']="Success"; 
        header("Location: add_paper.php");
    }

    elseif( isset($auteur_externe) && $auteur_externe !== "" && isset($mail_externes) && $mail_externes !== ""){
        
        mysqli_query($con,$query);
        $id_papier=mysqli_insert_id($con);
        $auteur_total = $auteur .' , '. $auteur_externe ;
        $mail_total = $mail_auteur .' , '. $mail_externes;
        $insert="INSERT INTO `lrsetitauteur_publication`( `id_papier`,`type`, `titre`, `auteur`, `mail_auteur` , `soumissionnaire`, `date`) 
        VALUES ('$id_papier','brevet','$titre','$auteur_total','$mail_total','$soumissionnaire','$date')";
        
        mysqli_query($con,$insert);
       
        $_SESSION['status']="Brevet postulé avec succès ! " ;
        $_SESSION['status_code']="Success"; 
        header("Location: add_paper.php");
       
    }
    
    
}    