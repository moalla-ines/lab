<?php


require_once ("password-connection.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
    $id=$_GET['id'];
    
}


if(isset($_POST['update'])){

    if (isset($_POST['nom']) && $_POST['nom'] !== "") {

        $name = $_POST['nom'];
    
        $name_query="UPDATE `lrsetitmembre` SET `nom`='$name' WHERE `id`='$id'";
    
        mysqli_query($con,$name_query);
    }
    if (isset($_POST['prenom']) && $_POST['prenom'] !== "") {
    
        $prenom = $_POST['prenom'];
    
        $prenom_query="UPDATE `lrsetitmembre` SET `prenom`='$prenom' WHERE `id`='$id'";
        
        mysqli_query($con,$prenom_query);
    }
    
    if (isset($_POST['email']) && $_POST['email'] !== "") {
    
        $email = $_POST['email'];
        $select = mysqli_query($con, "SELECT * FROM `lrsetitmembre` WHERE `email` = '$email'");

        if((mysqli_num_rows($select))>0) {

            $_SESSION['mail_exist']="Ce mail existe déjà !";
            header('Location:update_profile.php');
      
        }else{

            $email_query="UPDATE `lrsetitmembre` SET `email`='$email' WHERE `id`='$id'";
        
             mysqli_query($con,$email_query);
        }
    
        
    }
    if(isset($_POST['mdp']) && $_POST['mdp'] !== "" ){
        
        $mdp=$_POST['mdp'];
        $uppercase = preg_match('@[A-Z]@', $mdp);
        $lowercase = preg_match('@[a-z]@', $mdp);
        $number    = preg_match('@[0-9]@', $mdp);

        if(!$uppercase || !$lowercase || !$number  || strlen($mdp) < 7){

            $_SESSION['erreur']=" Mot de passe invalide ! Merci de respecter les conditions mises pour le mot de passe.";
      
            header('Location:update_profile.php');
        }else{

            $mdp_query="UPDATE `lrsetitmembre` SET `password`='$mdp' WHERE `id` ='$id'";
      
            mysqli_query($con,$mdp_query);
        }
    }
      
    if (isset($_FILES['photo']['tmp_name']) && $_FILES['photo']['tmp_name'] !== "") {
    
        $photo = $_FILES['photo']['tmp_name'];
        $img = addslashes(file_get_contents($photo)); 
    
        $photo_query="UPDATE `lrsetitmembre` SET `image`='$img' WHERE `id` ='$id'";
        
        mysqli_query($con,$photo_query);
    }
    if (isset($_POST['tel']) && $_POST['tel'] !== "") {
    
        $tel = $_POST['tel'];
    
        $tel_query="UPDATE `lrsetitmembre` SET `tel mobile`='$tel' WHERE `id`='$id'";
        
        mysqli_query($con,$tel_query);
    }
    if (isset($_POST['grade']) && $_POST['grade'] !== "") {
    
        $grade = $_POST['grade'];
    
        $grade_query="UPDATE `lrsetitmembre` SET `grade`='$grade' WHERE `id`='$id'";
        
        mysqli_query($con,$grade_query);
    }
    if (isset($_POST['diplome']) && $_POST['diplome'] !== "") {
    
        $diplome = $_POST['diplome'];
    
        $diplome_query="UPDATE `lrsetitmembre` SET `diplome`='$diplome' WHERE `id`='$id'";
        
        mysqli_query($con,$diplome_query);
    }
    if (isset($_POST['specialite']) && $_POST['specialite'] !== "") {
    
        $specialite = $_POST['specialite'];
    
        $spec_query="UPDATE `lrsetitmembre` SET `specialite`='$specialite' WHERE `id`='$id'";
        
        mysqli_query($con,$spec_query);
    }
    if (isset($_POST['ftadmin']) && $_POST['ftadmin'] !== "") {
    
        $ftadmin = $_POST['ftadmin'];
    
        $ft_query="UPDATE `lrsetitmembre` SET `fonction administrative`='$ftadmin' WHERE `id`='$id'";
        
        mysqli_query($con,$ft_query);
    }
    if (isset($_POST['scopus']) && $_POST['scopus'] !== "") {
    
        $scopus = $_POST['scopus'];
    
        $scopus_query="UPDATE `lrsetitmembre` SET `h-index`='$scopus' WHERE `id`='$id'";
        
        mysqli_query($con,$scopus_query);
    }
    if (isset($_POST['orcid']) && $_POST['orcid'] !== "") {
    
        $orcid = $_POST['orcid'];
    
        $orcid_query="UPDATE `lrsetitmembre` SET `orcid`='$orcid' WHERE `id`='$id'";
        
        mysqli_query($con,$orcid_query);
    }
    if (isset($_POST['telfax']) && $_POST['telfax'] !== "") {
    
        $telfax = $_POST['telfax'];
    
        $fax_query="UPDATE `lrsetitmembre` SET `tel fax`='$telfax' WHERE `id`='$id'";
        
        mysqli_query($con,$fax_query);
    }
    if (isset($_POST['datediplome']) && $_POST['datediplome'] !== "") {
    
        $datediplome = $_POST['datediplome'];
    
        $date_query="UPDATE `lrsetitmembre` SET `date du dernier diplome`='$datediplome' WHERE `id`='$id'";
        
        mysqli_query($con,$date_query);
    }
   
    $_SESSION['status']="Données mises à jour avec succès";
    header('Location:update_profile.php');
      

}

?>