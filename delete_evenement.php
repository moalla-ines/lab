<?php



require_once ("password-connection.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
}
    
$id=mysqli_real_escape_string($con,$_POST['id']);

if(isset($_POST['delete_paper_btn'])){
    $query="DELETE FROM `lrsetitevenement` WHERE `id`=$id";
    $manifest_query="DELETE FROM `lrsetitmanifestation` WHERE `id_manifest`='$id' AND `type`='evenement'";

    if(mysqli_query($con,$query) ){

        mysqli_query($con,$manifest_query);
        echo 200;
    }else{
        echo 500;
    }
    
    
}

?>