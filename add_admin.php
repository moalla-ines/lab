<?php



require_once ("password-connection.php");

if(!isset($_SESSION)) 
{ 
    session_start(); 
}
if(isset ($id) ){


$id=mysqli_real_escape_string($con,$_POST["id"]);

if(isset($_POST['add_admin_btn'])){
    $query="UPDATE `lrsetitmembre` SET `etat`='1' WHERE `id`='$id' AND `approve`='1'";

    if(mysqli_query($con,$query) ){

        echo 200;
    }else{  
        echo 500;
    }
}
}
?>