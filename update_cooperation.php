<?php



require_once ("password-connection.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
    
    $id=$_GET['id'];
    
}


if(isset($_POST['update'])){
    if (isset($_POST['type']) && $_POST['type'] !== "") {

        $type = $_POST['type'];
    
        $type_query="UPDATE `lrsetitcooperation` SET `type`='$type' WHERE `id`='$id'";
    
        mysqli_query($con,$type_query);
      
    }

    if (isset($_POST['intervenant_natio']) && $_POST['intervenant_natio'] !== "" && empty($_POST['intervenant_inter'])) {

        $intervenant_natio=$_POST['intervenant_natio'];
        $intervenant_natios=implode(" , ",$intervenant_natio);
    
        $intervenant_query="UPDATE `lrsetitcooperation` SET `intervenant`='$intervenant_natios' WHERE `id`='$id'";
    
        mysqli_query($con,$intervenant_query);
    }

    if (isset($_POST['intervenant_natio']) && $_POST['intervenant_natio'] !== "" && isset($_POST['intervenant_inter']) && $_POST['intervenant_inter'] !== "") {

        $intervenant_natio=$_POST['intervenant_natio'];
        $intervenant_natios=implode(" , ",$intervenant_natio);

        $intervenant_inter=$_POST['intervenant_inter'];
        $intervenant_inters=implode(" , ",$intervenant_inter);
        
        $intervenant=$intervenant_inters.' , '.$intervenant_natios ;
    
        $intervenant_total_query="UPDATE `lrsetitcooperation` SET `intervenant`='$intervenant' WHERE `id`='$id'";
    
        mysqli_query($con,$intervenant_total_query);
    }
    if (isset($_POST['sujet']) && $_POST['sujet'] !== "") {

        $sujet = $_POST['sujet'];
    
        $sujet_query="UPDATE `lrsetitcooperation` SET `sujet`='$sujet' WHERE `id`='$id'";
    
        mysqli_query($con,$sujet_query);
      
    }
    if (isset($_POST['institution']) && $_POST['institution'] !== "") {

        $institution = $_POST['institution'];
    
        $institution_query="UPDATE `lrsetitcooperation` SET `institution`='$institution' WHERE `id`='$id'";
    
        mysqli_query($con,$institution_query);
      
    }
    if (isset($_FILES['contrat']['tmp_name']) && $_FILES['contrat']['tmp_name'] !== "") {

        $pdf=$_FILES['contrat']['tmp_name'];
    
        $pdf_query="UPDATE `lrsetitcooperation` SET `piece-jointe`='$pdf' WHERE `id`='$id'";
    
        mysqli_query($con,$pdf_query);
      
    }
    if (isset($_POST['date_debut']) && $_POST['date_debut'] !== "") {

        $date_debut = $_POST['date_debut'];
    
        $date_debut_query="UPDATE `lrsetitcooperation` SET `date-debut`='$date_debut' WHERE `id`='$id'";
    
        mysqli_query($con,$date_debut_query);
      
    }
    if (isset($_POST['date_fin']) && $_POST['date_fin'] !== "") {

        $date_fin = $_POST['date_fin'];
    
        $date_fin_query="UPDATE `lrsetitcooperation` SET `date-fin`='$date_fin' WHERE `id`='$id'";
    
        mysqli_query($con,$date_fin_query);
      
    }

    $_SESSION['status']="Mise à jour coopération réussie ! " ;
    $_SESSION['status_code']="Success"; 
    header("Location: gestion_cooperation.php ");

}

?>