<?php



require_once ("password-connection.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
}


$id=mysqli_real_escape_string($con,$_POST['id']);

if(isset($_POST['remove_admin_btn'])){
    $query="UPDATE `lrsetitmembre` SET `etat`='0' WHERE `id`='$id' AND `approve`='1'";

    if(mysqli_query($con,$query) ){

        echo 200;
    }else{
        echo 500;
    }
}

?>