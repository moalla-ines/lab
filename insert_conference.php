<?php



require_once ("password-connection.php");

session_start();


if (isset($_POST['submit'])){

    $annee=$_POST['annee'];
    $titre=$_POST['titre'];
    $pdf=$_FILES['conference']['name'];
    $pdf_tem_loc=$_FILES['conference']['tmp_name'];
    $output='http:www.setit.rnu.tn\Lab-SETIT\conférence\\';
    $pdf_store_2=$output.$pdf;
    $pdf_store="conférence/".$pdf;
    move_uploaded_file($pdf_tem_loc,$pdf_store);
    copy($pdf_store,$pdf_store_2);
    $date=$_POST['date'];
    $auteur=$_POST['auteur'];
    $mail=$_POST['mail'];
    $externe =$_POST['auteur_externe'];
    $mail_externe=$_POST['mail_externe'];
    $titre_conference=$_POST['name'];
    $classe=$_POST['classe'];
    $soumissionnaire=$_SESSION['mail'];
    $auteurs = implode(" , ", $auteur);
    $mail_auteur = implode(" , ", $mail);
    $auteur_externe=implode(" , ", $externe);
    $mail_externes=implode(" , ", $mail_externe);
    
    
    

    $query="INSERT INTO `lrsetitconference`( `année`, `titre`, `date`, `fichier`, `conference_name`, `classe`) 
    VALUES('$annee','$titre','$date','$pdf','$titre_conference','$classe')";

     $select = mysqli_query($con, "SELECT * FROM `lrsetitconference` WHERE `titre` = '$titre'");

     if(mysqli_num_rows($select)>0){

     $_SESSION['mail_exist']="Une conférence avec ce titre existe déja !";
     header('Location:add_paper.php');

     }elseif( empty($auteur_externe)&& empty($mail_externes )){
     
          mysqli_query($con,$query);
          $id_papier=mysqli_insert_id($con);
          $insert="INSERT INTO `lrsetitauteur_publication`( `id_papier`,`type`, `titre`, `auteur`, `mail_auteur` , `soumissionnaire`, `date`) 
          VALUES ('$id_papier','conference','$titre','$auteurs','$mail_auteur','$soumissionnaire','$date')";
     
          mysqli_query($con,$insert);
          $_SESSION['status']="Conférence postulé avec succès ! " ;
          $_SESSION['status_code']="Success"; 
          header("Location: add_paper.php");

     }elseif( isset($auteur_externe) && $auteur_externe !== "" && isset($mail_externes) && $mail_externes !== ""){
               
          mysqli_query($con,$query);  
          $id_papier=mysqli_insert_id($con);
          $auteur_total = $auteurs .' , '. $auteur_externe ;
          $mail_total = $mail_auteur .' , '. $mail_externes;
          $insert="INSERT INTO `lrsetitauteur_publication`( `id_papier`,`type`, `titre`, `auteur`, `mail_auteur` , `soumissionnaire`, `date`) 
          VALUES ('$id_papier','conference','$titre','$auteur_total','$mail_total','$soumissionnaire','$date')";
               
          mysqli_query($con,$insert);
               
          $_SESSION['status']="Conférence postulé avec succès ! " ;
          $_SESSION['status_code']="Success"; 
          header("Location: add_paper.php");
               
     }
     
   
     

}
   
