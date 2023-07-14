<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

if(!isset($_SESSION['mail']))
{
    
    header('Location:index.php'); 
}

?>