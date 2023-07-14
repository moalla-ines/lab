<?php



require_once ("password-connection.php");

session_start();


if (isset($_POST['submit'])){

    $annee=$_POST['annee'];
    $titre=$_POST['titre'];
    $doi=$_POST['doi'];
    $pdf=$_FILES['article']['name'];
    $pdf_tem_loc=$_FILES['article']['tmp_name'];
    $output='http:www.setit.rnu.tn\Lab-SETIT\article\\';
    $pdf_store_2=$output.$pdf;
    $pdf_store="article/".$pdf;
    move_uploaded_file($pdf_tem_loc,$pdf_store);
    copy($pdf_store,$pdf_store_2);
    $date=$_POST['date'];
    $auteur=$_POST['auteur'];
    $mail=$_POST['mail'];
    $externe =$_POST['auteur_externe'];
    $mail_externe=$_POST['mail_externe'];
    $titre_journal=$_POST['titre_journal'];
    $quartile=$_POST['quartile'];
    $volume=$_POST['volume'];
    $impact=$_POST['impact'];
    $indexation=$_POST['indexation'];
    $revue=$_POST['site_revue'];
    $soumissionnaire=$_SESSION['mail'];
    $auteurs = implode(" , ", $auteur);
    $mail_auteur = implode(" , ", $mail);
    $auteur_externe=implode(" , ", $externe);
    $mail_externes=implode(" , ", $mail_externe);
    
    
    

    $query="INSERT INTO `lrsetitarticle scientifique`(`année`, `titre`, `Lien DOI`, `Fichier`, `Date publication`, `Titre du journal`, `Quartile du journal`, `Volume`, `Facteur`, `Indexation`, `Site de la revue`) 
    VALUES ('$annee','$titre','$doi','$pdf','$date','$titre_journal','$quartile','$volume','$impact','$indexation','$revue')";
    
    $select = mysqli_query($con, "SELECT * FROM `lrsetitarticle scientifique` WHERE `titre` = '$titre'");
    $select_doi = mysqli_query($con, "SELECT * FROM `lrsetitarticle scientifique` WHERE `Lien DOI` = '$doi'");

     if(mysqli_num_rows($select)>0){

          $_SESSION['mail_exist']="Un article avec ce titre existe déja !";
          header('Location:add_paper.php');

     }elseif(mysqli_num_rows($select_doi)>0){

          $_SESSION['mail_exist']="Un article avec ce lien DOI existe déja !";
          header('Location:add_paper.php');

     }elseif(empty($auteur_externe)&& empty($mail_externes )){

          mysqli_query($con,$query) ;
          $id_papier=mysqli_insert_id($con);
          $insert="INSERT INTO `lrsetitauteur_publication`( `id_papier`,`type`, `titre`, `auteur`, `mail_auteur` , `soumissionnaire`, `date`) 
          VALUES ('$id_papier','article scientifique','$titre','$auteurs','$mail_auteur','$soumissionnaire','$date')";
      
          mysqli_query($con,$insert);
          $_SESSION['status']="Arcticle postulé avec succès ! " ;
          $_SESSION['status_code']="Success"; 
          header("Location: add_paper.php");
     }elseif( isset($auteur_externe) && $auteur_externe !== "" && isset($mail_externes) && $mail_externes !== ""){
     
        mysqli_query($con,$query);
        $id_papier=mysqli_insert_id($con);
        $auteur_total = $auteurs .' , '. $auteur_externe ;
        $mail_total = $mail_auteur .' , '. $mail_externes;
        $insert="INSERT INTO `lrsetitauteur_publication`( `id_papier`,`type`, `titre`, `auteur`, `mail_auteur` , `soumissionnaire`, `date`) 
        VALUES ('$id_papier','article scientifique','$titre','$auteur_total','$mail_total','$soumissionnaire','$date')";
        
        mysqli_query($con,$insert);
       
        $_SESSION['status']="Arcticle postulé avec succès ! " ;
        $_SESSION['status_code']="Success"; 
        header("Location: add_paper.php");
       
   }
}
   
