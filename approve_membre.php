<?php



require_once ("password-connection.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
}


$id=mysqli_real_escape_string($con,$_POST['id']);

if(isset($_POST['approve_member_btn'])){
    $query="UPDATE `lrsetitmembre` SET `approve`='1' WHERE `id`='$id'";

    if(mysqli_query($con,$query) ){

        echo 200;
    }else{
        echo 500;
    }
}

?>