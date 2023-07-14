<?php



require_once ("password-connection.php");

session_start();

if(isset($_POST['submit'])){
    $annee=$_POST['annee'];
    $auteurs=$_POST['auteur'];
    $titre=$_POST['titre'];
    $editeur=$_POST['editeur'];
    $lien=$_POST['lien'];
    $edition=$_POST['edition'];
    $isbn=$_POST['isbn'];
    $date=$_POST['date'];
    $soumissionnaire=$_SESSION['mail'];
    $mail=$_POST['mail'];
    $externe =$_POST['auteur_externe'];
    $mail_externe=$_POST['mail_externe'];
    $auteur_externe=implode(" , ", $externe);
    $mail_externes=implode(" , ", $mail_externe);
    $auteur = implode(" , ", $auteurs);
    $mail_auteur = implode(" , ", $mail);   
   
    $query = "INSERT INTO `lrsetitouvrage scientifique`( `Année`, `Titre`, `Editeur`, `Lien editeur`, `Edition`, `ISBN/Issn`, `Date`) 
    VALUES ('$annee','$titre','$editeur','$lien','$edition','$isbn','$date')";

    $select = mysqli_query($con, "SELECT * FROM `lrsetitouvrage scientifique` WHERE `Titre` = '$titre'");
    $select_doi = mysqli_query($con, "SELECT * FROM `lrsetitouvrage scientifique` WHERE `Lien editeur` = '$lien'");

    if(mysqli_num_rows($select)>0){

        $_SESSION['mail_exist']="Un ouvrage avec ce titre existe déja !";
        header('Location:add_paper.php');

    }elseif(mysqli_num_rows($select_doi)>0){

        $_SESSION['mail_exist']="Un ouvrage avec ce lien editeur  existe déja !";
        header('Location:add_paper.php');

    }elseif( empty($auteur_externe)&& empty($mail_externes ) ){
        
        mysqli_query($con,$query) ;
        $id_papier=mysqli_insert_id($con);
        $insert="INSERT INTO `lrsetitauteur_publication`( `id_papier`,`type`, `titre`, `auteur`,`mail_auteur`, `soumissionnaire`, `date`) 
        VALUES ('$id_papier','ouvrage scientifique','$titre','$auteur','$mail_auteur','$soumissionnaire','$date')";

        mysqli_query($con,$insert);
        
        $_SESSION['status']="Ouvrage postulé avec succès ! " ;
        $_SESSION['status_code']="Success"; 
        header("Location: add_paper.php");
    }elseif( isset($auteur_externe) && $auteur_externe !== "" && isset($mail_externes) && $mail_externes !== ""){
    
        mysqli_query($con,$query); 
        $id_papier=mysqli_insert_id($con);
        $auteur_total =  $auteur .' , '. $auteur_externe ;
        $mail_total = $mail_auteur .' , '. $mail_externes;
        $insert="INSERT INTO `lrsetitauteur_publication`( `id_papier`,`type`, `titre`, `auteur`, `mail_auteur` , `soumissionnaire`, `date`) 
        VALUES ('$id_papier','ouvrage scientifique','$titre','$auteur_total','$mail_total','$soumissionnaire','$date')";
        
        mysqli_query($con,$insert);

        $_SESSION['status']="Ouvrage postulé avec succès ! " ;
        $_SESSION['status_code']="Success"; 
        header("Location: add_paper.php");

    }

    
    
}



