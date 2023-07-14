<?php

session_start();
 

$_SESSION = array();
 

session_destroy();
 
unset($_SESSION['mail']);
unset($_SESSION['nom']);
unset($_SESSION['prenom']);

header("location: index.php");

exit;
?>