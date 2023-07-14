<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
}


require_once ("password-connection.php");

if(isset($_GET['token']))

{

    $token=$_GET['token'];
    $verify_query="SELECT `verify_token`,`verify_status` FROM `lrsetitmembre` WHERE `verify_token`='$token'";
    $verify_query_run=mysqli_query($con,$verify_query);

    if(mysqli_num_rows($verify_query_run)>0)
    
    {
        
        $row=mysqli_fetch_array($verify_query_run);
     
        
     
        if($row['verify_status']=='0')
        {
            $clicked_token=$row['verify_token'];
            $update_query="UPDATE `lrsetitmembre` SET `verify_status`='1' WHERE `verify_token`='$clicked_token' ";
            $update_query_run=mysqli_query($con,$update_query);
            if($update_query_run){

                $_SESSION['status']="Votre compte est bien activé ! Vous pouvez y accéder à votre compte.";
                header('Location:index.php');
                exit(0);
            }
            else
            {
                $_SESSION['erreur']="Vérfication echoué !";
                header('Location:index.php');
                exit(0);
            }
        }
        else
        {
            $_SESSION['status']="Votre compte est deja activé !";
            header('Location:index.php');
            exit(0);
        }

    }
}



?>
