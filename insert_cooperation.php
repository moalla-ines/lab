<?php



require_once ("password-connection.php");

session_start();

if (isset($_POST['submit'])){

    $type=$_POST['type'];
    $intervenant_natio=$_POST['intervenant_natio'];
    $intervenant_inter=$_POST['intervenant_inter'];
    $pdf=$_FILES['contrat']['tmp_name'];
    $date_debut=$_POST['date_debut'];
    $sujet=$_POST['sujet'];
    $institution =$_POST['institution'];
    $date_fin=$_POST['date_fin'];

    $intervenant_inters=implode(" , ",$intervenant_inter);
    $intervenant_natios=implode(" , ",$intervenant_natio);

    
    //$select = mysqli_query($con, "SELECT * FROM `cooperation` WHERE `titre` = '$titre'");

    //if(mysqli_num_rows($select)>0){

    //$_SESSION['error']="Une coopération avec ce titre existe déja !";
    //header('Location:ajout_cooperation.php');

    //}
    if(isset($intervenant_natios) && $intervenant_natios !== "" && empty($intervenant_natios)){

        $query ="INSERT INTO `lrsetitcooperation`( `type`, `institution`, `intervenant`, `sujet`, `date-debut`, `date-fin`, `piece-jointe`) 
        VALUES ('$type','$institution','$intervenant_natios','$sujet','$date_debut','$date_fin','$pdf')";

        mysqli_query($con,$query);
        $_SESSION['status']="Ajout coopération réussie ! " ;
        $_SESSION['status_code']="Success"; 
        header("Location: gestion_cooperation.php");
    }if(isset($intervenant_inters) && $intervenant_inters !== "" && isset($intervenant_natios) && $intervenant_natios !== ""){

        $intervenant=$intervenant_inters.' , '.$intervenant_natios ;
        $query ="INSERT INTO `lrsetitcooperation`( `type`, `institution`, `intervenant`, `sujet`, `date-debut`, `date-fin`, `piece-jointe`) 
        VALUES ('$type','$institution','$intervenant','$sujet','$date_debut','$date_fin','$pdf')";

        mysqli_query($con,$query);
        $_SESSION['status']="Ajout coopération réussie ! " ;
        $_SESSION['status_code']="Success"; 
        header("Location: gestion_cooperation.php");
    }


}