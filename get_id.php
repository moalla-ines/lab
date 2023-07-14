<?Php



require_once ("password-connection.php");  
if(!isset($_SESSION)) 
{ 
    session_start(); 
    
   
}
$mail=$_SESSION['mail'];
$rows = array();
$query="SELECT `id_papier` FROM `lrsetitauteur_publication` WHERE `soumissionnaire`= '$mail' OR `mail_auteur` LIKE '%$mail%' " ;
$result=mysqli_query($con,$query);
while($row=mysqli_fetch_array($result)){
    $rows[] = $row;
};
foreach($rows as $id){ 
    print_r($id);
    
};
?>

